<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Storage;
=======
namespace Anyx\LoginGateBundle\Storage;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


interface StorageInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return integer
     */
    public function getCountAttempts(Request $request);

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Exception\AuthenticationException $exception
     */
    public function incrementCountAttempts(Request $request, AuthenticationException $exception);
    
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function clearCountAttempts(Request $request);

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function getLastAttemptDate(Request $request);
}
