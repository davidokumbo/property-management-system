<?php
include('../reputablecodes/dbconnection.php')

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

    <div class="stkpush">
        <?php
        if (isset($_SESSION['stkpush'])) {
            echo $_SESSION['stkpush'];
            unset($_SESSION['stkpush']);       
        }
       
        ?>
    </div>
    <!-- reading  requests from requests database tpo display notification -->
    <div class="generalnotificationdiv">
        <div class="notificationbell">
            <button onclick="notify()" class="dropbtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                </svg>
            </button>
        </div>


        <div class="displaynotifications" id="displaynotifications">
            <?php


            if (isset($_SESSION['semailrejectaccept'])) {
                $semail = $_SESSION['semailrejectaccept'];  //if session from accept.php or reject.php to obtain email
                $susername = $_SESSION['susername'];


                $sqlrequest = "SELECT * FROM requests WHERE student_email_address='$semail'";
                $connquerry = mysqli_query($conn, $sqlrequest);
                if ($connquerry == true) {
                    $count = mysqli_num_rows($connquerry);
                    if ($count > 0) {
                        while ($data = mysqli_fetch_assoc($connquerry)) {
                            $no = $data['no'];
                            $response = $data['response'];
                            $studentemail = $data['student_email_address'];
                            if ($studentemail == $semail) {
                                if ($response == "request rejected") {
            ?>
                                    <div class="notifications">
                                        <p> <?php echo $response ?> for hostel number <?php echo $no ?><a href="deletenotification.php?no=<?php echo $no ?>&semail=<?php echo $semail ?>">delete</a></p>
                                    </div>
                                <?php
                                } elseif ($response == "request accepted") {
                                ?>
                                    <table class="notifytable">
                                        <tr class="notifytable">
                                            <td class="notifytable">
                                                <div class="notifications">
                                                    <p> <?php echo $response ?> for hostel number <?php echo $no ?></p>
                                                    <a class="acceptlink" href="apply.php?no=<?php echo $no ?>&& semail=<?php echo $semail ?>">apply</a>
                                                    <a href="cancelacceptedrequest.php?no=<?php echo $no ?> &&semail=<?php echo $semail ?>">cancel</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php
                                }
                            } else {
                            }
                        }
                    } else {
                        echo "no notification available";
                    }
                } else {
                    echo "Server side failure, failed to fetch response";
                }
                unset($_SESSION['semailrejectaccept']);
            } else {

                if (isset($_SESSION['semailfromnavbar'])) {     //session to obtain semail from navbar once the email from rejectaccept .php is unset
                    $semail = $_SESSION['semailfromnavbar'];         // this is the alternative session used when (IF) SESSION IS UNSET
                    $sqlrequest = "SELECT * FROM requests WHERE student_email_address='$semail'";
                    $connquerry = mysqli_query($conn, $sqlrequest);
                    if ($connquerry == true) {
                        $count = mysqli_num_rows($connquerry);
                        if ($count > 0) {
                            while ($data = mysqli_fetch_assoc($connquerry)) {
                                $no = $data['no'];
                                $response = $data['response'];
                                $studentemail = $data['student_email_address'];
                                if ($studentemail == $semail) {
                                    if ($response == "request rejected") {
                                    ?>
                                        <div class="notifications">
                                            <p> <?php echo $response ?> for hostel number <?php echo $no ?><a href="deletenotification.php?no=<?php echo $no ?>&semail=<?php echo $semail ?>">delete</a></p>
                                        </div>
                                    <?php
                                    } elseif ($response == "request accepted") {
                                    ?>
                                        <table class="notifytable">
                                            <tr class="notifytable">
                                                <td class="notifytable">
                                                    <div class="notifications">
                                                        <p> <?php echo $response ?> for hostel number <?php echo $no ?></p>
                                                        <a class="acceptlink" href="apply.php?no=<?php echo $no ?>&& semail=<?php echo $semail ?>">apply</a>
                                                        <a href="cancelacceptedrequest.php?no=<?php echo $no ?> & semail=<?php echo $semail ?>">cancel</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

            <?php
                                    }
                                } else {
                                }
                            }
                        } else {
                            echo "no notification available";
                        }
                    } else {
                        echo "Server side failure, failed to fetch response";
                    }
                }
            }

            ?>
        </div>
    </div>
    <br><br><br>
    <table>
        <h2 class="hvacanthosteltitle">Available Vacant Rooms </h2>
        <th>no</th>
        <th>Hostel name</th>
        <th>Room type</th>
        <th>Location</th>
        <th>Roomnumber</th>
        <th>Rent per mponth</th>
        <th>Deposit</th>
        <th>Owner's name</th>
        <th>Owner's Phone Number</th>
        <th>date posted</th>
        <th>Status</th>

        <?php
        //IF STATEMENT EXECUTED ONLY IF SESSION IS SET
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username']; //SESSIONS FROM pendingbooking.php and pendingtobook.php
            // if (isset($_SESSION['semail'])) {
            //     $semail = $_SESSION['semail'];
            // } else {
            //  echo   $semail = $_GET['semail'];
            // }

            //updating user account
            $sqlselect = "SELECT * FROM hostels";
            $sqlselectquery = mysqli_query($conn, $sqlselect);
            if ($sqlselectquery == true) {

                //echo"user account updated";
                $count = mysqli_num_rows($sqlselectquery);
                if ($count > 0) {
                    while ($fetchdata = mysqli_fetch_assoc($sqlselectquery)) {

                        $no = $fetchdata['no'];
                        $hostel_name = $fetchdata['hostel_name'];
                        $type = $fetchdata['type'];
                        $roomnumber = $fetchdata['roomnumber'];
                        $location = $fetchdata['location'];
                        $rent_per_month = $fetchdata['rent_per_month'];
                        $deposit = $fetchdata['deposit'];
                        $owner_name = $fetchdata['owner_name'];
                        $phonenumber = $fetchdata['phonenumber'];
                        $owner_email_address = $fetchdata['owner_email_address'];

                        //echo $username;
                        $updateaccount = "UPDATE $username SET
                        no='$no',
                        hostel_name='$hostel_name',
                        type='$type',
                        roomnumber='$roomnumber',
                        location='$location',
                        roomnumber='$roomnumber',
                        rent_per_month='$rent_per_month',
                        deposit='$deposit',
                        owner_name='$owner_name',
                        phonenumber='$phonenumber',
                        owner_email_address='$owner_email_address'
                        WHERE no='$no'
                   ";

                        $updateaccountquery = mysqli_query($conn, $updateaccount) or die(mysqli_error($conn));
                    }
                } else {
                    
                    echo "<div class='message'>No posted hostel for now, keep checking</div>";
                }
            }

            $sql = "SELECT * FROM $username";
            $querry = mysqli_query($conn, $sql);
            if ($querry == true) {
                $count = mysqli_num_rows($querry);
                if ($count > 0) {
                    while ($data = mysqli_fetch_assoc($querry)) {

                        $no = $data['no'];
                        $hostelname = $data['hostel_name'];
                        $hosteltype = $data['type'];
                        $location = $data['location'];
                        $roomnumber = $data['roomnumber'];
                        $Rent = $data['rent_per_month'];
                        $deposit = $data['deposit'];
                        $landlordname = $data['owner_name'];
                        $landlordphone = $data['phonenumber'];
                        $date = $data['date'];

        ?>

                        <tr>

                            <td><?php echo $no ?></td>
                            <td><?php echo $hostelname ?></td>
                            <td><?php echo $hosteltype ?></td>
                            <td><?php echo $location ?></td>
                            <td><?php echo $roomnumber ?></td>
                            <td><?php echo $Rent ?></td>
                            <td><?php echo $deposit ?></td>
                            <td><?php echo $landlordname ?></td>
                            <td><?php echo $landlordphone; ?></td>
                            <td><?php echo $date; ?></td>
                            <td class="bookbtn">
                                <?php
                                if ($data['status'] == 0) {
                                    echo " <a href='../LANDLORD/pendingbooking.php?no=$no &status=1 &username=$username &semail=$semail'>BOOK</a> ";
                                } elseif ($data['status'] == 1) {
                                    echo "<a href='../LANDLORD/pendingtobook.php?no=$no &status=0 &username=$username'>PENDING</a>";
                                }
                                ?>
                            </td>
                            <?php
                            ?>
                        </tr>

                    <?php

                    }
                }
            }
        }


        //ELSE STATEMENT EXECUTED IF SESSION IS NOT SET
        else {
            $username = $_GET['username']; //getting username from navbar in login details
            $semail = $_GET['semail'];

            //Updating user account

            $sqlselect = "SELECT * FROM hostels";
            $sqlselectquery = mysqli_query($conn, $sqlselect);
            if ($sqlselectquery == true) {


                while ($fetchdata = mysqli_fetch_assoc($sqlselectquery)) {

                    $no = $fetchdata['no'];
                    $hostel_name = $fetchdata['hostel_name'];
                    $type = $fetchdata['type'];
                    $roomnumber = $fetchdata['roomnumber'];
                    $location = $fetchdata['location'];
                    $roomnumber = $fetchdata['roomnumber'];
                    $rent_per_month = $fetchdata['rent_per_month'];
                    $deposit = $fetchdata['deposit'];
                    $owner_name = $fetchdata['owner_name'];
                    $phonenumber = $fetchdata['phonenumber'];
                    $owner_email_address = $fetchdata['owner_email_address'];

                    $updateaccount = "UPDATE $username SET
                   no='$no',
                   hostel_name='$hostel_name',
                   type='$type',
                   roomnumber='$roomnumber',
                   location='$location',
                   roomnumber=$roomnumber,
                   rent_per_month='$rent_per_month',
                   deposit='$deposit', 
                   owner_name='$owner_name',
                   phonenumber='$phonenumber',
                   owner_email_address='$owner_email_address'
                   WHERE no ='$no',
              ";
                    $updateaccountquery = mysqli_query($conn, $updateaccount);
                    // if( $updateaccountquery==true){
                    //     echo "well updated";
                    // }else{
                    //     echo "failed";
                    //    echo $error = mysqli_error($conn);
                    // }
                }
            }


            $sql = "SELECT * FROM $username";
            $querry = mysqli_query($conn, $sql);
            if ($querry == true) {
                while ($data = mysqli_fetch_assoc($querry)) {
                    $no = $data['no'];
                    $hostelname = $data['hostel_name'];
                    $hosteltype = $data['type'];
                    $location = $data['location'];
                    $roomnumber = $data['roomnumber'];
                    $Rent = $data['rent_per_month'];
                    $deposit = $data['deposit'];
                    $landlordname = $data['owner_name'];
                    $landlordphone = $data['phonenumber'];
                    $date = $data['date'];

                    ?>

                    <tr>

                        <td><?php echo $no ?></td>
                        <td><?php echo $hostelname ?></td>
                        <td><?php echo $hosteltype ?></td>
                        <td><?php echo $location ?></td>
                        <td><?php echo $roomnumber ?></td>
                        <td><?php echo $Rent ?></td>
                        <td><?php echo $deposit ?></td>
                        <td><?php echo $landlordname ?></td>
                        <td><?php echo $landlordphone;  ?></td>
                        <td><?php echo $date;  ?></td>
                        <td class="bookbtn">
                            <?php
                            if ($data['status'] == 0) {
                                echo " <a href='../LANDLORD/pendingbooking.php?no=$no &status=1 &username=$username &semail=$semail'>BOOK</a> ";
                            } elseif ($data['status'] == 1) {
                                echo "<a href='../LANDLORD/pendingtobook.php?no=$no &status=0 &username=$username'>PENDING</a>";
                            }
                            ?>
                        </td>
                        <?php
                        ?>
                    </tr>

        <?php

                }
            }
        }
        ?>
    </table>
    <a class="backlink" href="studenthomepage.php">BACK</a>
    <script>
        function notify() {
            document.getElementById('displaynotifications').classList.toggle("togglenotification");

        }
    </script>

    <style>
        .message{
            margin-left: 10%;
        }
        .stkpush {
            background-color: greenyellow;
            width: 35%;
            margin-left: 30%;
            margin-top: 2%;
            font-weight: bold;
        }

        .backlink {
            margin-left: 5%;
        }

        th {
            background-color: lightblue;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }

        .backlink,
        a {
            text-decoration: none;
            font-size: large;
            font-weight: bold;
        }

        .acceptlink {
            text-decoration: none;
        }

        .notifytable {
            background-color: lightgreen;
            border: none;
        }

        .generalnotificationdiv {
            display: block;
            /* border: 2px solid red; */
            width: 40%;
            float: right;
            position: fixed;
            left: 53%;
            top: 15%;

        }


        .displaynotifications {
            display: none;
            position: fixed;
            /* border: 3px solid yellow; */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin-right: 7%;
            margin-left: 18%;
            padding-left: 1%;
            background-color: palevioletred;
            z-index: 1;
            max-height: 20%;
            overflow-y: scroll;

        }

        .togglenotification {
            display: block;
        }

        .notificationbell {
            width: 100%;
            /* border: 2px solid green; */
            margin-bottom: 6%;
            display: block;
            position: relative;
        }

        button {
            float: right;
            border: none;
            padding: 10px;
            background-color: azure;
            opacity: 0.5;
        }

        .notifications {

            float: right;
            z-index: 1;
            border: none;
        }



        .hvacanthosteltitle {
            text-align: center;
        }

        table {
            margin-left: 4%;
        }

        table th {
            border-bottom: 2px solid black;
            text-align: center;
            margin-left: 10px;
            padding-left: 10px;

        }

        table tr {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            margin: 8px;
        }

        table tr td {
            text-align: center;
            margin-left: 60px;
        }

        .bookbtn {
            background-color: lightgreen;
            padding-inline: 10px;
            font-weight: bold;
        }

        .bookbtn:active {
            background-color: greenyellow;
        }
    </style>
</body>

</html>