<?php
header("Content-Type:application/json");
$response='{
    "ResultCode":0,
    "ResultDesc":"confirmation received successifully",

}';
//data
$mpesaResponse = file_get_contents('PHP://input');
//log response
$logfile="M_PESAResponse.txt";
$jsonMpesaResponse=json_decode($mpesaResponse,true);
$log=fopen($logfile,"a");
fwrite($log,$jsonMpesaResponse);
fclose($log);
echo $response;
?>