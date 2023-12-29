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
   

    $skip =0;
    do {
        $url = 'https://api.fda.gov/food/enforcement.json?limit=100&skip=' . $skip;

        $data_string = array();
        $curl = curl_init();
        $test = http_build_query($data_string);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $test,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 100,
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
        $total = $jsondata->meta->results->total;
        $limit = $jsondata->meta->results->limit;

        $count = 0;
        // for ($row = 0; $row < 100; $row++)
        $results=$jsondata->results;
        foreach($results as $row) {
            echo $count++;

            if ($row->country == "") {
                $country = "null";
            } else {
              $country= $row->country;
            }
            if ($row->city == "") {
                  $city = "null";
            } else {
                 $city = $row->city;
            }

            if ($row->address_1 == "") {
                $address_1 = "null";
            } else {
                $address_1 = $row->address_1;
            }
            if ($row->reason_for_recall == "") {
                $reason_for_recall = "null";
            } else {
                $reason_for_recall = $row->reason_for_recall;
            }

            if ( $row-> address_2 == "") {
                $address_2 = "null";
            } else {
                $address_2 = $row->address_2;
            }
            if ($row->product_quantity == "") {
                $product_quantity = "null";
            } else {
                $product_quantity = $row->product_quantity;
            }
            if ($row->code_info == "") {
                $code_info = "null";
            } else {
                $code_info =$row->code_info;
            }
            if ($row->center_classification_date == "") {
                $center_classification_date = "null";
            } else {
                $center_classification_date = $row->center_classification_date;
            }
            if ($row->distribution_pattern == "") {
                $distribution_pattern = "null";
            } else {
                $distribution_pattern =$row->distribution_pattern;
            }
            if ($row->state== "") {
                $state = "null";
            } else {
                $state = $row->state;
            }
            if ($row->product_description == "") {
                $product_description="null";
            } else {
               $product_description = $row->product_description;
            }
            if ($row->report_date == "") {
                $report_date = "null";
            } else {
                $report_date = $row->report_date;
            }
            if ($row->classification == "") {
                $classification = "null";
            } else {
                $classification = $row->classification;
            }
                 $openfd= $row->openfda;
                 foreach($openfd as $key){
                    if(is_null($key)){
                        $openfda="null";
                    }else{
                        $openfda=$key;
                    }
                 }
            if ($row->recalling_firm == "") {
                $recalling_firm = "null";
            } else {
                $recalling_firm = $row->recalling_firm;
            }
            if ($row->recall_number == "") {
                $recall_number = "null";
            } else {
                $recall_number = $row->recall_number;
            }
            if ($row->initial_firm_notification == "") {
                $initial_firm_notification = "null";
            } else {
                $initial_firm_notification =$row->initial_firm_notification;
            }
            if ($row->product_type == "") {
                $product_type = "null";
            } else {
                $product_type =$row->product_type;
            }
            if ($row->event_id == "") {
                $event_id = "null";
            } else {
                $event_id = $row->event_id;
            }


              if(empty($row->more_code_info)){
                $more_code_info="null";
              }else{
                $more_code_info=$row->more_code_info;
              }
           

            if ($row->recall_initiation_date == "") {
                $recall_initiation_date = "null";
            } else {
                $recall_initiation_date =$row->recall_initiation_date;
            }
            if ($row->postal_code == "") {
                $postal_code = "null";
            } else {
                $postal_code = $row->postal_code;
            }
            if ($row->voluntary_mandated == "") {
                $voluntary_mandated = "null";
            } else {
                $voluntary_mandated = $row->voluntary_mandated;
            }
            if ($row->status == "") {
                $status = "null";
            } else {
                $status =$row->status;
            }

      
            $country = str_replace("'","",$country);    
            $city = str_replace("'","",$city); 
            $address_1 = str_replace("'","",$address_1);
            $reason_for_recall = str_replace("'","",$reason_for_recall);
            $address_2 = str_replace("'","",$address_2);
            $product_quantity = str_replace("'","",$product_quantity);
            $code_info = str_replace("'","",$code_info);
            $center_classification_date = str_replace("'","",$center_classification_date);  
            $distribution_pattern = str_replace("'","",$distribution_pattern);
            $state = str_replace("'","",$state);
            $product_description = str_replace("'","",$product_description);
            $report_date = str_replace("'","",$report_date);
            $classification = str_replace("'","",$classification);
            $recalling_firm = str_replace("'","",$recalling_firm);     
            $recall_number = str_replace("'","",$recall_number);  
            $initial_firm_notification = str_replace("'","",$initial_firm_notification);
            $product_type = str_replace("'","",$product_type);
            $event_id = str_replace("'","",$event_id);
             $more_code_info = str_replace("'","",$more_code_info);
            $recall_initiation_date = str_replace("'","",$recall_initiation_date);
            $postal_code = str_replace("'","",$postal_code); 
            $voluntary_mandated = str_replace("'","",$voluntary_mandated);
            $status = str_replace("'","",$status);

            $sql = " INSERT INTO practical SET
                     country='$country',     
                     city = '$city',  
                     address_1 = '$address_1',
                     reason_for_recall = '$reason_for_recall',
                     address_2 = '$address_2',
                     product_quantity ='$product_quantity',
                     code_info = '$code_info',
                     center_classification_date = '$center_classification_date',  
                     distribution_pattern = '$distribution_pattern', 
                     state = '$state',
                     product_description = '$product_description',
                     report_date = '$report_date',
                     classification = '$classification',
                    
                     recalling_firm = '$recalling_firm',     
                     recall_number = '$recall_number',  
                     initial_firm_notification = '$initial_firm_notification',
                     product_type = '$product_type',
                     event_id = '$event_id',
                     more_code_info = '$more_code_info',
                    recall_initiation_date = '$recall_initiation_date',
                     postal_code = '$postal_code',  
                     voluntary_mandated = '$voluntary_mandated',
                   status  = '$status'
               ";


            $res = mysqli_query($conn, $sql);
            if ($res == true) {
               echo "data inserted";
            } else {
               echo "failed to insert";
               echo $error=mysqli_error($conn);
            }
        }
        $skip = $skip + $limit;
    } while ($skip < $total);
    echo  "<br>";
    echo  "<br>";
    
    ?>

</body>

</html>