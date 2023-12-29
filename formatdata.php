<?php
$ch = curl_init(); //initializing curl init function
$url= "https://api.fda.gov/food/enforcement.json?limit=100";  //saving the url in a variable
curl_setopt($ch,CURLOPT_URL,$url);     //accessing the url using curl init function and url variable
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);
if($e = curl_error($ch)){  //checking if their is errors in accessing the data in url
    echo $e;
}
else{
  $decoded = json_decode($resp);  //converting json object to php associative array
  print_r($decoded);
}
curl_close($ch);
?>