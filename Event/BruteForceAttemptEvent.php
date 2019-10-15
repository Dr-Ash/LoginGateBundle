<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\Event;
use Ash\LoginGateBundle\Service\BruteForceChecker;
=======
namespace Anyx\LoginGateBundle\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\Event;
use Anyx\LoginGateBundle\Service\BruteForceChecker;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c


class BruteForceAttemptEvent extends Event
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;
    
    /**
     *
<<<<<<< HEAD
     * @var \Ash\LoginGateBundle\Service\BruteForceChecker
=======
     * @var \Anyx\LoginGateBundle\Service\BruteForceChecker
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    private $bruteForceChecker;
    
    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
<<<<<<< HEAD
     * @param \Ash\LoginGateBundle\Service\BruteForceChecker $storage
=======
     * @param \Anyx\LoginGateBundle\Service\BruteForceChecker $storage
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
     * @return \Ash\LoginGateBundle\Service\BruteForceChecker
=======
     * @return \Anyx\LoginGateBundle\Service\BruteForceChecker
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function getBruteForceChecker()
    {
        return $this->bruteForceChecker;
    }
}