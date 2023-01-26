<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Start;

class runApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avby:runApp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command run App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Start::start();

    }
}
