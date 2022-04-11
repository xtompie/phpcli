<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return function(ContainerConfigurator $configurator) {
    $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
        ->load('App\\', '../src/*')
        ->set(\App\Shared\Kernel\Kernel::class)
            ->public()
            ->args([tagged_iterator('command')])
    ;
    $configurator->services()->instanceof(\Symfony\Component\Console\Command\Command::class)
        ->tag('command');
};
