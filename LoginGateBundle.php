<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Ash\LoginGateBundle\DependencyInjection\CompilerPath;
=======
namespace Anyx\LoginGateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Anyx\LoginGateBundle\DependencyInjection\CompilerPath;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
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
