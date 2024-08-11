<?php

namespace Untek\Model\Cqrs;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Untek\Model\Cqrs\Application\Abstract\CqrsHandlerInterface;
use Untek\Model\Cqrs\Infrastructure\DependencyInjection\CqrsExtension;
use Untek\Model\Cqrs\Infrastructure\DependencyInjection\CqrsPass;

class CqrsBundle extends AbstractBundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CqrsPass());
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->registerForAutoconfiguration(CqrsHandlerInterface::class)
            ->addTag('cqrs.handler');
        $container->import(__DIR__ . '/resources/config/services/main.php');
    }
}
