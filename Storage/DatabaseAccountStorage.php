<?php

namespace Ash\LoginGateBundle\Storage;

use Ash\LoginGateBundle\Exception\BruteForceAttemptException;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class DatabaseAccountStorage implements StorageInterface
{
    /**
     * @var string
     */
    private $modelClassName;


    private $authEvent;
    /**
     * @var integer
     */
    private $watchPeriod = 200;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $objectManager;

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $objectManager
     * @param string $entityClass
     * @param integer $watchPeriod
     */
    public function __construct(ObjectManager $objectManager, $entityClass, $watchPeriod)
    {
        $this->objectManager = $objectManager;
        $this->modelClassName = $entityClass;
        $this->watchPeriod = $watchPeriod;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function clearCountAttempts(Request $request)
    {
        if (!$this->hasIp($request)) {
            return;
        }

        $this->getRepository()->clearAttempts($request->getClientIp(),$this->getUsername($request));
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return integer
     */
    public function getCountAttempts(Request $request)
    {
        if (!$this->hasIp($request)) {
            return 0;
        }
        $startWatchDate = new \DateTime();
        $startWatchDate->modify('-' . $this->getWatchPeriod(). ' second');

//        dump($this->getRepository()->getCountAttempts($request->getClientIp(), $this->getUsername($request), $startWatchDate));
//        dd($request->getClientIp(), $this->getUsername($request));
        return $this->getRepository()->getCountAttempts($request->getClientIp(), $this->getUsername($request), $startWatchDate);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \DateTime|false
     */
    public function getLastAttemptDate(Request $request)
    {


        if (!$this->hasIp($request)) {
            return false;
        }

        $lastAttempt = $this->getRepository()->getLastAttempt($request->getClientIp(),$this->getUsername($request));
        if (!empty($lastAttempt)) {
            return $lastAttempt->getCreatedAt();
        }

        return false;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Exception\AuthenticationException $exception
     */
    public function incrementCountAttempts(Request $request, AuthenticationException $exception)
    {
        if ($exception instanceof BruteForceAttemptException) {
            return;
        }

        if (!$this->hasIp($request)) {
            return;
        }
        $model = $this->createModel();

        $model->setIp($request->getClientIp());


        $data = [
            'exception' => $exception->getMessage(),
            'clientIp'  => $request->getClientIp(),
            'sessionId' => $request->getSession()->getId()
        ];

        $username = $request->get('_username');
        if (!empty($username)) {
            $data['user'] = $username;
        }

        $model->setData($data);
        $model->setUsername($username);
        $objectManager = $this->getObjectManager();

        $objectManager->persist($model);
        $objectManager->flush($model);
    }

    /**
     * @return integer
     */
    protected function getWatchPeriod()
    {
        return $this->watchPeriod;
    }

    /**
     * @return string
     */
    protected function createModel()
    {
        return new $this->modelClassName;
    }

    /**
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface
     */
    protected function getRepository()
    {
        return $this->getObjectManager()->getRepository($this->modelClassName);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return boolean
     */
    protected function hasIp(Request $request)
    {
//        $request->getSession()->get('_security.last_username');
        return $request->getClientIp() != '';
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return string
     */
    protected function getUsername(Request $request)
    {


        return $request->get('_username') ?? $request->getSession()->get('_security.last_username');
//        return $this->authEvent->getAuthenticationToken()->getUsername();
//        dd($request->getSession()->get('_security.last_username'));
//        return $request->getSession()->get('_security.last_username');
    }
}
