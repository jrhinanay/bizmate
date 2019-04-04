<?php
include_once 'response/baseResponse.php';

class Main extends BaseResponse {
    public $temp = null;
    public $temp_min = null;
    public $temp_max = null;
    public $pressure = null;
    public $sea_level = null;
    public $grnd_level = null;
    public $humidity = null;
    public $temp_kf = null;
    
    public function __construct($param){
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param);
    }
        
    public function getClassName(){
        return "Main";
    }

}