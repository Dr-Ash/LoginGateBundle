<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Storage;
=======
namespace Anyx\LoginGateBundle\Storage;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class CompositeStorage implements StorageInterface
{
    /**
     * @var array
     */
    protected $storages = [];

    /**
     * @param array $storages
     */
    public function __construct(array $storages)
    {
        foreach ($storages as $storage) {
            $this->addStorage($storage);
        }
    }

    /**
     * @return array
     */
    public function getStorages()
    {
        return $this->storages;
    }

    /**
<<<<<<< HEAD
     * @param \Ash\LoginGateBundle\Storage\StorageInterface $storage
=======
     * @param \Anyx\LoginGateBundle\Storage\StorageInterface $storage
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function addStorage(StorageInterface $storage)
    {
        $this->storages[] = $storage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function clearCountAttempts(Request $request)
    {
        foreach ($this->getStorages() as $storage) {
            $storage->clearCountAttempts($request);
        }
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function getCountAttempts(Request $request)
    {
        $countAttempts = array();
        
        foreach ($this->getStorages() as $storage) {
            $countAttempts[] = $storage->getCountAttempts($request);
        }

        return (int) max($countAttempts);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \DateTime | false
     */
    public function getLastAttemptDate(Request $request)
    {
        $date = false;
        foreach ($this->getStorages() as $storage) {
            $storageDate = $storage->getLastAttemptDate($request);
            if (!empty($storageDate) && (empty($date) || $storageDate->diff($date)->invert == 1)) {
                $date = $storageDate;
            }
        }
        return $date;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Exception\AuthenticationException $exception
     */
    public function incrementCountAttempts(Request $request, AuthenticationException $exception)
    {
        foreach ($this->getStorages() as $storage) {
            $storage->incrementCountAttempts($request, $exception);
        }
    }
}
