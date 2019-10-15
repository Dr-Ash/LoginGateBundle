<?php

namespace Ash\LoginGateBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use Ash\LoginGateBundle\Model\FailureLoginAttempt as BaseFailureLoginAttempt;

class FailureLoginAttempt extends BaseFailureLoginAttempt
{
}
