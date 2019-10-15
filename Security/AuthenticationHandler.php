<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Security;
=======
namespace Anyx\LoginGateBundle\Security;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;
<<<<<<< HEAD
use Ash\LoginGateBundle\Storage\StorageInterface;
=======
use Anyx\LoginGateBundle\Storage\StorageInterface;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

class AuthenticationHandler implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\RequestStack
     */
    private $requestStack;

    /**
<<<<<<< HEAD
     * @var \Ash\LoginGateBundle\Storage\StorageInterface
=======
     * @var \Anyx\LoginGateBundle\Storage\StorageInterface
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    private $storage;

    /**
     * @param \Symfony\Component\HttpFoundation\RequestStack $requestStack
<<<<<<< HEAD
     * @param \Ash\LoginGateBundle\Storage\StorageInterface $storage
=======
     * @param \Anyx\LoginGateBundle\Storage\StorageInterface $storage
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function __construct(RequestStack $requestStack, StorageInterface $storage)
    {
        $this->requestStack = $requestStack;
        $this->storage = $storage;
    }

    public static function getSubscribedEvents()
    {
        return [
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
            SecurityEvents::INTERACTIVE_LOGIN => 'onInteractiveLogin'
        ];
    }

    public function onAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        $request = $this->getRequestStack()->getCurrentRequest();
        $this->getStorage()->incrementCountAttempts($request, $event->getAuthenticationException());
    }

    public function onInteractiveLogin(InteractiveLoginEvent $event)
    {
        $request = $this->getRequestStack()->getCurrentRequest();
        $this->getStorage()->clearCountAttempts($request);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    public function getRequestStack()
    {
        return $this->requestStack;
    }

    /**
<<<<<<< HEAD
     * @return \Ash\LoginGateBundle\Storage\StorageInterface
=======
     * @return \Anyx\LoginGateBundle\Storage\StorageInterface
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function getStorage()
    {
        return $this->storage;
    }
}
