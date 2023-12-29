<?php
include('../reputablecodes/dbconnection.php');

$sql = "SELECT * FROM booking";
$requestlistquery = mysqli_query($conn, $sql);
if ($requestlistquery == true) {
    $count = mysqli_num_rows($requestlistquery);
    if ($count > 0) {

?>

        <table>
            <tr>
                <th>no</th>
                <th>hostel name</th>
                <th>type</th>
                <th>location</th>
                <th>room number</th>
                <th>Rent Per Month</th>
                <th>Deposit</th>
                <th>Owner name</th>
                <th>User Number</th>
                <th>date accepted</th>
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
                $date = $fetchdata['date'];
                $student_email_address = $fetchdata['student_email_address'];
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
                    <td><?php echo $owner_name ?></td>
                    <td><?php echo $studentnumber ?></td>  
                    <td><?php echo $date?></td> 
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
<a class="backbtn" href="adminhomepage.php">BACK</a>
<button class="backbtn" onclick="window.print()">PRINT</button>
<style>
    .msg{
        margin-left: 10%; 
    }
    .backbtn{
        margin-left: 10%;
        border: none;
        text-decoration: none;
    }
    .backbtn:hover{
       color:aquamarine;
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
    th {
        background-color: lightblue;
    }
</style>