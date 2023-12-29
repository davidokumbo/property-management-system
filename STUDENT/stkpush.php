<?php
   $consumerkey="klHqkKqmrGMFnuB4a3f6nkDq4iZ5CZDp";
   $consumersecret="7rveKS3vwYQl27Wq";
   $headers=['Content-Type:application/json; charset=utf8'];
   $access_token_url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
   $curl=curl_init($access_token_url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($curl,CURLOPT_HEADER,FALSE);
curl_setopt($curl,CURLOPT_USERPWD,$consumerkey.':'.$consumersecret);
$result=curl_exec($curl);
$status=curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result=json_decode($result);
 echo $access_token= $result->access_token;
curl_close($curl);



//initiating the transaction
$initiate_url="https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

$BusinessShortCode='174379';
$Timestamp=date('YmdGis');
$PartyA='254746717753';
$CallBackURL='https://ddcb-41-80-97-190.eu.ngrok.io/KM.rental%20management%20system/STUDENT/callback_url.php';
$AccountReference='CART098';
$TransactionDesc='cart payment for online service';
$Amount='1';
$PassKey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Password=base64_encode($BusinessShortCode.$PassKey.$Timestamp);

$stkheader=['Content-Type:application/json','Authorization:Bearer'.$access_token];

$curl=curl_init();
curl_setopt($curl, CURLOPT_URL, $initiate_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);

$curl_post_data=array(
  'BusinessShortCode'=>$BusinessShortCode,
  'Password'=>$Password,
  'Timestamp'=>$Timestamp,
  'TransactionType'=>'CustomerPayBillOnline',
  'Amount'=>$Amount,
  'PartyA'=>$PartyA,
  'PartyB'=>$BusinessShortCode,
  'PhoneNumber'=>$PartyA,
  'CallBackURL'=>$CallBackURL,
  'AccountReference'=>$AccountReference,
  'TransactionDesc'=>$TransactionDesc
);

$data_string=json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);

$curl_response=curl_exec($curl);
print_r($curl_response);

// echo $curl_response;


  
