<?php

namespace Ash\LoginGateBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository as Repository;
use Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface;

class FailureLoginAttemptRepository extends Repository implements FailureLoginAttemptRepositoryInterface
{
    /**
     * @param string $ip
     * @param \DateTime $startDate
     * @return integer
     */
    public function getCountAttempts($ip,$user, \DateTime $startDate)
    {
        return $this->createQueryBuilder()
            ->field('ip')->equals($ip)
            ->field('username')->equals($user)
            ->field('createdAt')->gt($startDate)
            ->getQuery()->count();
    }

    /**
     *
     * @param string $ip
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttempt | null
     */



    public function getLastAttempt($ip)
    {
        return $this->createQueryBuilder()
            ->field('ip')->equals($ip)
            ->field('username')->equals($user)
            ->sort('createdAt', 'desc')
            ->getQuery()
            ->getSingleResult();
    }

    /**
     *
     * @param string $ip
     * @return integer
     */
    public function clearAttempts($ip)
    {
        return $this->createQueryBuilder()
            ->remove()
            ->field('ip')->equals($ip)
            ->field('username')->equals($user)
            ->getQuery()
            ->execute();
    }
}
