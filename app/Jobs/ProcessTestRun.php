<?php

namespace App\Jobs;

use App\RunTestFromUrl;
use App\TestRun;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessTestRun implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $testRun;
    protected $client;
    /**
     * Create a new job instance.
     *
     * @param TestRun $testRun
     */
    public function __construct( TestRun $testRun )
    {
        $this->testRun = $testRun;
    }

    /**
     * Run all tests of this TestRun
     *
     * @return void
     */
    public function handle( RunTestFromUrl $runTestFromUrl )
    {
        //Should not be needed here as we should be encapsulating this more
        if( ! empty( $this->testRun->testLists ) ){
            foreach ( $this->testRun->testLists as $url ){
                $runTestFromUrl->start($url);
            }
        }
    }
}
