<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Entity;

use Doctrine\ORM\EntityRepository as Repository;
use Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface;
=======
namespace Anyx\LoginGateBundle\Entity;

use Doctrine\ORM\EntityRepository as Repository;
use Anyx\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

class FailureLoginAttemptRepository extends Repository implements FailureLoginAttemptRepositoryInterface
{
    /**
     * @param string $ip
     * @param \DateTime $startDate
     * @return integer
     */
<<<<<<< HEAD
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
=======
    public function getCountAttempts($ip, \DateTime $startDate)
    {
        return $this->createQueryBuilder('attempt')
                    ->select('COUNT(attempt.id)')
                    ->where('attempt.ip = :ip')
                    ->andWhere('attempt.createdAt > :createdAt')
                    ->setParameters(array(
                        'ip'        => $ip,
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
                        'createdAt' => $startDate
                    ))
                    ->getQuery()
                    ->getSingleScalarResult();
    }
    
    /**
<<<<<<< HEAD
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
=======
     * 
     * @param string $ip
     * @return \Anyx\LoginGateBundle\Entity\FailureLoginAttempt | null
     */
    public function getLastAttempt($ip)
    {
        return $this->createQueryBuilder('attempt')
                    ->where('attempt.ip = :ip')
                    ->orderBy('attempt.createdAt', 'DESC')
                    ->setParameters(array(
                        'ip'        => $ip
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
    public function clearAttempts($ip,$user)
    {
        return $this->getEntityManager()
                ->createQuery('DELETE FROM ' . $this->getClassMetadata()->name . ' attempt WHERE attempt.ip = :ip AND attempt.username = :user')
                ->execute(['ip' => $ip, 'user'=>$user])
=======
    public function clearAttempts($ip)
    {
        return $this->getEntityManager()
                ->createQuery('DELETE FROM ' . $this->getClassMetadata()->name . ' attempt WHERE attempt.ip = :ip')
                ->execute(['ip' => $ip])
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
            ;
    }
}
