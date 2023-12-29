<?php
include('../reputablecodes/dbconnection.php');
$email=$_GET['email'];
 $status=$_GET['status'];
$updateuserstatus="UPDATE userdetails SET status=$status
WHERE email='$email' 
";
$statusquery=mysqli_query($conn,$updateuserstatus);
if($statusquery==TRUE){
    if($status==1){
    $_SESSION['landlordupdate']='landlord with email '.$email.' blocked successfully';
    }elseif($status==0){
    $_SESSION['landlordupdate']='landlord with email '.$email.' unblocked successfully';  
    }
    header('location:'.SITEURL.'RENTALADMIN/adminlandlords.php');
}
?>