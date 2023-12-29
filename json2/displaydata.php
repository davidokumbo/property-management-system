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
      <th>country</th>
      <th>city</th>
      <th>	address_1</th>
      <th>reason_for_recall</th>
      <th>address_2</th>
      <th>product_quantity</th>
      <th>code_info</th>
      <th>center_classification_date</th>
      <th>distribution_pattern</th>
      <th>state</th>
      <th>product_description</th>
      <th>report_date</th>
      <th>classification</th>
      <th>openfda</th>
      <th>recalling_firm</th>
      <th>	recall_number</th>
      <th>initial_firm_notification</th>
      <th>product_type</th>
      <th>event_id</th>
      <th>	more_code_info</th>
      <th>recall_initiation_date</th>
      <th>postal_code</th>
      <th>voluntary_mandated</th>
      <th>status</th>
      
    </tr>
    <?php
    $sqlfetch = "SELECT * FROM practical ";
    $result = mysqli_query($conn, $sqlfetch);
    if ($result == true) {
      $count = mysqli_num_rows($result);
      if ($count > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
          $no = $data['no'];
          $country = $data['country'];
          $city = $data['city'];
          $address_1 = $data['address_1'];
          $reason_for_recall = $data['reason_for_recall'];
          $address_2 = $data['address_2'];
          $product_quantity = $data['product_quantity'];
          $code_info = $data['code_info'];
          $center_classification_date = $data['center_classification_date'];
          $distribution_pattern = $data['distribution_pattern'];
          $state = $data['state'];
          $product_description = $data['product_description'];
          $report_date = $data['report_date'];
          $classification = $data['classification'];
          $openfda = $data['openfda'];
          $recalling_firm = $data['recalling_firm'];
          $recall_number = $data['recall_number'];
          $initial_firm_notification = $data['initial_firm_notification'];
          $product_type = $data['product_type'];
          $event_id = $data['event_id'];
          $more_code_info = $data['more_code_info'];
          $recall_initiation_date = $data['recall_initiation_date'];
          $postal_code = $data['postal_code'];
          $voluntary_mandated = $data['voluntary_mandated'];
          $status = $data['status'];
    ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $country ?></td>
            <td><?php echo $city ?></td>
            <td><?php echo $address_1  ?></td>
            <td><?php echo $reason_for_recall ?></td>
            <td><?php echo $address_2 ?></td>
            <td><?php echo $product_quantity ?></td>
            <td><?php echo $code_info ?></td>
            <td><?php echo $center_classification_date ?></td>
            <td><?php echo $distribution_pattern ?></td>
            <td><?php echo $state ?></td>
            <td><?php echo $product_description ?></td>
            <td><?php echo $report_date ?></td>
            <td><?php echo $classification ?></td>
            <td><?php echo $openfda ?></td>
            <td><?php echo $recalling_firm ?></td>
            <td><?php echo $recall_number ?></td>
            <td><?php echo $initial_firm_notification ?></td>
            <td><?php echo $product_type ?></td>
            <td><?php echo $event_id ?></td>
            <td><?php echo $more_code_info ?></td>
            <td><?php echo $recall_initiation_date ?></td>
            <td><?php echo $postal_code ?></td>
            <td><?php echo $voluntary_mandated ?></td>
            <td><?php echo $status ?></td>
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