<?php

namespace Ash\LoginGateBundle\Security;

use Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener as BaseListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Ash\LoginGateBundle\Service\BruteForceChecker;
use Ash\LoginGateBundle\Security\Events as SecurityEvents;
use Ash\LoginGateBundle\Event\BruteForceAttemptEvent;
use Ash\LoginGateBundle\Exception\BruteForceAttemptException;

class UsernamePasswordFormAuthenticationListener extends BaseListener
{
    /**
     * @var \Ash\LoginGateBundle\Service\BruteForceChecker
     */
    protected $bruteForceChecker;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @return \Ash\LoginGateBundle\Service\BruteForceChecker
     */
    public function getBruteForceChecker()
    {
        return $this->bruteForceChecker;
    }

    /**
     * @param \Ash\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker
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
