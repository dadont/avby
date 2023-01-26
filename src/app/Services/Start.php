<?php

namespace App\Services;

use App\Services\Curl;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Storage;
use DiDom\Document;
use DiDom\Query;

Class Start
{

    public static function start()
    {

    $url = 'https://cars.av.by/filter?price_currency=1&sort=4';
    //$response = Curl::curl($url);
    
    $document = new Document($url, true);
    $links = $document->find('a[href]::attr(href)');

    var_dump($links);

    //echo $document->first('title::text');

    //Storage::put('test.txt', $response);
    //$crawler = new Crawler($response);
    //Storage::put('test.log', print_r($crawler));
    //$i=0;
    //foreach ($crawler as $domElement) {
        //++$i;
        //Storage::put($i.'test.log', json_encode($domElement->filter('body > p')->first()));
        //var_dump($domElement);
    //}
    //dd(get_class_methods($crawler));
    //$linkCrawler = $crawler->filter('url');
    //var_dump($linkCrawler);

    }
}