<?php
<<<<<<< HEAD
namespace Ash\LoginGateBundle\DependencyInjection;;
=======
namespace Anyx\LoginGateBundle\DependencyInjection;;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LoginGateExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        foreach (['orm', 'mongodb'] as $storage) {
            if (in_array($storage, $config['storages'])) {
                $loader->load('services.' . $storage . '.yml');
            }
        }

        $chosenStorages = [];
        foreach ($config['storages'] as $storage) {
<<<<<<< HEAD
            $chosenStorages[] = 'Ash.login_gate.storage.' . $storage;
        }

        $container->setParameter('Ash.login_gate.storages', $chosenStorages);
        $container->setParameter('Ash.login_gate.brute_force_checker_options', $config['options']);
        $container->setParameter('Ash.login_gate.watch_period', $config['options']['watch_period']);
=======
            $chosenStorages[] = 'anyx.login_gate.storage.' . $storage;
        }

        $container->setParameter('anyx.login_gate.storages', $chosenStorages);
        $container->setParameter('anyx.login_gate.brute_force_checker_options', $config['options']);
        $container->setParameter('anyx.login_gate.watch_period', $config['options']['watch_period']);
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
    }
}
