LoginGateBundle
==============

<<<<<<< HEAD
[![Build Status](https://travis-ci.org/Ash/LoginGateBundle.svg?branch=master)](https://travis-ci.org/Ash/LoginGateBundle)
=======
[![Build Status](https://travis-ci.org/anyx/LoginGateBundle.svg?branch=master)](https://travis-ci.org/anyx/LoginGateBundle)
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

This bundle detects brute-force attacks on Symfony applications. It then will disable login for attackers for a certain period of time.
This bundle also provides special events to execute custom handlers when a brute-force attack is detected.

## Compatability
The bundle is since version 0.6 compatible with Symfony 4.

## Installation
Add this bundle via Composer:
```
<<<<<<< HEAD
composer require Ash/login-gate-bundle
=======
composer require anyx/login-gate-bundle
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
```
## Configuration:

Add in app/config/config.yml:

```yml
login_gate:
    storages: ['orm'] # Attempts storages. Available storages: ['orm', 'session', 'mongodb']
    options:
        max_count_attempts: 3
        timeout: 600 #Ban period
        watch_period: 3600 #Only for databases storage. Period of actuality attempts
 ```
### Register event handler (optional).
```yml
services:
      acme.brute_force_listener:
          class: Acme\BestBundle\Listener\BruteForceAttemptListener
          tags:
              - { name: kernel.event_listener, event: security.brute_force_attempt, method: onBruteForceAttempt }
```

## Usage
In the following example we import the checker via dependency injection in SecurityController.php.
```php
namespace App\Controller;

<<<<<<< HEAD
use Ash\LoginGateBundle\Service\BruteForceChecker;
=======
use Anyx\LoginGateBundle\Service\BruteForceChecker;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

/**
 * @var BruteForceChecker $bruteForceChecker
 */
private $bruteForceChecker;

/**
 * SecurityController constructor.
 * @param BruteForceChecker $bruteForceChecker
 */
public function __construct(BruteForceChecker $bruteForceChecker)
{
    $this->bruteForceChecker = $bruteForceChecker;
}
```
We can now use the checker to see if a person is allowed to login.
```php
$this->bruteForceChecker->canLogin($request)
```
We can also clear the loginattempts when a login is succesful.
```php
$this->bruteForceChecker->getStorage()->clearCountAttempts($request);
```

<<<<<<< HEAD
For more examples take a look at the [tests](https://github.com/Ash/LoginGateBundle/tree/master/Tests).
=======
For more examples take a look at the [tests](https://github.com/anyx/LoginGateBundle/tree/master/Tests).
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
