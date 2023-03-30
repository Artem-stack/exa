<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
protected $registerJob;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($registerJob)
    {
        $this->registerJob = $registerJob;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AudioProcessor $processor, $registerJob)
    {
       $registerJob = new RegisterJob();
    }
}
