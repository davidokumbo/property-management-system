<?php
$skip = 0;
do {
    $limit = 100;
    echo  $url = "https://api.fda.gov/food/enforcement.json?limit=${limit}&skip=${skip}";
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

    $response = curl_exec($curl);
    curl_close($curl);
    $jsondata = json_decode($response); // converting json object to php associative array
    set_time_limit(300);

    $total = $jsondata->meta->results->total;
    $results = $jsondata->results;
    $pages = $total / $limit;
    $tpages = ceil($pages);

    echo "<pre>";
    //print_r($results) ; exit;

    echo $url;
    $round=0;
    while ($round <= $tpages) {
        $count = 0;
        foreach ($results as $row) {
            $count++;
            echo  $country = $row->country;
            echo  $city = $row->city;
            echo  $address_1 = $row->address_1;
            echo  $reason_for_recall = $row->reason_for_recall;
            echo  $address_2 = $row->address_2;
            echo  $product_quantity = $row->product_quantity;
            echo  $code_info = $row->code_info;
            echo  $center_classification_date = $row->center_classification_date;
            echo  $distribution_pattern = $row->distribution_pattern;
            echo  $state = $row->state;
            echo  $product_description = $row->product_description;
            echo  $report_date = $row->report_date;
            echo $classification = $row->classification;
            if (empty($row->openfda)) {
                echo $openfda = "null";
            } else {
                echo  $openfda = $row->openfda = "null";
            }
            echo $recalling_firm = $row->recalling_firm;
            echo $recall_number = $row->recall_number;
            echo $initial_firm_notification = $row->initial_firm_notification;
            echo $product_type = $row->product_type;
            echo $event_id = $row->event_id;
            if (empty($row->more_code_info)) {
                echo   $more_code_info = "null";
            } else {
                echo   $more_code_info = $row->more_code_info;
            }
            echo $recall_initiation_date = $row->recall_initiation_date;
            echo $postal_code = $row->postal_code;
            echo $voluntary_mandated = $row->voluntary_mandated;
            echo $status = $row->status;


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

            //print_r($count);
            echo "<br>";
        }
        print_r($count);
        $round++; 
    }

   $skip=$skip+$limit;
} while ($skip <= $tpages);
