<?php
include('../reputablecodes/dbconnection.php');

 if (isset($_SESSION['semail'])) {
      $semail = $_SESSION['semail']; // session from actualnotificationdelete.php
    // if (isset($_SESSION['no'])) {
    //  $no = $_SESSION['no'];
    //   echo $semail = $_SESSION['semail'];
?>
        <table>
            <tr>
                <th>no</th>
                <th>response</th>
                <th>hostel_name</th>
                <th>type</th>
                <th>location</th>
                <th>rent_per_month</th>
                <th>deposit</th>
                <th>Landlord phonenumber</th>
            </tr>
            <?php
            $selectnotifications = "SELECT * FROM requests WHERE student_email_address='$semail' AND response= 'request rejected'";
            $selectnotiicationquery = mysqli_query($conn, $selectnotifications);
            if ($selectnotiicationquery == true) {


                $count = mysqli_num_rows($selectnotiicationquery);
                if ($count > 0) {
                    while ($fetch = mysqli_fetch_assoc($selectnotiicationquery)) {
                        $no = $fetch['no'];
                        $response = $fetch['response'];
                        $hostel_name = $fetch['hostel_name'];
                        $type = $fetch['type'];
                        $location = $fetch['location'];
                        $rent_per_month  = $fetch['rent_per_month'];
                        $deposit  = $fetch['deposit'];
                        $phonenumber = $fetch['phonenumber'];

            ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $response ?></td>
                            <td><?php echo $hostel_name ?></td>
                            <td><?php echo $type ?></td>
                            <td><?php echo $location ?></td>
                            <td><?php echo $rent_per_month ?></td>
                            <td><?php echo $deposit ?></td>
                            <td><?php echo $phonenumber ?></td>
                            <td class="bookbtn">
                                <?php
                                if ($response == "request accepted") {
                                    echo " <a href=''>PAY</a>";
                                } elseif ($response == "request rejected") {
                                    echo " <a href='actualnotificationdelete.php?no=$no &semail=$semail' >REMOVE</a>";
                                }
                                ?>
                            </td>

                        </tr>
                <?php

                    }
                } else {
                    echo "no notification available for now";
                }
                ?>
        </table>
        <a class="backbtn" href="checkhostel.php">BACK</a>
<?php

            }
        }
    
     else {

         $no = $_GET['no'];
         $semail = $_GET['semail'];
?>
<table>
    <tr>
        <th>no</th>
        <th>response</th>
        <th>hostel_name</th>
        <th>type</th>
        <th>location</th>
        <th>rent_per_month</th>
        <th>deposit</th>
        <th>Landlord phonenumber</th>
        <th>date</th>
    </tr>


    <?php
        $selectnotifications = "SELECT * FROM requests WHERE student_email_address='$semail' AND response= 'request rejected' ";
        $selectnotiicationquery = mysqli_query($conn, $selectnotifications);
        if ($selectnotiicationquery == true) {


            $count = mysqli_num_rows($selectnotiicationquery);
            if ($count > 0) {
                while ($fetch = mysqli_fetch_assoc($selectnotiicationquery)) {
                    $no = $fetch['no'];
                    $response = $fetch['response'];
                    $hostel_name = $fetch['hostel_name'];
                    $type = $fetch['type'];
                    $location = $fetch['location'];
                    $rent_per_month  = $fetch['rent_per_month'];
                    $deposit  = $fetch['deposit'];
                    $phonenumber = $fetch['phonenumber'];
                    $date= $fetch['date'];

    ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $response ?></td>
                    <td><?php echo $hostel_name ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $rent_per_month ?></td>
                    <td><?php echo $deposit ?></td>
                    <td><?php echo $phonenumber ?></td>
                    <td><?php echo $date?></td>
                    <td class="bookbtn">
                        <?php
                      if ($response == "request rejected") {
                            echo " <a href='actualnotificationdelete.php?no=$no &semail=$semail' >REMOVE</a>";
                        }
                        ?>
                    </td>

                </tr>
        <?php

                }
            } else {
                echo "no notification available for now";
            }

        ?>
</table>
<a href="checkhostel.php">BACK</a>
<?php
        }
    }
    //  $sqldelete="DELETE FROM requests WHERE no='$no' AND student_email_address='$semail'";
    //  $sqldeletequery=mysqli_query($conn,$sqldelete);
    // header('location'.SITEURL.'STUDENT/checkhostel.php');
?>
<style>
    table,
    .backlink {
        margin-left: 15%;
    }

    th {
        background-color: lightblue;
    }

    tr:nth-child(even) {
        background-color: lightgray;
    }

    a {
        text-decoration: none;
        font-size: large;
        font-weight: bold;
    }

    .bookbtn {
        background-color: lightgreen;
        padding-inline: 10px;
        font-weight: bold;
    }

    .backbtn {
        margin-left: 15%;
    }
</style>