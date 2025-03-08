<?php

namespace App\Console\Commands;

use App\Jobs\ScrapLaptopDetailJob;
use App\Models\ScrapedLaptop;
use Illuminate\Console\Command;

class LaptopArenaScrapDetailCommand extends Command
{
    protected $signature = 'app:laptop-arena-scrap-detail';

    protected $description = 'Scraping laptop detail from LaptopArena';

    public function handle(): void
    {
        $this->info('| ------------------------------------------------------------------------------');
        $this->info('| Laptop Arena Scrap Detail');
        $this->info('| v.0.0.1');
        $this->info('| ------------------------------------------------------------------------------');

        ScrapedLaptop::where('status', 'pending')
            ->orderBy('id', 'asc')
            ->chunk(10, function ($links) {
                foreach ($links as $link) {
                    ScrapLaptopDetailJob::dispatch($link);
                    $this->info("| Dispatched job for {$link->url}");
                }
            });

        $this->info('| All jobs dispatched. Monitor queue worker for progress.');
    }
}
