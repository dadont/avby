<?php

namespace App\Services;

use App\Services\Curl;
use App\Services\SendTextBot;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use Illuminate\Support\Str;


Class Start
{

    public static function start()
    {

    $url = 'https://mixnews.lv/prikolnye-kartinki';
    //$url = 'https://cars.av.by/filter?price_currency=1&sort=4';
    $response = Curl::curl($url);
    sleep(5);
    //var_dump($response);
    $crawler = new Crawler($response);
    $div = $crawler->filter('div')->each(function($node) {
        return $node->html();
    });
    //dd($div);
    //foreach($div as $key => $value){
    //    if(preg_match_all('#(?:https)://mixnews.lv/wp-content[^\s\,\>\"]+#i', $value, $matches)){
    //        var_dump($matches);
    //    }
    //    var_dump($key, $value);
    //}
    //dd(sizeof($div));
    //div11? 17? 21
    if($div[11]){

        preg_match_all('#(?:https?|ftp)://mixnews.lv/prikolnye-kartinki[^\s\,\>\"]+#i', $div[11], $matches);
        //dd($matches[0][0]);

        if(array_key_exists(0, $matches[0]) == false){
            SendTextBot::sendTextBot("139690170", "Ошибка div");
            exit;
        }
        $url=$matches[0][0];
        //'https://mixnews.lv/anekdoty/2024/03/30/yumor-za-den-i-uvelichitelno-laskatelnye/';//'https://mixnews.lv/anekdoty/2024/03/31/udivili-i-rassmeshili-foto-na-kotoryh-tvoritsya-kakaya-to-dich-2/';//$matches[0][0];

        $cache_url = Cache::get('url');
        //dd($cache_url, $url);
        if ($url != $cache_url){

            Cache::put('url', $url);
            $response = Curl::curl($url);
            //dd($response);
            //Storage::put('test.txt', $response);
            //dd($response);
            sleep(5);
            //Storage::put('test2.txt', $response);
            $crawler = new Crawler($response);
            //dd($crawler);
            $div = $crawler->filter('div')->each(function($node) {
                return $node->html();
            });
            //dd($div[9]);
            preg_match_all('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*-\d+.(webp|jpg|png)/i', $div[9], $matches);
            //dd($matches[0]);//Storage::put('test2.txt', '123');
            //dd($div[9]);
            foreach($matches[0] as $key => $value){

                    $post = Post::where('title', $value)->get();
                    print($post);
                    if (!sizeof($post))
                        {Post::create(['title' => $value]);
                        SendTextBot::sendPhotoBot($value);
                        }
                    sleep(5);
                };


                //print_r($value);
                //

        }
    }


    //SendTextBot::sendPhotoBot($matches[0][0]);
    //print_r(gettype($div));

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
