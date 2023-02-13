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

    $url = 'https://mixnews.lv/prikolnye-kartinki';
    //$url = 'https://cars.av.by/filter?price_currency=1&sort=4';
    $response = Curl::curl($url);
    //Storage::put('test.txt', $response);
    //var_dump($response);
    $crawler = new Crawler($response);
    $div = $crawler->filter('div')->each(function($node) {
        return $node->html();
    });

    preg_match_all('#(?:https?|ftp)://[^\s\,]+#i', $div[13], $matches);
    var_dump($matches);
    //print_r(gettype($div[13]));
    
    //$document = new Document($response, true);
    //Storage::put('test.log', print_r(gettype($crawler)));
    //var_dump($crawler);
    //$links = $document->find('a[href^=/]::attr(href)');

    //var_dump($links);

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