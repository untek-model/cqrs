<?php

namespace Untek\Model\Cqrs;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Untek\Model\Cqrs\Application\Abstract\CqrsHandlerInterface;

class CqrsBundle extends AbstractBundle
{

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->registerForAutoconfiguration(CqrsHandlerInterface::class)
            ->addTag('cqrs.handler');
        $container->import(__DIR__ . '/resources/config/services/main.php');
    }
}
