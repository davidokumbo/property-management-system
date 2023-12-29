<?php
include('../reputablecodes/dbconnection.php');
$sqlpostedrooms = "SELECT * FROM hostels";
$postedroomsquerry = mysqli_query($conn, $sqlpostedrooms);
if ($postedroomsquerry == true) {
    $count = mysqli_num_rows($postedroomsquerry);
    if ($count > 0) {
?>
        <table>
            <h2>Availabe posted vacant rooms</h2>
            <div class="updatehostel">
            <?php
            if(isset($_SESSION['roomupdate'])){
                echo $_SESSION['roomupdate'];
                unset($_SESSION['roomupdate']);
            }
            if(isset( $_SESSION['delete'])){
                echo  $_SESSION['delete'];
                unset( $_SESSION['delete']);
            }
            ?>
            </div>
            <tr>
                <th>no</th>
                <th>hostel name</th>
                <th>hostel type</th>
                <th>Room number</th>
                <th>location</th>
                <th>Rent per month</th>
                <th>Deposit</th>
                <th>Owner name</th>
                <th>Phone number</th>
                <th>owner Email</th>
                <th>Date posted</th>
            </tr>
            <?php
            while ($fetch = mysqli_fetch_assoc($postedroomsquerry)) {
                $no = $fetch['no'];
                $hostel_name = $fetch['hostel_name'];
                $type = $fetch['type'];
                $roomnumber = $fetch['roomnumber'];
                $location = $fetch['location'];
                $rent_per_month = $fetch['rent_per_month'];
                $deposit = $fetch['deposit'];
                $owner_name = $fetch['owner_name'];
                $phonenumber = $fetch['phonenumber'];
                $owner_email_address = $fetch['owner_email_address'];
                $date = $fetch['date'];

            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $hostel_name ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $roomnumber ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $rent_per_month ?></td>
                    <td><?php echo $deposit ?></td>
                    <td><?php echo $owner_name ?></td>
                    <td><?php echo $phonenumber ?></td>
                    <td><?php echo $owner_email_address ?></td>
                    <td><?php echo $date ?></td>
                    <td class="update">
                        <a href="updateroom.php?no=<?php echo $no?>">UPDATE</a>
                    </td>
                    <td class="delete">
                     <a href="deleteroom.php?no=<?php echo $no ?>">DELETE</a>
                    </td>
                </tr>
            <?php

            }
            ?>
        </table>

<?php
    } else {
        echo "no posted vacant rooms for now";
    }
}
?>
<br>
<a  class="backbtn" href="adminhomepage.php">BACK</a>
<style>
    .backbtn{
        margin-left: 5%;
    }
     .updatehostel{
            background-color: greenyellow;
            margin-left: 10%;
            width:30%;
            padding-left: 2%;
            border-radius: 3px;
            font-weight: bold;
        }
    .update{
        background-color: lightgreen;
        padding-right: 15px;
        padding-left:0;
    }
    .update:hover{
        background-color: greenyellow;
    }
    .delete{
        background-color: lightcoral;
        padding-right: 8px;
        padding-left:2px;
    }
    .delete:hover{
        background-color: red;
    }
    a {
        text-decoration: none;
        margin-left: 10%;
        font-weight: bold;
        font-size: large;
    }

    table {
        margin-top: 1%;
        margin-bottom: 2%;
    }

    table,
    h2,
    .viewbookingbackbtn {
        margin-left: 3%;
    }

    th {
        background-color: lightblue;
    }

    tr:nth-child(even) {
        background-color: lightgrey;
    }
</style>