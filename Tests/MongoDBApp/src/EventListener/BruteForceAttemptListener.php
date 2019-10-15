<?php

namespace MongodbAppBundle\EventListener;

<<<<<<< HEAD
use Ash\LoginGateBundle\Event\BruteForceAttemptEvent;
=======
use Anyx\LoginGateBundle\Event\BruteForceAttemptEvent;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

class BruteForceAttemptListener
{
    public function onBruteForceAttempt(BruteForceAttemptEvent $event)
    {
        throw new \RuntimeException('BRUTE FORCE ATTEMPT');
    }
}
