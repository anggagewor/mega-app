<?php

namespace App\Console\Commands;

use App\Services\Dota2Service;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;

class Dota2SyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dota2-sync {--account= : Account ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $accountId = $this->option('account');
        $service = new Dota2Service($accountId);
        $this->info('| Sync Players | Account ID: '.$accountId);
        $service->getHero();
        $service->getPlayerHero();
        $service->getPlayerHero();
    }
}
