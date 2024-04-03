<?php

namespace App\Services;

class SendTextBot
{

    public static function sendTextBot($chatId, $text = "TEST"){
        $bot = config('services.bot');
        $url_bot = $bot['web_site'].$bot['bot_token']."/sendmessage?chat_id=".$chatId."&text=".$text;
        $response = file_get_contents($url_bot);
        return $response;
    }

    public static function sendImageBot($chatId, $image, $caption){
        $bot = config('services.bot');
        $arrayQuery = array(
            'chat_id' => $chatId,
            'caption' => $caption,
            'photo' => curl_file_create(__DIR__ . '/'.$image, 'image/jpg' , $image)
        );
        $ch = curl_init('https://api.telegram.org/bot'. $bot['bot_token'] .'/sendPhoto');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
    }

    public static function sendButtonBot($chatId, $text, $arrayButtons){
    $inline_keyboard = array($arrayButtons);
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    $bot = config('services.bot');
        $url_bot = $bot['web_site'].$bot['bot_token']."/sendmessage?chat_id=".$chatId."&text=".$text.'&reply_markup=' . $replyMarkup;
        $response = file_get_contents($url_bot);

    }

    public static function sendPhotoBot($url){
        $bot = config('services.bot');
        $arrayQuery = array(
            'chat_id' => $bot['chat_id'],
            'photo' => $url,
            'parse_mode' => "html",
        );

        $ch = curl_init('https://api.telegram.org/bot'. $bot['bot_token'] .'/sendPhoto');
        //dd($ch);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        //dd($res);
        curl_close($ch);
    }


}
