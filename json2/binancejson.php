<?php
define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'internship');
$conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);   //connecting to database
?>


<?php

$url = 'https://api2.binance.com/api/v3/ticker/24hr';
$data_string = array();
$curl = curl_init();
$test = http_build_query($data_string);
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_POSTFIELDS => $test,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));
set_time_limit(600);
curl_close($curl);
echo $url;
echo "<br>";
$jsondata = json_decode(curl_exec($curl));

foreach ($jsondata as $row) {
  echo $symbol = $row->symbol;
  echo $priceChange = $row->priceChange."<br>";
  echo $priceChangePercent = $row->priceChangePercent."<br>";
  echo $prevClosePrice = $row->prevClosePrice . "<br>";
  echo $lastPrice = $row->lastPrice . "<br>";
  echo $lastQty = $row->lastQty . "<br>";
  echo $bidPrice = $row->bidPrice . "<br>";
  echo $bidQty = $row->bidQty . "<br>";
  echo $askPrice = $row->askPrice . "<br>";
  echo $askQty = $row->askQty . "<br>";
  echo $openPrice = $row->openPrice . "<br>";
  echo $highPrice = $row->highPrice . "<br>";
  echo $lowPrice = $row->lowPrice . "<br>";
  echo $volume = $row->volume . "<br>";
  echo $quoteVolume = $row->quoteVolume . "<br>";
  echo $openTime = $row->openTime . "<br>";
  echo $closeTime = $row->closeTime . "<br>";
  echo $firstId = $row->firstId . "<br>";
  echo $lastId=$row->lastId."<br>";
  echo $count = $row->count;
  echo "<br>";
  echo "<br>";


  $sql = " INSERT INTO binance SET
   symbol='$symbol',     
   priceChange = '$priceChange',  
   priceChangePer = '$priceChangePercent',
   prevClosePrice = '$prevClosePrice',
   lastPrice = '$lastPrice',
   lastQty ='$lastQty',
   askPrice = '$askPrice',
   askQty = '$askQty',  
   openPrice = '$openPrice', 
   highPrice = '$highPrice',
   lowPrice = '$lowPrice',
   volume = '$volume',
   quoteVolume = '$quoteVolume',
   openTime = '$openTime',     
   closeTime = '$closeTime',  
   firstId = '$firstId',
   lastId='$lastId',
   count = '$count'
";


  $res = mysqli_query($conn, $sql);
  if ($res == true) {
    echo "data inserted";
  } else {
    echo "failed to insert";
    echo $error = mysqli_error($conn);
  }
}
