<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = 'redis';
    public $queue = 'notifications';
    public $backoff = 30; // or array or method
    public $timeout = 60;
    public $tries = 3;
    public $delay = 300;
    public $afterCommit = true;
    public $shouldBeEncrypted = true;

    public $uniqueId = 'products';
    public $uniqueFor = 10;

    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }

    public function uniqueId()
    {
        return $this->product->id;
    }

    public function retryUntil()
    {
        return now()->addDay();
    }
}
