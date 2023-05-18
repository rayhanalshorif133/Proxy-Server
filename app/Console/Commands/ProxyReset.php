<?php

namespace App\Console\Commands;
use App\Models\StoreProxy;
use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;

class ProxyReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:proxy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Executing');
        return true;
        // $this->info('Executing command');
    }
}
