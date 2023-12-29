<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  define('LOCALHOST', 'localhost');
  define('USERNAME', 'root');
  define('PASSWORD', '');
  define('DBNAME', 'internship');
  $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);   //connecting to database
  //  $selectdb = mysqli_select_db($conn, DBNAME);

 $data_string = array();
 $curl=curl_init();
 $test=http_build_query($data_string);
 curl_setopt_array($curl, array(
CURLOPT_URL => 'https://datausa.io/api/data?drilldowns=State&measures=Population&year=2020',
CURLOPT_POSTFIELDS=> $test,
CURLOPT_RETURNTRANSFER =>true,
CURLOPT_ENCODING=>'',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT=>0,
CURLOPT_FOLLOWLOCATION=>true,
CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST=>'GET',
 ));
 $jsondata = json_decode(curl_exec($curl)); // converting json object to php associative array
 curl_close($curl);
//  print_r( $jsondata->data[0]->{'ID State'});
 //$jsondata['data'][0]['ID Year'];
   
    for ($row = 0; $row < 51; $row++) {
    echo $ID_State = $jsondata->data[$row]->{'ID State'};
    echo $State = $jsondata->data[$row]->State;
    echo $ID_Year = $jsondata->data[$row]->{'ID Year'};
    echo $Year = $jsondata->data[$row]->Year;
    echo $Population = $jsondata->data[$row]->Population;
    echo $Slug_State = $jsondata->data[$row]->{'Slug State'};
    echo "<br>";

    //sql querry to insert data into the database
    $sql = " INSERT INTO practical SET 
                    col1 = '$ID_State',     
                    col2 = '$State',  
                    col3 = '$ID_Year',
                    col4 = '$Year',
                    col5 = '2019',
                    col6 = '2018',
                    col7 = '$Population',
                    col8 = '$Slug_State'   
               ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($res == true) {
      echo "data inserted";
    }                          //checking if data is inserted into the database
    else {
      echo "failed to insert";
    }
  }

  
  ?>

</body>

</html>