<?php

namespace Ash\LoginGateBundle\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\Event;
use Ash\LoginGateBundle\Service\BruteForceChecker;


class BruteForceAttemptEvent extends Event
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;
    
    /**
     *
     * @var \Ash\LoginGateBundle\Service\BruteForceChecker
     */
    private $bruteForceChecker;
    
    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Ash\LoginGateBundle\Service\BruteForceChecker $storage
     */
    public function __construct(Request $request, BruteForceChecker $bruteForceChecker)
    {
        $this->request = $request;
        $this->bruteForceChecker = $bruteForceChecker;
    }
    
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * 
     * @return \Ash\LoginGateBundle\Service\BruteForceChecker
     */
    public function getBruteForceChecker()
    {
        return $this->bruteForceChecker;
    }
}