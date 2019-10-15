<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Security;
=======
namespace Anyx\LoginGateBundle\Security;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener as BaseListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

<<<<<<< HEAD
use Ash\LoginGateBundle\Service\BruteForceChecker;
use Ash\LoginGateBundle\Security\Events as SecurityEvents;
use Ash\LoginGateBundle\Event\BruteForceAttemptEvent;
use Ash\LoginGateBundle\Exception\BruteForceAttemptException;
=======
use Anyx\LoginGateBundle\Service\BruteForceChecker;
use Anyx\LoginGateBundle\Security\Events as SecurityEvents;
use Anyx\LoginGateBundle\Event\BruteForceAttemptEvent;
use Anyx\LoginGateBundle\Exception\BruteForceAttemptException;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

class UsernamePasswordFormAuthenticationListener extends BaseListener
{
    /**
<<<<<<< HEAD
     * @var \Ash\LoginGateBundle\Service\BruteForceChecker
=======
     * @var \Anyx\LoginGateBundle\Service\BruteForceChecker
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    protected $bruteForceChecker;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
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

    /**
<<<<<<< HEAD
     * @param \Ash\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker
=======
     * @param \Anyx\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function setBruteForceChecker(BruteForceChecker $bruteForceChecker)
    {
        $this->bruteForceChecker = $bruteForceChecker;
    }

    /**
     * @return \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     */
    public function setDispatcher(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    protected function attemptAuthentication(Request $request)
    {
        if (!$this->getBruteForceChecker()->canLogin($request)) {

            $event = new BruteForceAttemptEvent($request, $this->getBruteForceChecker());

            $this->getDispatcher()->dispatch(SecurityEvents::BRUTE_FORCE_ATTEMPT, $event);

            throw new BruteForceAttemptException('Brute force attempt');
        }
        
        return parent::attemptAuthentication($request);
    }
}
