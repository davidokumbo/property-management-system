<?php
 
$url="encodepractice.json";  //saving the url in a variable
 $getcontent=file_get_contents($url);
 $decoded = json_decode($getcontent);  //converting json object to php associative array
 echo $decoded['colors'][1]['sky'][1]['midnight'];
?>