<?php

namespace Ash\LoginGateBundle\DependencyInjection\CompilerPath;

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
            ->setClass($container->getParameter('Ash.login_gate.authentication.listener.form.class'))
            ->addMethodCall(
                'setBruteForceChecker',
                [
                    new Reference('Ash.login_gate.brute_force_checker')
                ]
            )
            ->addMethodCall(
                'setDispatcher',
                [
                    new Reference('event_dispatcher')
                ]
            );


        $compositeStorageDefinition = $container->getDefinition('Ash.login_gate.attempt_storage');
        $chosenStorages = [];

        foreach ($container->getParameter('Ash.login_gate.storages') as $storageName) {
            $chosenStorages[] = new Reference($storageName);
        }

        $compositeStorageDefinition->setArguments([$chosenStorages]);
    }
}
