<?php
include('../reputablecodes/dbconnection.php');
$no = $_GET['no'];
$email = $_GET['email'];
$sql = "SELECT * FROM hostels WHERE no='$no'";
$querry = mysqli_query($conn, $sql);
if ($querry == true) {
    $fetch = mysqli_fetch_assoc($querry);
    $hostelname = $fetch['hostel_name'];
    $hosteltype = $fetch['type'];
    $location = $fetch['location'];
    $rent = $fetch['rent_per_month'];
    $deposit = $fetch['deposit'];
    $landlordname = $fetch['owner_name'];
    $landlordnumber = $fetch['phonenumber'];
    $landlordemail = $fetch['owner_email_address'];
    if ($rent < 2000) {
        echo "<script>alert('Invalid rent amount, minimum amount of 2000')</script>";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $landlordname)) {
            echo "<script>alert('landlord name must be letters only')</script>";
        } else {
            if ($landlordnumber < 0) {
                echo "<script>alert('Invalid phone number')</script>";
            } else {
                
                    if (isset($_POST['updatehostelbtn'])) {
                        $no = $_GET['no'];
                        $hostelname = $_POST['hostelname'];
                        $hosteltype = $_POST['hosteltype'];
                        $location = $_POST['location'];
                        $Rent = $_POST['Rent'];

                        $no = $_GET['no'];
                        $sql = "SELECT * FROM hostels WHERE no='$no'";
                        $querry = mysqli_query($conn, $sql);
                        $fetch = mysqli_fetch_assoc($querry);
                        $landlordname = $fetch['owner_name'];
                        $landlordnumber = $fetch['phonenumber'];
                        $landlordemail = $fetch['owner_email_address'];

                        $updatesql = " UPDATE hostels SET
                                hostel_name='$hostelname',
                                type='$hosteltype',
                                location='$location ',
                                rent_per_month='$Rent',
                                deposit='$Rent'
                                WHERE no = '$no'
                            ";
                        $sqlquerry = mysqli_query($conn, $updatesql);
                        if ($sqlquerry == true) {

                            //selecting user accounts using username
                            $usernamesql = "SELECT username FROM userdetails WHERE usertype='Student'";
                            $usernamequerry = mysqli_query($conn, $usernamesql);
                            while ($details = mysqli_fetch_assoc($usernamequerry)) {
                                $username = $details['username'];
                                //inserting the uploaded hostel in each user account with the auto increment number from hostels
                                $sqliquerry = "UPDATE $username SET
                                    hostel_name='$hostelname',
                                    type='$hosteltype',
                                    location='$location ',
                                    rent_per_month='$Rent',
                                    deposit='$Rent'
                                    WHERE no='$no' 
                                    ";
                                $querypost = mysqli_query($conn, $sqliquerry);
                                if ($querypost == true) {
                                    // $email = $_GET['email'];
                                    $_SESSION['update'] = "hostel details updated successfully";
                                    header('location' . SITEURL . 'LANDLORD/viewhostel.php');
                                }
                            }
                        }
                    }
                }
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
    <title>Update hostel</title>
</head>

<body>

    <form id="submitbtn" action="" method="POST">
        <?php
        if (isset($_SESSION['update'])) {
            echo  $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br>
        <label for="hostelname">hostel name</label><br>
        <input class="posthostelform" type="text" id="hostelname" name="hostelname" value="<?php echo $hostelname ?>" placeholder=""><br>
        <label for="hosteltype">hostel type</label><br>
        <select class="posthostelform" name="hosteltype" id="hosteltype">
            <option value="singleroom">Single room</option>
            <option value="bedsitter">Bed sitter</option>
            <option value="doubleroom">Double room</option>
        </select><br>
        <!-- <input class="posthostelform" type="text" id="hosteltype" name="hosteltype" value="<?php echo $hosteltype ?>" placeholder=""><br> -->
        <label for="location">hostel location</label><br>
        <select class="posthostelform" name="location" id="location">
            <option value="singleroom">Kiwanja area</option>
            <option value="bedsitter">Transformer</option>
            <option value="moriah">Moriah region</option>
            <option value="laquinta">beside laquinta</option>
            <option value="esther">Esther Apartments </option>
            <option value="winners">Winners Apartments </option>
            <option value="tulivu">Tulivu Apartments </option>
            <option value="lucy">lucy Apartments </option>
        </select><br>
        <label for="Rent">Rent per month</label><br>
        <input class="posthostelform" type="number" id="Rent" name="Rent" value="<?php echo $rent ?>" placeholder=""><br>
        <label for="landlordname">landlord name</label><br>
        <input class="posthostelform" type="text" id="landlordname" name="landlordname" value="<?php echo $landlordname ?>" disabled><br>
        <label for="landlordphone">landlord phone number</label><br>
        <input class="posthostelform" type="number" id="landlordphone" name="landlordphone" value="<?php echo $landlordnumber ?>" disabled><br><br>
        <label for="landlordemail">landlord email</label><br>
        <input class="posthostelform" type="email" id="landlordemail" name="landlordemail" value="<?php echo $landlordemail ?>" disabled><br><br>
        <a class="posthostelformbtn alink" href="viewhostel.php?email=<?php echo $email ?>">BACK</a>
        <input class="posthostelformbtn" type="submit" name="updatehostelbtn" value=" update">
    </form>
    <?php $email = $_GET['email']; ?>

    <?php

    ?>
    <style>
        .alink {
            text-decoration: none;
            margin-right: 20%;
            margin-left: -35%;
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
            margin-bottom: 2%;
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
    </style>

    <?php include('../reputablecodes/footer.php') ?>
</body>

</html>