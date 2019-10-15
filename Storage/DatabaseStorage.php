<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Storage;

use Ash\LoginGateBundle\Exception\BruteForceAttemptException;
=======
namespace Anyx\LoginGateBundle\Storage;

use Anyx\LoginGateBundle\Exception\BruteForceAttemptException;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class DatabaseStorage implements StorageInterface
{
    /**
     * @var string
     */
    private $modelClassName;

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

<<<<<<< HEAD
        $this->getRepository()->clearAttempts($request->getClientIp(),$this->getUsername($request));
=======
        $this->getRepository()->clearAttempts($request->getClientIp());
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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

<<<<<<< HEAD
        return $this->getRepository()->getCountAttempts($request->getClientIp(), $this->getUsername($request),$startWatchDate);
=======
        return $this->getRepository()->getCountAttempts($request->getClientIp(), $startWatchDate);
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \DateTime|false
     */
    public function getLastAttemptDate(Request $request)
    {
<<<<<<< HEAD


=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
        if (!$this->hasIp($request)) {
            return false;
        }

<<<<<<< HEAD
        $lastAttempt = $this->getRepository()->getLastAttempt($request->getClientIp(),$this->getUsername($request));
=======
        $lastAttempt = $this->getRepository()->getLastAttempt($request->getClientIp());
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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

<<<<<<< HEAD

=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
        $model->setUsername($username);
=======

>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
     * @return \Ash\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface
=======
     * @return \Anyx\LoginGateBundle\Model\FailureLoginAttemptRepositoryInterface
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
        $request->getSession()->get('_security.last_username');
        return $request->getClientIp() != '';
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return string
     */
    protected function getUsername(Request $request)
    {
        return $request->getSession()->get('_security.last_username');
    }
=======
        return $request->getClientIp() != '';
    }
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
}
