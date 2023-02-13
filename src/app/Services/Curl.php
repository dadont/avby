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
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
        
        return curl_exec($curl);
        

    }
}
