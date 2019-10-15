<?php

namespace Ash\LoginGateBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Ash\LoginGateBundle\Storage\StorageInterface;

class BruteForceChecker
{
    /**
     * @var \Ash\LoginGateBundle\Storage\DatabaseAccountStorage
     */
    protected $storage;

    /**
     * @var array
     */
    private $options = [
        'max_count_attempts' => 3,
        'timeout' => 60
    ];

    /**
     * @return \Ash\LoginGateBundle\Storage\DatabaseAccountStorage
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param \Ash\LoginGateBundle\Storage\DatabaseAccountStorage $storage
     * @param array $options
     */
    public function __construct(StorageInterface $storage, array $options)
    {
        $this->storage = $storage;
        $this->options = $options;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return boolean
     */
    public function canLogin(Request $request)
    {
//        dd($this->getStorage()->getCountAttempts($request));
        $oo = $this->getStorage()->getCountAttempts($request);
//        $request->getSession()->clear();
        if ($oo >= $this->options['max_count_attempts']) {

            $lastAttemptDate = $oo;
            $dateAllowLogin = $lastAttemptDate->modify('+' . $this->options['timeout'] . ' second');

            if ($dateAllowLogin->diff(new \DateTime())->invert === 1) {

                return false;
            }
        }

        return true;
    }
}
