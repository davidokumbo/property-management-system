<?php
$ch = curl_init();
$url= "https://datausa.io/api/data?drilldowns=State&measures=Population&year=2020";
$fh = fopen("file.txt","w");
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_FILE, $fh);
$resp = curl_exec($ch);
if($e = curl_error($ch)){
    echo $e;
}

fclose($fh);
curl_close($ch);

?>