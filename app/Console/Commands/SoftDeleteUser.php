<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SoftDeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:cron';

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
        User::onlyTrashed()->forceDelete();
    }
}
