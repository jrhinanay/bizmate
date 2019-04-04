<?php
include_once 'response/baseResponse.php';

class WeatherForecastResponse extends BaseResponse{
    public $main = null;
    public $weather = [];
    public $clouds = null;
    public $wind = null;
    public $rain = null;
    
    public function __construct($param){
        
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param);
    }   
    
    public function getClassName(){
        return "WeatherForecastResponse";
    }
    
}