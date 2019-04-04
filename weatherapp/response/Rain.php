<?php

include_once 'response/baseResponse.php';

class Rain extends BaseResponse{
    public $h = null;
    
    public function __construct($param){
        
        if(empty($param)){
            return null;
        }
        $this->mapProperties($param);
    }
    
    public function getClassName(){
        return "Rain";
    }
    
}