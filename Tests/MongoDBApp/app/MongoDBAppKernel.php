<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class MongoDBAppKernel extends Kernel
{
    public function boot()
    {
        umask(0002);
        return parent::boot();
    }

    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
<<<<<<< HEAD
            new Ash\LoginGateBundle\LoginGateBundle(),
=======
            new Anyx\LoginGateBundle\LoginGateBundle(),
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
            new MongoDBAppBundle\MongoDBAppBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }
}
