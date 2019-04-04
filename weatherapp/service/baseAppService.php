<?php

 class BaseAppService {

    public function sendRequest($url, $httpRequest){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $httpRequest,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        
        $response = curl_exec($curl);       
        curl_close($curl);
        
        return $response;
    }
}