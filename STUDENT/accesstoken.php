  <?php
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
curl_close($curl);




  ?>

  


