<?php

declare(strict_types=1);

namespace App\Shared\Kernel;

use Symfony\Component\Console\Application;

class Kernel extends Application
{
    public function __construct(iterable $commands)
    {
        foreach ($commands as $command) {
            $this->add($command);
        }
        $config = require 'config/application.php';
        parent::__construct($config['name'], $config['version']);
    }
}
