<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SummaryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a summary of data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Summary data has been created');
    }
}
