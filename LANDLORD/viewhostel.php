<?php
include('../reputablecodes/dbconnection.php');
?>
<?php
?>

<?php


  $email=$_GET['email'];
// echo $count=strlen($email);
// echo $email[20];

$sql = "SELECT * FROM hostels WHERE owner_email_address='$email' ";
$querry = mysqli_query($conn, $sql);
if (($querry == TRUE)) {
?>
    <table>
        <h2 class="hostelheading">Posted Room Details</h2>

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <tr>
            <th>no</th>
            <th>hostel name</th>
            <th>hostel type</th>
            <th>Room number</th>
            <th>location </th>
            <th>rent per month</th>
            <th>deposit</th>
            <th>date posted</th>
            

        </tr>
        <?php
        $count = mysqli_num_rows($querry);
        // echo $count;
        if ($count > 0) {
            while ($fetchdetails = mysqli_fetch_assoc($querry)) {
                $no = $fetchdetails['no'];
                $hostelname = $fetchdetails['hostel_name'];
                $type = $fetchdetails['type'];
                $roomnumber = $fetchdetails['roomnumber'];
                $location = $fetchdetails['location'];
                $rent = $fetchdetails['rent_per_month'];
                $deposit = $fetchdetails['deposit'];
                $date = $fetchdetails['date'];

        ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $hostelname; ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $roomnumber ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $rent ?></td>
                    <td><?php echo $deposit ?></td>
                    <td><?php echo $date ?></td>
                    <?php $email=$_GET['email'];?>
                    <td class="updatebtn"><a href="<?php echo SITEURL; ?>LANDLORD/update.php?no=<?php echo $no ?>&email=<?php echo$email?>">Update</a></td>
                    <td class="deletebtn"><a href="<?php echo SITEURL; ?>LANDLORD/actualdelete.php?no=<?php echo $no ?>&email=<?php echo$email?>">Delete</a></td>
                </tr>

    <?php
            }
        } else {
            echo "no posted house available";
            echo $error =mysqli_error($conn);
        }
    }else{
        echo $error=mysqli_error($conn);
    }




    ?>
    </table>

    <?php


    ?>
    <br>
    <a class="backbtn" href="landlordhomepage.php">BACK</a>
    <a class="backbtn" href="viewbookingrequest.php?email=<?php echo $email ?>">VIEW PENDING REQUESTS</a>
    <br><br><br>
    <?php
    include('../reputablecodes/footer.php');
    ?>
    <style>
        h2{
            margin-top: 5%;
        }
        th {
            background-color: lightblue;
        }

        .hostelheading {
            margin-left: 15%;
        }

        .backbtn {
            font-weight: bolder;
            text-decoration: none;
            padding: 3px;

        }

        .sendbtn {
            background-color: greenyellow;
        }

        .sendbtn:active {
            background-color: aquamarine;
        }


        .updatebtn {
            background-color: palegreen;
            margin: auto;
            width: 80px;
            text-align: center;
            border-radius: 5px;
            margin-right: 2px;
        }

        .updatebtn:active {
            background-color: green;
        }


        .updatebtn a {
            text-decoration: none;
            font-weight: bold;

        }

        .deletebtn {
            background-color: lightcoral;
            margin: auto;
            width: 80px;
            text-align: center;
            border-radius: 5px;
            margin-right: 2px;
        }

        .deletebtn:active {
            background-color: red;
        }

        .deletebtn a {
            text-decoration: none;
            font-weight: bold;

        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 10px;
        }

        table th {
            text-align: center;
            padding-inline: 5px;
            border-bottom: 2px solid grey;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            margin: 20px 0;
        }

        td {
            padding-inline: 5px;
        }

        th,
        td {
            border: 1px solid #dddddd;

        }
    </style>