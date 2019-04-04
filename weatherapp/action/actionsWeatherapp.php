<?php
include_once 'service/weatherAppService.php';
include_once 'response/weatherForecastResponse.php';

class ActionsWeatherApp {
    const MAXIMUM_DAY_COUNT = 8;
    
    public function getWeather(){
        if(empty($_POST['location'])){
            return null;
        }       
               
        $weatherService = new WeatherAppService();
        $response = $weatherService->getWeatherByLocation(htmlentities($_POST['location']));
        
        $forecastList = [];
        if(!empty($response['list'])){
            $dayCounter = 0;        
            foreach($response['list'] as $forecast){
                if($dayCounter < self::MAXIMUM_DAY_COUNT){
                    $forecastList[$forecast['dt']] = new WeatherForecastResponse($forecast);
                }else{
                    break;
                }
                $dayCounter++;
            }
        }
                
        return $forecastList;
    }
}