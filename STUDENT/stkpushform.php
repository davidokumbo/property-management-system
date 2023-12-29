<?php
include('../reputablecodes/dbconnection.php');
$no = $_GET['no'];
$landlordphonenumber = $_GET['lphone'];
$sql = "SELECT * FROM requests WHERE no=$no AND response ='request accepted'";
$sqlquerry = mysqli_query($conn, $sql);
if ($sqlquerry == true) {
    $count = mysqli_num_rows($sqlquerry);
    if ($count > 0) {
        $fetch = mysqli_fetch_assoc($sqlquerry);
        $semail = $fetch['student_email_address'];
        $rent = $fetch['rent_per_month'];
        $studentnum = "SELECT phonenumber FROM userdetails WHERE  email='$semail'";
        $studentnumquerry = mysqli_query($conn, $studentnum);
        $fetch = mysqli_fetch_assoc($studentnumquerry);
        $phonenumber = $fetch['phonenumber'];
    } else {
        echo "no data available";
    }
}
//stk push CODE



if (isset($_POST['stkpush'])) {
    $sphonenumber = $_POST['phonenumber'];
    echo $rent = $_GET['rent'];

    date_default_timezone_set('Africa/Nairobi');

    # access token from Sir Dommy app in daraja
    $consumerKey = 'afYnYW76TbogjR73FblxiZaMQrZbBXX8'; //confidential consumer key from sandbox app (daraja)
    $consumerSecret = '6EdoGFf1RLnhXwAJ'; // confidential consumer secret from sandbox app (daraja)

    # define the variales
    # provide the following details, found on test credentials on the developer account -- daraja
    $BusinessShortCode = '174379'; //This is the sandbox business short code
    $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

    /*
      This are your info, for
      $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
      $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
      TransactionDesc can be anything, probably a better description of or the transaction
      $Amount this is the total invoiced amount, Any amount here will be 
      actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
      for developer/test accounts, this money will be reversed automatically by midnight.
    */

    // $PartyA = $_POST['phone']; // This is your phone number, 
    $AccountReference = 'PROF: DAVID OKUMBO 254';
    $TransactionDesc = 'Test Payment';
    $Amount = $rent;

    $PartyA = "254" . $sphonenumber;
    //   substr($PartyA,1);

    # Get the timestamp, format YYYYmmddhms -> 20181004151020
    $Timestamp = date('YmdHis');

    # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
    $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);

    # header for access token
    $headers = ['Content-Type:application/json; charset=utf8'];

    # M-PESA endpoint urls
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    # callback url
    $CallBackURL = 'https://sir2.000webhostapp.com/callback_url.php';

    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    curl_close($curl);

    # header for stk push
    $stkheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

    # initiating the transaction
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

    $curl_post_data = array(
        //Fill in the request parameters with valid values
        'BusinessShortCode' => $BusinessShortCode,
        'Password' => $Password,
        'Timestamp' => $Timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $Amount,
        'PartyA' => $PartyA,
        'PartyB' => $BusinessShortCode,
        'PhoneNumber' => $PartyA,
        'CallBackURL' => $CallBackURL,
        'AccountReference' => $AccountReference,
        'TransactionDesc' => $TransactionDesc
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    echo $curl_response;

// remove the accept request notification from database


$sql = "SELECT * FROM requests WHERE no=$no AND response ='request accepted'";
$sqlquerry = mysqli_query($conn, $sql);
if ($sqlquerry == true) {
    $count = mysqli_num_rows($sqlquerry);
    if ($count > 0) {
        $fetch = mysqli_fetch_assoc($sqlquerry);
        $semail = $fetch['student_email_address'];
        $studentnum = "SELECT phonenumber FROM userdetails WHERE  email='$semail'";
        $studentnumquerry = mysqli_query($conn, $studentnum);
        $fetch = mysqli_fetch_assoc($studentnumquerry);
        $phonenumber = $fetch['phonenumber'];

        echo $no = $_GET['no'];
        $sql = "DELETE FROM requests WHERE no='$no' AND student_email_address='$semail'";
        $sqlquerry = mysqli_query($conn, $sql);
        if ($sqlquerry == true) {
            $_SESSION['stkpush'] = "STK send successfully, check your phone to complete the transaction";
            header('location:checkhostel.php');
        }




    } else {
        echo "no data available";
    }
}












  
    // echo "<script> alert('Your Kindness is highly appreciated!!!') </script>";
    // $_SESSION['number'] = $no;
    // $_SESSION['semailstk'] = $semail;
   

    exit();
};



?>





<form method="POST">
    <h3>M-PESA STK PUSH FORM</h3>
    <label for="rent">Rent per month</label><br>
    <input class="posthostelform" type="number" id="rent" name="rent" value="<?php echo $rent ?>" disabled><br>
    <label for="landlord">Landlord phone nummber</label><br>
    <input class="posthostelform" type="number" id="landlord" name="landlord" value="<?php echo $landlordphonenumber ?>" disabled><br>
    <label for="phonenumber"> Your STK PUSH Phone number</label><br>
    <input class="posthostelform" type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>"><br><br>
    <a class="backlinkform" href="apply.php?semail=<?php echo $semail ?>& no=<?php echo $no ?>">BACK</a>
    <input class="posthostelformbtn" type="submit" name="stkpush" value="SEND">
</form>

<style>
    .backlinkform {
        text-decoration: none;
        margin-right: 15%;
        margin-left: -15%;
        background-color: wheat;
    }

    h3 {
        background-color: green;
    }

    form {
        margin-left: 20%;
        margin-right: 50%;
        background-color: bisque;
        text-align: center;
        border-radius: 10px;
    }

    label {
        font-weight: bolder;
    }

    .posthostelform {
        padding: 0.5%;
        margin-bottom: 2px;
        border: none;
        width: 60%;

    }

    .posthostelform:hover {
        border: none;
        border-bottom: 1px solid black;
    }

    .posthostelformbtn {
        background-color: lightgreen;
        font-weight: bold;
        padding: 2% 2%;
        border: none;
        border-radius: 5px;
        font-style: larger;
        margin-bottom: 4px;
    }

    .posthostelformbtn:active {

        background-color: greenyellow;
    }
</style>