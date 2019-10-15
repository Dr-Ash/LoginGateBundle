<?php

namespace Ash\LoginGateBundle\Entity;

use Doctrine\ORM\EntityRepository as Repository;
use Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface;

class FailureLoginAttemptRepository extends Repository implements FailureLoginAttemptRepositoryInterface
{
    /**
     * @param string $ip
     * @param \DateTime $startDate
     * @return integer
     */
    public function getCountAttempts($ip, $user, \DateTime $startDate)
    {
        return $this->createQueryBuilder('attempt')
                    ->select('COUNT(attempt.id)')
                    ->andWhere('attempt.ip = :ip')
                    ->andWhere('attempt.username = :username')
                    ->andWhere('attempt.createdAt > :createdAt')
                    ->setParameters(array(
                        'ip'        => $ip,
                        'username'  => $user,
                        'createdAt' => $startDate
                    ))
                    ->getQuery()
                    ->getSingleScalarResult();
    }
    
    /**
     *
     * @param string $username
     * @param string $ip
     * @return \Ash\LoginGateBundle\Entity\FailureLoginAttempt | null
     */
    public function getLastAttempt($ip,$user)
    {
        return $this->createQueryBuilder('attempt')
                    ->where('attempt.ip = :ip')
                    ->andWhere('attempt.username = :username')
                    ->orderBy('attempt.createdAt', 'DESC')
                    ->setParameters(array(
                        'ip'        => $ip,
                        'username'  => $user
                    ))
                    ->getQuery()
                    ->setMaxResults(1)
                    ->getOneOrNullResult()
        ;
    }
    
    /**
     * @param string $ip
     * @return integer
     */
    public function clearAttempts($ip,$user)
    {
        return $this->getEntityManager()
                ->createQuery('DELETE FROM ' . $this->getClassMetadata()->name . ' attempt WHERE attempt.ip = :ip AND attempt.username = :user')
                ->execute(['ip' => $ip, 'user'=>$user])
            ;
    }
}
