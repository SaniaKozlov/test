<?php

namespace App\Console\Commands;

use App\Services\PandaScopeStoreService;
use App\Services\PandaScoreApiService;
use Illuminate\Console\Command;

class ImportData extends Command
{
    protected $signature = 'data:import';

    protected $description = 'Import data from pandascore.co';

    public function handle():void
    {
        $data = app(PandaScoreApiService::class)->getUpcomingMachs();
        if ($data) {
            app(PandaScopeStoreService::class)->parseData($data);
        }
    }
}
