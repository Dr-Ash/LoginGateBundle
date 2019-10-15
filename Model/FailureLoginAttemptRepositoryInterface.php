<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Model;
=======
namespace Anyx\LoginGateBundle\Model;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

interface FailureLoginAttemptRepositoryInterface
{
    /**
     * @param string $ip
     * @param \DateTime $startDate
     * @return integer
     */
<<<<<<< HEAD
    public function getCountAttempts($ip,$user, \DateTime $startDate);

    /**
     * @param string $ip
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttempt | null
     */
    public function getLastAttempt($ip,$user);
=======
    public function getCountAttempts($ip, \DateTime $startDate);

    /**
     * @param string $ip
     * @return \Anyx\LoginGateBundle\Model\FailureLoginAttempt | null
     */
    public function getLastAttempt($ip);
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

    /**
     * @param string $ip
     * @return integer
     */
<<<<<<< HEAD
    public function clearAttempts($ip,$user);
=======
    public function clearAttempts($ip);
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
}
