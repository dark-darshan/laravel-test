<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class SoftDeletePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:cron';

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
        Post::onlyTrashed()->forceDelete();
    }
}
