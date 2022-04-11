<?php

declare(strict_types=1);

namespace App\Test;

class TestService
{
    public function __invoke(): string
    {
        return 'test';
    }
}
