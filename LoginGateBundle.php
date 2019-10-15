<?php

namespace Ash\LoginGateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Ash\LoginGateBundle\DependencyInjection\CompilerPath;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LoginGateBundle extends Bundle
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CompilerPath\Authentication());
    }
}
