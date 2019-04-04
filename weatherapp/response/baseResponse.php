<?php
include_once 'response/Clouds.php';
include_once 'response/Main.php';
include_once 'response/Rain.php';
include_once 'response/Weather.php';
include_once 'response/Wind.php';

 abstract class BaseResponse {
    
    public function mapProperties($param){
       
        $obj = new ReflectionClass($this->getClassName());
        foreach($param as $key => $value){
            if($obj->hasProperty($key)){  
                if(is_array($value)){
                    $class = ucfirst($key);
                    $tempObj = new $class($value);
                    $this->$key = $tempObj;
                }else{
                    $this->$key = $value;
                }
            }
        }
    }
    
    public function getClassName(){
        return "BaseResponse";
    }
}