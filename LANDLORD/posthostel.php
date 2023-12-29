<?php
include("../reputablecodes/dbconnection.php");
if (isset($_POST['posthostelbtn'])) {
    $hostelname = $_POST['hostelname'];
    $hosteltype = $_POST['hosteltype'];
    $roomnumber = $_POST['roomnumber'];
    $location = $_POST['location'];
    $Rent = $_POST['Rent'];
    $deposit =  $_POST['Rent'];
    // $landlordname = $_POST['landlordname'];
    // $landlordphone = $_POST['landlordphone'];
    // $owneremail=$_POST['landlordemail'];
    if ($roomnumber <= 0) {
        $_SESSION['room'] = "room number must be greater than zero";
    } else {
 //getting phone number and name of landlord from userdails using his email
        $email = $_GET['email'];
        $sql = "SELECT * FROM userdetails WHERE email='$email'";
        $querry = mysqli_query($conn, $sql);
        $details = mysqli_fetch_assoc($querry);
        $name = $details['name'];
        $phonenumber = $details['phonenumber'];


//inserting the hostel details in hostels
$checksql= "SELECT * FROM hostels WHERE hostel_name='$hostelname' AND roomnumber='$roomnumber'";
$checksqlquery=mysqli_query($conn,$checksql);
$count=mysqli_num_rows($checksqlquery);
if($count<1){
        $sqlquerry = "INSERT INTO hostels SET
   	   hostel_name='$hostelname',
       type='$hosteltype',
       roomnumber=$roomnumber,
       location='$location ',
       rent_per_month='$Rent',
       deposit='$deposit',
       owner_name='$name',
       phonenumber='$phonenumber',
       owner_email_address='$email'
        
   ";
        $query = mysqli_query($conn, $sqlquerry);
        if ($query == true) {
           
            //getting the latest auto increment number from hostels
            $getautonumber="SELECT MAX(no) as recent
            FROM hostels;";
            $autonumberquerry=mysqli_query($conn,$getautonumber);

            if($autonumberquerry==true){
                $fetchnumber=mysqli_fetch_assoc($autonumberquerry);
                $number=$fetchnumber['recent'];
            
      //selecting user accounts using username
            $usernamesql = "SELECT username FROM userdetails WHERE usertype='Student'";
            $usernamequerry = mysqli_query($conn, $usernamesql);
            while ($details = mysqli_fetch_assoc($usernamequerry)) {
                $username = $details['username'];
                //inserting the uploaded hostel in each user account with the auto increment number from hostels
                $sqliquerry = "INSERT INTO $username SET
                        no= '$number',
                        hostel_name='$hostelname',
                        type='$hosteltype',
                        roomnumber=$roomnumber,
                        location='$location ',
                        rent_per_month='$Rent',
                        deposit='$deposit',
                        owner_name='$name',
                        phonenumber='$phonenumber',
                        owner_email_address='$email'
                          
    ";
                $querypost = mysqli_query($conn, $sqliquerry);
                if($querypost==true){
                    $_SESSION['posthostel'] = "Hostel details saved";
                    header('location:'.SITEURL .'LANDLORD/landlordhomepage.php');
                    echo "data inserted";
                }
            }

        }
        } else {
            echo "data not inserted";
        }
        //inserting into user accounts
   
    }else{
        echo "<div class='message'>hostel details exist</div>";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <br>

    <form id="submitbtn" action="" method="POST">
        <h2>Post Vacant Room</h2>
        <?php
        $email = $_GET['email']; //email from registration navbar
        $sql = "SELECT * FROM userdetails WHERE email='$email'";
        $querry = mysqli_query($conn, $sql);
        $details = mysqli_fetch_assoc($querry);
        $name = $details['name'];
        $phonenumber = $details['phonenumber'];

        ?>
        <label for="hostelname">hostel name</label><br>
        <input class="posthostelform" type="text" id="hostelname" name="hostelname" value="" placeholder="" required><br>
        <label for="hosteltype">Room type</label><br>
        <select class="posthostelform" name="hosteltype" id="hosteltype">
            <option value="singleroom">Single room</option>
            <option value="bedsitter">Bed sitter</option>
            <option value="doubleroom">Double room</option>
        </select><br>

        <label for="roomnumber">Room Number</label><br>
        <input class="posthostelform" type="number" id="roomnumber" name="roomnumber" value="" placeholder="" required><br>

        <?php
        if (isset($_SESSION['room'])) {
            echo $_SESSION['room'];
            unset($_SESSION['room']);
        }
        ?>
        <br>
        <label for="location">hostel location</label><br>
        <select class="posthostelform" name="location" id="location">
            <option value="kiwanja area">Kiwanja area</option>
            <option value="transformer">Transformer</option>
            <option value="moriah region">Moriah region</option>
            <option value="beside laquinta">beside laquinta</option>
            <option value="next to esther apartment">Esther Apartments </option>
            <option value="winners region">Winners Apartments </option>
            <option value="beside tulivu hostel">Tulivu Apartments </option>
            <option value="near lucy hostel">lucy Apartments </option>
        </select><br>
        <label for="Rent">Rent per month</label><br>
        <input class="posthostelform" type="number" id="Rent" name="Rent" value="" placeholder="" required><br>
        <label for="landlordname">landlord name</label><br>
        <input class="posthostelform" type="text" id="landlordname" name="landlordname" value="<?php echo $name ?>" disabled><br>
        <label for="landlordphone">landlord phone number</label><br>
        <input class="posthostelform" type="number" id="landlordphone" name="landlordphone" value="<?php echo $phonenumber ?>" disabled><br><br>
        <label for="landlordemail">landlord email</label><br>
        <input class="posthostelform" type="email" id="landlordemail" name="landlordemail" value="<?php echo $email ?>" disabled><br><br>
        <a class="backlinkform" href="landlordhomepage.php">BACK</a>
        <input class="posthostelformbtn" type="submit" name="posthostelbtn" value="post hostel">
    </form>


    <style>
        .message{
            margin-left: 23%;
            background-color: lightblue;
            font-weight: bold;
            width:20%;
            padding-left:2%;
        }
        .backlinkform {
            text-decoration: none;
            margin-right: 15%;
            margin-left: -15%;
            background-color: wheat;
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

</body>

</html>