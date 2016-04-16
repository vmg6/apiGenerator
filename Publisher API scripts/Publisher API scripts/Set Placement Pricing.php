<?php

define("DEBUG",false);
  /*Initiating username and password variables, generating current timestamp and hash*/
 	$username = "";
 	$password = ""; 
 	$timestamp  = round(microtime(true) * 1000);
 	$hash = md5(md5($password).$timestamp);        

 	$url = "https://nXX.epom.com/rest-api/placements/{placementId}/pricing.do"; 
 //nXX is the network's id, e.g. n29.epom.com
 //if you have whitelabel account, please use its domain instead of nXX.epom.com

 	$post_data = array(
  		"hash" => $hash,
  		"timestamp" => $timestamp,
  		"username" => $username, 
  		"placementId" => {placementId}
	 );

	$json = "{\"paymentModel\":\"FIXED_PRICE\",\"pricingType\":\"CPM\",\"price\":2.0}";

	 $options = array(
	  CURLOPT_URL => $url . "?" . http_build_query($post_data),
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_POST => true, // POST method is used
	  CURLOPT_POSTFIELDS => $json, //POST request body parameters
	  CURLOPT_HTTPHEADER => array('Content-type: application/json'), //This header is mandatory in case if parameters are passed in request body.
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