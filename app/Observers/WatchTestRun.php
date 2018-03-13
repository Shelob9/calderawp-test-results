<?php


namespace App\Observers;

use App\Jobs\ProcessTestRun;
use App\TestRun;
use GuzzleHttp\Client;

class WatchTestRun
{
    protected $client;
    public function __construct( Client $client )
    {
        $this->client = $client;
    }

    /**
     * When test run is created, find its test URLs and dispatch them.
     *
     * @param TestRun $testRun
     */
    public function created( TestRun $testRun )
    {

        if (empty( $testRun->testLists )) {
            $testListUrl = $testRun->testListUrl;
            if (filter_var($testListUrl, FILTER_VALIDATE_URL)) {
                $r = $this->client->get($testListUrl);
                if (!empty($tests = json_decode($r->getBody()->getContents()))) {
                    $collectedTests = [];
                    foreach ($tests as $i => $testUrl) {
                        if (!filter_var($testUrl, FILTER_VALIDATE_URL)) {
                           continue;
                        } else {
                            $collectedTests[] = $testUrl;
                        }
                    }
                }

                if (!empty($collectedTests)) {
                    $testRun->testLists = $collectedTests;
                    $testRun->save();
                    ProcessTestRun::dispatch($testRun);
                }

            } else {
                $testRun->testLists = [];
                $testRun->save();
            }
        }

    }

}