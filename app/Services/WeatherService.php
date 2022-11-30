<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;

class WeatherService
{

    public static $apiKey;
    public static $url;
    

    public function __construct()
    {
        self::$apiKey = '1a38d445349db87446e21b7d9df3b1ae';
        self::$url = 'https://api.openweathermap.org/data/2.5/weather?';
        
       
    }

    /**
     * Use curl and get the response
     *
     * @return function
     */
    public static function getData($user)
    {
        $url = self::$url.'lat='.$user->lat.'&lon='.$user->long.'&appid='.self::$apiKey;
     
            $response = Curl::to($url)
                            ->returnResponseObject()
                            ->get();
           
            return $response;

    }

    
}
