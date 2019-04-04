<?php
include_once 'response/baseResponse.php';

class Weather extends BaseResponse{
    public $main = null;
    public $description = null;   
    
    public function __construct($param){
        
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param[0]);
    }
    
    public function getClassName(){
        return "Weather";
    }
    
}