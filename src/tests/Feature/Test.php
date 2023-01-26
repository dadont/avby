<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\Curl;
use Symfony\Component\DomCrawler\Crawler;

class Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $url = 'https://cars.av.by/filter?price_currency=1&sort=4';
        $response = Curl::curl($url);

    }
}
