<?php


namespace App;


use GuzzleHttp\Client;

class RunTestFromUrl
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Start test, given a specifc URL
     *
     * @param string $startUrl
     */
    public function start( string $startUrl )
    {
        //Should be async
        $this
            ->client
            ->request('GET', $startUrl, ['timeout' => 1, ]);

    }
}