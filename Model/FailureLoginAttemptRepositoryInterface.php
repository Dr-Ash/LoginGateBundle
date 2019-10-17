<?php

namespace Ash\LoginGateBundle\Model;

interface FailureLoginAttemptRepositoryInterface
{
    /**
     * @param string $ip
     * @param \DateTime $startDate
     * @return integer
     */
    public function getCountAttempts($ip,$user, \DateTime $startDate);

    /**
     * @param string $ip
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttempt | null
     */
    public function getLastAttempt($ip,$user);

    /**
     * @param string $ip
     * @return integer
     */
    public function clearAttempts($ip,$user);
}
