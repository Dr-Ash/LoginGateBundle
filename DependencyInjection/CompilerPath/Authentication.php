<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\DependencyInjection\CompilerPath;
=======
namespace Anyx\LoginGateBundle\DependencyInjection\CompilerPath;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class Authentication implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $container->getDefinition('security.authentication.listener.form')
<<<<<<< HEAD
            ->setClass($container->getParameter('Ash.login_gate.authentication.listener.form.class'))
            ->addMethodCall(
                'setBruteForceChecker',
                [
                    new Reference('Ash.login_gate.brute_force_checker')
=======
            ->setClass($container->getParameter('anyx.login_gate.authentication.listener.form.class'))
            ->addMethodCall(
                'setBruteForceChecker',
                [
                    new Reference('anyx.login_gate.brute_force_checker')
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
                ]
            )
            ->addMethodCall(
                'setDispatcher',
                [
                    new Reference('event_dispatcher')
                ]
            );


<<<<<<< HEAD
        $compositeStorageDefinition = $container->getDefinition('Ash.login_gate.attempt_storage');
        $chosenStorages = [];

        foreach ($container->getParameter('Ash.login_gate.storages') as $storageName) {
=======
        $compositeStorageDefinition = $container->getDefinition('anyx.login_gate.attempt_storage');
        $chosenStorages = [];

        foreach ($container->getParameter('anyx.login_gate.storages') as $storageName) {
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
            $chosenStorages[] = new Reference($storageName);
        }

        $compositeStorageDefinition->setArguments([$chosenStorages]);
    }
}
