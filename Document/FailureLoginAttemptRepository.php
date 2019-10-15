<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository as Repository;
use Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface;
=======
namespace Anyx\LoginGateBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository as Repository;
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
    public function getCountAttempts($ip,$user, \DateTime $startDate)
    {
        return $this->createQueryBuilder()
            ->field('ip')->equals($ip)
            ->field('username')->equals($user)
=======
    public function getCountAttempts($ip, \DateTime $startDate)
    {
        return $this->createQueryBuilder()
            ->field('ip')->equals($ip)
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
            ->field('createdAt')->gt($startDate)
            ->getQuery()->count();
    }

    /**
     *
     * @param string $ip
<<<<<<< HEAD
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttempt | null
     */



=======
     * @return \Anyx\LoginGateBundle\Model\FailureLoginAttempt | null
     */
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
    public function getLastAttempt($ip)
    {
        return $this->createQueryBuilder()
            ->field('ip')->equals($ip)
<<<<<<< HEAD
            ->field('username')->equals($user)
=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
            ->field('username')->equals($user)
=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
            ->getQuery()
            ->execute();
    }
}
