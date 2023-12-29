<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .tbl {
      width: 50%;
    }
  tr:nth-child(even){
    background-color: lightgrey;
  }
  th{
    background-color: lightblue;
  }
    .tbl tr th {
      border-bottom: 2px solid black;
      padding: 2px;
      width: 100%;
      text-align: left;
      text-align: center;

    }

    .tbl tr td {
      padding: 0 10px;
      border-bottom: 1px solid black;
      border-left: 2px solid black;
      justify-content: space-around;
    }
    
  </style>
</head>

<body>
  
  <?php
  define('LOCALHOST', 'localhost');
  define('USERNAME', 'root');
  define('PASSWORD', '');
  define('DBNAME', 'internship');
  $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);
  set_time_limit(600);
  ?>

<div>
  <table class="tbl">
   
    <tr>
      <th>NO</th>
      <th>symbol</th>
      <th>priceChange</th>
      <th>priceChangePercent</th>
      <th>prevClosePrice</th>
      <th>lastPrice</th>
      <th>lastQty</th>
      <th>askPrice</th>
      <th>askQty</th>
      <th>openPrice</th>
      <th>highPrice</th>
      <th>lowPrice</th>
      <th>volume</th>
      <th>quoteVolume</th>
      <th>openTime</th>
      <th>closeTime</th>
      <th>firstId</th>
      <th>lastId</th>
      <th>count</th>
    </tr>
    <?php
    $sqlfetch = "SELECT * FROM binance ";
    $result = mysqli_query($conn, $sqlfetch);
    if ($result == true) {
      $count = mysqli_num_rows($result);
      if ($count > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
          $no = $data['no'];
          $symbol = $data['symbol'];
          $priceChange = $data['priceChange'];
          $priceChangePer = $data['priceChangePer'];
          $prevClosePrice = $data['prevClosePrice'];
          $lastPrice = $data['lastPrice'];
          $lastQty = $data['lastQty'];
          $askPrice = $data['askPrice'];
          $askQty = $data['askQty'];
          $openPrice = $data['openPrice'];
          $highPrice = $data['highPrice'];
          $lowPrice = $data['lowPrice'];
          $volume = $data['volume'];
          $quoteVolume = $data['quoteVolume'];
          $openTime = $data['openTime'];
          $closeTime = $data['closeTime'];
          $firstId = $data['firstId'];
          $lastId = $data['lastId'];
          $count = $data['count'];

    ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $symbol ?></td>
            <td><?php echo $priceChange ?></td>
            <td><?php echo $priceChangePer  ?></td>
            <td><?php echo $prevClosePrice ?></td>
            <td><?php echo $lastPrice ?></td>
            <td><?php echo $lastQty ?></td>
            <td><?php echo $askPrice ?></td>
            <td><?php echo $askQty ?></td>
            <td><?php echo $openPrice ?></td>
            <td><?php echo $highPrice ?></td>
            <td><?php echo $lowPrice ?></td>
            <td><?php echo $volume ?></td>
            <td><?php echo $quoteVolume ?></td>
            <td><?php echo $openTime ?></td>
            <td><?php echo $closeTime ?></td>
            <td><?php echo $firstId ?></td>
            <td><?php echo $lastId ?></td>
            <td><?php echo $count ?></td>
            
          </tr>


    <?php
        }
      } else {
        echo "failed to fetch data from database";
      }
    }



    ?>

   
    </table>
    </div>
</body>

</html>