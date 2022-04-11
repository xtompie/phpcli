<?php

declare(strict_types=1);

namespace App\Test;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AsCommand('test:test')]
#[AutoconfigureTag('command')]
class TestCommand extends Command
{
    public function __construct(
        protected TestService $testService,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln($this->testService->__invoke());
        return Command::SUCCESS;
    }
}