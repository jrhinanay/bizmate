<?php
include_once 'service/baseAppService.php';

class WeatherAppService extends baseAppService{
    const WEATHER_FORCAST_URL = 'https://api.openweathermap.org/data/2.5/forecast';
    const API_ID = 'b0255af8b8018d9d9d70003439b0f990';
    
    public function getWeatherByLocation(string $location) : array{
        
        $locationUrl = self::WEATHER_FORCAST_URL . "?q=$location&appid=" . self::API_ID;
        $response = $this->sendRequest($locationUrl, "GET");
        
        return json_decode($response, true) ?? [];
        
    }
}

