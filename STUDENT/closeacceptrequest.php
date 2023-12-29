<?php
include('../reputablecodes/dbconnection.php');
echo $no=$_GET['no'];
echo $semailstk=$_GET['semailstk'];
$sql="DELETE FROM requests WHERE no='$no' AND student_email_address='$semailstk'";
$sqlquerry=mysqli_query($conn,$sql);
if($sqlquerry==true){
    $_SESSION['clearrequestfromdb']="";
header('location:checkhostel.php');
}
?>