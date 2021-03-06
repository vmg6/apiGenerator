<?php

  define("DEBUG",false);

    /*Initiating username and password variables, generating current timestamp and hash*/
    $username = "";
    $password = "";
	$timestamp  = round(microtime(true) * 1000);
	$hash = md5(md5($password).$timestamp);

	$url = "https://nXX.epom.com/rest-api/placements/update/mobile.do";
    //nXX is the network's id, e.g. n29.epom.com
    //if you have whitelabel account, please use its domain instead of nXX.epom.com

	/*Specifying request parameters*/
    $post_data = array(
        "hash" => $hash,
        "timestamp" => $timestamp,
        "username" => $username,
        "zoneId" => 777,
        "type" => "MOBILE_SITE_PLACEMENT",
        "name" => "Test_Epom",
        "description" => "Test_Epom, Test_Epom, Test_Epom"
    );
    
    /*specifying curl options*/
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $post_data,
		CURLOPT_HTTPHEADER => array("Content-type: multipart/form-data"),
		CURLOPT_RETURNTRANSFER => true
	);

	$curl = curl_init();

	curl_setopt_array($curl,$options);

	echo curl_exec($curl);
      
    if(DEBUG){
        echo "\n\n";
        echo $url;
        print_r($post_data);
    }
    
?>