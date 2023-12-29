<?php
//from accesstoken
$consumerkey="AaZtYRJdegUBWJjCGGmG5f2S6unA6skd";
$consumersecret="hNbkQi9x8c1G0Frt";
 $headers=['Content-Type(application/json) charset=utf8'];
 $url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
 $curl=curl_init($url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_USERPWD,$consumerkey.':'.$consumersecret);
$resulty=curl_exec($curl);
$status=curl_getinfo($curl,CURLINFO_HTTP_CODE);
$result=json_decode($resulty);
$access_token=$result->access_token;
echo $access_token;


//curl_close($curl);


//realregister url code

$register_url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$register_url);
curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer'.$access_token));//setting custom header
$curl_post_data=array(
    //fill in the request parameters with valid values
    'ShortCode'=>'174379',
    'ResponseType' =>'Completed',
    'ConfirmationURL'=>'https://ade2-105-163-0-122.in.ngrok.io/KM.rental%20management%20system/STUDENT/confirmation_url.php',
    'ValidationURL'=>'https://ade2-105-163-0-122.in.ngrok.io/KM.rental%20management%20system/STUDENT/validation.php'
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);

$curl_response=curl_exec($curl);
print_r($curl_response);
echo $curl_response;
