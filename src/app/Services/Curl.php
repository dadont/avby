<?php

namespace App\Services;


class Curl
{
    public static function curl($url)
    {

        $headers = []; // создаем заголовки
        
        $curl = curl_init(); // создаем экземпляр curl
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1); 
        curl_setopt($curl, CURLOPT_POST, false); // 
        curl_setopt($curl, CURLOPT_URL, $url);
        
        return curl_exec($curl);
        

    }
}
