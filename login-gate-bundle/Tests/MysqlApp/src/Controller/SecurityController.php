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

        /** @var \Ash\LoginGateBundle\Service\BruteForceChecker $bruteForceChecker */
        $bruteForceChecker = $this->get('Ash.login_gate.brute_force_checker');

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
