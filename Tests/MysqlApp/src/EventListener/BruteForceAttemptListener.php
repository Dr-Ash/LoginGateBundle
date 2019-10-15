<?php

namespace MysqlAppBundle\EventListener;

use Ash\LoginGateBundle\Event\BruteForceAttemptEvent;

class BruteForceAttemptListener
{
    public function onBruteForceAttempt(BruteForceAttemptEvent $event)
    {
        throw new \RuntimeException('BRUTE FORCE ATTEMPT');
    }
}
