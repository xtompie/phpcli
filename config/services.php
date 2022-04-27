<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return function(ContainerConfigurator $configurator) {
    $services = $configurator->services();

    $services->defaults()->autowire()->autoconfigure();

    $services->instanceof(\Symfony\Component\Console\Command\Command::class)
        ->tag('command');

    $services->load('App\\', '../src/*');

    $services->defaults()
        ->set(\App\Shared\Kernel\Kernel::class)->public()->args([tagged_iterator('command')])
    ;

};
