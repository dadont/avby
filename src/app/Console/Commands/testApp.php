<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Services\FindAndBuy;
use App\Services\SendTextBot;
use Tests\TestCase;


class testApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testApp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command test App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SendTextBot::sendTextBot('139690170');


        //$response = new(TestCase::class);
        //$response2 = $response->get('/api/v1/my_bal/all');
        //dd($response2);
        //FindAndBuy::check();
    }
}
