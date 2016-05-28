<?php

 define("DEBUG",false);

  	$username = "";
  	$password = "";
  	$timestamp  = round(microtime(true) * 1000);
  	$hash = md5(md5($password).$timestamp);


  	$url = "https://nXX.epom.com/rest-api/sites/{placementId}/pricing/{countryCode}.do";
        //nXX is the network's id, e.g. n29.epom.com
        //if you have whitelabel account, please use its domain instead of nXX.epom.com

    $post_data = array(
   		"hash" => $hash,
   		"timestamp" => $timestamp,
   		"username" => $username,
   		"siteId" => "680",
   		"countryCode" => "US",
   		"price" => "1.8"
   		//"actionId" => Null
 	);

    /*specifying curl options*/
 	$options = array(
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POST => true, // POST method is used
        CURLOPT_POSTFIELDS => http_build_query($post_data), //POST request body parameters
        CURLOPT_HTTPHEADER => array('Content-type: application/x-www-form-urlencoded'), //This header is mandatory in case if parameters are passed in request body.
        CURLOPT_RETURNTRANSFER => true
    );

    /*connection initiation*/
    $curl = curl_init();
    /*Applying curl options to our curl instance*/
    curl_setopt_array($curl,$options);
    /*Executing the call*/
    $result=curl_exec($curl);

    echo $result;

    if(DEBUG){
        echo "\n\n";
        echo $url;
        print_r($post_data);
    }
   
	
?>