<?php
include('../reputablecodes/dbconnection.php');
 $email = $_GET['email'];
$sql = "SELECT * FROM booking WHERE owner_email_address='$email'";
$requestlistquery = mysqli_query($conn, $sql);
if ($requestlistquery == true) {
    $count = mysqli_num_rows($requestlistquery);
    if ($count > 0) {

?>

        <table>
            <h3>Accepted Request List</h3>
            <tr>
                <th>no</th>
                <th>hostel name</th>
                <th>type</th>
                <th>location</th>
                <th>room number</th>
                <th>Rent Per Month</th>
                <th>Deposit</th>
                <th>User Number</th>
                <th>Date accepted</th>
            </tr>
            <?php
            while ($fetchdata = mysqli_fetch_assoc($requestlistquery)) {
                $no = $fetchdata['no'];
                $hostel_name = $fetchdata['hostel_name'];
                $type = $fetchdata['type'];
                $location = $fetchdata['location'];
                $roomnumber = $fetchdata['roomnumber'];
                $rent_per_month = $fetchdata['rent_per_month'];
                $deposit = $fetchdata['deposit'];
                $owner_name = $fetchdata['owner_name'];
                $student_email_address = $fetchdata['student_email_address'];
                $date = $fetchdata['date'];
                $usernumbersql = "SELECT phonenumber FROM userdetails WHERE email='$student_email_address'";
                $usernumberquery = mysqli_query($conn, $usernumbersql);
                $fetchnumber = mysqli_fetch_assoc($usernumberquery);
                $studentnumber = $fetchnumber['phonenumber'];

            ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $hostel_name ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $roomnumber ?></td>
                    <td><?php echo  $rent_per_month ?></td>
                    <td><?php echo $deposit ?></td>
                    <td><?php echo $studentnumber ?></td>
                    <td><?php echo $date?></td>
                    <td><a href="reposthostel.php?no=<?php echo $no ?> &email=<?php echo $email?>">REPOST</a></td>
                
                </tr>
                
        

<?php         
            }
        } else {
            ?>
            <div class="msg">
           <?php echo "no accepted request available";?>
            </div>
          <?php  
        }
    }
?>
</table>
<br>
<a class="backbtn" href="landlordhomepage.php">BACK</a>
<button class="backbtn" onclick="window.print()">PRINT</button>
<style>
    h3{
        text-align: center;
        color:blue;
    }
    .msg{
        margin-left: 10%;
        background-color: lightblue;
        width: 15%;
        padding-left: 1%;
        margin-top: 2%;
    }
    .backbtn{
        margin-left: 10%;
        border: none;
        text-decoration: none;
    }
    table{
        background-color: whitesmoke;
        margin-left: 10%;
    }
    tr{
        margin:10px;
    }
    tr:nth-child(even){
        background-color: lightgray;
    }
</style>