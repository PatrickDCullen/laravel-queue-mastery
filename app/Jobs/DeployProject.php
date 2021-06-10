<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeployProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $container;
    public $site;
    public $latestCommitHash;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Site $site, $latestCommitHash)
    {
        $this->site = $site;
        $this->latestCommitHash = $latestCommitHash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->container->make('deployer')
            ->deploy(
                $this->side->latestCommitHash
            );
    }
}
