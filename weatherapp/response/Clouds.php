<?php
include_once 'response/baseResponse.php';

class Clouds extends BaseResponse{
    public $all = null;
    
    public function __construct($param){
        
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param);
    }
    
    public function getClassName(){
        return "Clouds";
    }
}