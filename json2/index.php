<?php
$skip = 0;

do{
    $limit = 100;
    echo $url = "https://api.fda.gov/food/enforcement.json?limit=${limit}&skip=${skip}";
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
            $total=$jsondata->meta->results->total;
            $results = $jsondata->results;
            $pages = $total/$limit;
            $tpages=ceil($pages);
            
            echo "<pre>";
            //print_r($results) ; exit;
        

            if($skip<=$tpages)
            {
                $count = 0;
               foreach($results as $row)
               {
                $count++;
                $city = $row->city;


                
                //print_r($count);
                echo "<br>";
               }
               print_r($count);
            } 

            $skip++;


            }while($skip<=$tpages);
