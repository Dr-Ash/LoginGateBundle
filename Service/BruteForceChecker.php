<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Ash\LoginGateBundle\Storage\StorageInterface;
=======
namespace Anyx\LoginGateBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Anyx\LoginGateBundle\Storage\StorageInterface;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

class BruteForceChecker
{
    /**
<<<<<<< HEAD
     * @var \Ash\LoginGateBundle\Storage\DatabaseAccountStorage
=======
     * @var \Anyx\LoginGateBundle\Storage\StorageInterface
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
     * @return \Ash\LoginGateBundle\Storage\DatabaseAccountStorage
=======
     * @return \Anyx\LoginGateBundle\Storage\StorageInterface
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
<<<<<<< HEAD
     * @param \Ash\LoginGateBundle\Storage\DatabaseAccountStorage $storage
=======
     * @param \Anyx\LoginGateBundle\Storage\StorageInterface $storage
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
<<<<<<< HEAD
//        dd($this->getStorage()->getCountAttempts($request));
        $oo = $this->getStorage()->getCountAttempts($request);
//        $request->getSession()->clear();
        if ($oo >= $this->options['max_count_attempts']) {

            $lastAttemptDate = $oo;
            $dateAllowLogin = $lastAttemptDate->modify('+' . $this->options['timeout'] . ' second');

            if ($dateAllowLogin->diff(new \DateTime())->invert === 1) {

=======
        if ($this->getStorage()->getCountAttempts($request) >= $this->options['max_count_attempts']) {

            $lastAttemptDate = $this->getStorage()->getLastAttemptDate($request);
            $dateAllowLogin = $lastAttemptDate->modify('+' . $this->options['timeout'] . ' second');

            if ($dateAllowLogin->diff(new \DateTime())->invert === 1) {
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
                return false;
            }
        }

        return true;
    }
}
