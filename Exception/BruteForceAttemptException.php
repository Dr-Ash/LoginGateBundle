<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Exception;
=======
namespace Anyx\LoginGateBundle\Exception;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\Security\Core\Exception\AuthenticationException;

class BruteForceAttemptException extends AuthenticationException
{
    /**
     * @return string
     */
    public function getMessageKey()
    {
        return 'Too many authentication failures.';
    }
}
