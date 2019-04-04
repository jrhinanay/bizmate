<?php

include_once 'response/baseResponse.php';

class Wind extends BaseResponse{
    public $speed = null;
    public $deg = null;
    
    public function __construct($param){
    
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param);
    }
    
    public function getClassName(){
        return "Wind";
    }
    
}
