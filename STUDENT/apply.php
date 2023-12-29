
<?php
include('../reputablecodes/dbconnection.php');
 $no=$_GET['no'];
 $semail=$_GET['semail'];
$sqlapplyroomdetails="SELECT * FROM requests WHERE response='request accepted' AND no='$no' AND student_email_address='$semail' ";
$applyroomdetailsquery=mysqli_query($conn,$sqlapplyroomdetails);
if($applyroomdetailsquery==true){
    
    $count=mysqli_num_rows($applyroomdetailsquery);
    if($count>0){
 $fetch=mysqli_fetch_assoc($applyroomdetailsquery);
      $num=$fetch['no'];   
      $hostel_name=$fetch['hostel_name'];
      $hostel_name=$fetch['hostel_name'];
      $roomnumber=$fetch['roomnumber'];
      $rent_per_month=$fetch['rent_per_month'];
      $deposit=$fetch['deposit'];
      $date=$fetch['date'];
      $phonenumber=$fetch['phonenumber'];
        
    ?>
    <table>
        <tr>
        <th>no</th>
        <th>hostel name</th>
        <th>Room no</th>
        <th>rent_per_month</th>
        <th>deposit</th>
        <th>date</th>
        <th>landlord phonenumber</th>
        </tr>
         <tr>
        <td><?php echo $num ?></td>
        <td><?php echo $hostel_name ?></td>
        <td><?php echo $roomnumber?></td>
        <td><?php echo $rent_per_month ?></td>
        <td><?php echo $deposit ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo  "+254".$phonenumber ?></td>
        <td>
            <a class="applybackbtn" href="stkpushform.php?no=<?php echo $num?>& lphone=<?php echo $phonenumber?>& rent=<?php echo $rent_per_month ?>">PAY</a>
        </td>
        </tr>
    </table>
    <br>
    <a class="applybackbtn"href="checkhostel.php">BACK</a>
    <?php
        
    }else{
        echo"house details not available for booking";
    }
}

?>
<style>
    .applybackbtn{
        text-decoration:none;
        margin-left:2%;
        /* background-color: grey; */
        color:blue;
        font-weight: bolder;
        padding:2px;
    }
    .applybackbtn:hover{
        border:1px solid grey;
        border-radius: 4px;
    }
    .applybackbtn:active{
        background-color: wheat;
    }
    table{
        margin-top: 2%;
        margin-left: 2%;
    }
    th{
        padding:4px;
  padding-bottom: 12px;
  text-align: left;
  background-color: wheat;
  color: black;
    }
    tr:nth-child(even){
        background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
            }
</style>