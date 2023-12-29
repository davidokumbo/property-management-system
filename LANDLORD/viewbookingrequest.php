<?php
include('../reputablecodes/dbconnection.php');
?>
<?php
//include('../reputablecodes/viewbookingrequestnavbar.php');

if (isset($_SESSION['deleterequestemail'])) { //from session rejectrequest.php
    $email1 = $_SESSION['deleterequestemail'];
}
if (isset($_SESSION['acceptrequestemail'])) {
    $email2 = $_SESSION['acceptrequestemail'];
}
$email = $_GET['email'];

// echo $email;
//$emaili=mysqli_real_escape_string($conn,$email);
$sql = "SELECT * FROM pendingbooking WHERE 	owner_email_address='$email'"; //landlord email
$querry = mysqli_query($conn, $sql);
if (($querry == TRUE)) {
    // echo "accepted";
?>
    <br><br><br>
    <table class="acceptrejectreq">
        <h2 class="hostelheading">Room booking requests</h2>

        <?php
        if (isset($_SESSION['rejectrequest'])) {
            $reject = $_SESSION['rejectrequest'];
            $reject;
            unset($_SESSION['rejectrequest']);
        }

        if (isset($_SESSION['acceptrequestemail'])) {
            $email = $_SESSION['acceptrequestemail'];
            if (isset($_SESSION['acceptrequest'])) {
                $_SESSION['acceptrequest'];
                unset($_SESSION['acceptrequest']);
            }
        }
        $count = mysqli_num_rows($querry);
        if ($count > 0) {

            echo "available in database";

            while ($fetchdetails = mysqli_fetch_assoc($querry)) {
                $no = $fetchdetails['no'];
                $hostelname = $fetchdetails['hostel_name'];
                $type = $fetchdetails['type'];
                $location = $fetchdetails['location'];
                $rent = $fetchdetails['rent_per_month'];
                $deposit = $fetchdetails['deposit'];
                $semail = $fetchdetails['student_email_address'];
                $date = $fetchdetails['date'];

                $sql = "SELECT name FROM userdetails WHERE email='$semail'";
                $studentnamequerry = mysqli_query($conn, $sql);
                $fetch = mysqli_fetch_assoc($studentnamequerry);
                $studentname = $fetch['name'];

                if (isset($_SESSION['rejectrequest'])) { //session from rejectrequest.php
                    $reject = $_SESSION['rejectrequest'];
                }
        ?>
               
                    <tr>
                        <th>no</th>
                        <th>hostel name</th>
                        <th>hostel type</th>
                        <th>location </th>
                        <th>rent per month</th>
                        <th>deposit</th>
                        <th>Tenant name</th>
                        <th>Request date</th>
                    </tr>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $hostelname; ?></td>
                        <td><?php echo $type ?></td>
                        <td><?php echo $location ?></td>
                        <td><?php echo $rent ?></td>
                        <td><?php echo $deposit ?></td>
                        <td><?php echo $studentname ?></td>
                        <td><?php echo $date ?></td>
                        <?php $email = $_GET['email']; ?>
                        <td class="acceptbtn"><a class="acceptbtn" href="<?php echo SITEURL; ?>LANDLORD/acceptrequest.php?no=<?php echo $no ?>&email=<?php echo $email ?>">Accept Request</a></td>
                        <td class="rejectbtn"><a class="rejectbtn" href="<?php echo SITEURL; ?>LANDLORD/rejectrequest.php?no=<?php echo $no ?>&email=<?php echo $email ?>">Reject Request</a></td>


            <?php


            }
        } else {
            echo "no booking request available";
        }
    }


    $email = $_GET['email'];
            ?>
                </table>

                <a class="viewbookingbackbtn" href="viewhostel.php?email=<?php echo $email ?>">BACK</a>
                <style>
                   
                    .viewbookingbackbtn {
                        text-decoration: none;

                    }

                    .acceptbtn {
                        background-color: palegreen;
                        text-decoration: none;
                    }

                    .acceptbtn:active {
                        background-color: greenyellow;
                    }

                    .rejectbtn {
                        background-color: palevioletred;
                        text-decoration: none;
                    }

                    .rejectbtn:active {
                        background-color: red;
                    }
                </style>