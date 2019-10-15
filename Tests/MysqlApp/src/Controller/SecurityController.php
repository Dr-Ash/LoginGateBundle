<?php
namespace MysqlAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

<<<<<<< HEAD
        /** @var \Ash\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker */
        $bruteForceChecker = $this->get('Ash.login_gate.brute_force_checker');
=======
        /** @var \Anyx\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker */
        $bruteForceChecker = $this->get('anyx.login_gate.brute_force_checker');
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

        return $this->render(
            'login.html.php',
            [
                'canLogin' => $bruteForceChecker->canLogin($request),
                'lastUsername' => $lastUsername,
                'error' => $error,
            ]
        );
    }
}
