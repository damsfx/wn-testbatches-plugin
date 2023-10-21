<?php namespace Hounddd\TestBatches\Console;

use Winter\Storm\Console\Command;

class SeedQueue extends Command
{
    /**
     * @var string The console command name.
     */
    protected static $defaultName = 'testbatches:seedqueue';

    /**
     * @var string The name and signature of this command.
     */
    protected $signature = 'testbatches:seedqueue
        {myCustomArgument : Example argument. <info>Additional information</info>}
        {--f|force : Force the operation to run and ignore production warnings and confirmation questions.}';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->output->writeln('Hello world!');
    }

    /**
     * Provide autocomplete suggestions for the "myCustomArgument" argument
     */
    // public function suggestMyCustomArgumentValues(): array
    // {
    //     return ['value', 'another'];
    // }
}
