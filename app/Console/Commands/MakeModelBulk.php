<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeModelBulk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-model-bulk {--models= : model list, separate by coma (,)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $models = $this->option('models');
        foreach (explode(',',$models) as $model) {
            $this->info('Make Model '.$model);
            Artisan::call('make:model', ['name' => $model]);

        }
    }
}
