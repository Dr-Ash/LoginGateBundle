<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Tests;
=======
namespace Anyx\LoginGateBundle\Tests;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Doctrine\Common\DataFixtures\Executor\MongoDBExecutor;
use Doctrine\Common\DataFixtures\Purger\MongoDBPurger;
use Symfony\Bridge\Doctrine\DataFixtures\ContainerAwareLoader;
use Symfony\Component\HttpKernel\KernelInterface;

class MysqlAppTest extends AbstractLoginGateTestCase
{
    protected static function getKernelClass()
    {
        return 'MongoDBAppKernel';
    }

    protected function loadFixtures(KernelInterface $kernel)
    {
        $dm = $kernel->getContainer()->get('doctrine_mongodb.odm.document_manager');

        $loader = new ContainerAwareLoader($kernel->getContainer());
        $loader->loadFromDirectory($kernel->getRootDir() . '/../src/DataFixtures');

        $fixtures = $loader->getFixtures();

        $purger = new MongoDBPurger($dm);
        $executor = new MongoDBExecutor($dm, $purger);

        $executor->execute($fixtures);
        self::$referenceRepository = $executor->getReferenceRepository();
    }
}
