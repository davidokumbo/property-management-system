<?php
include('../reputablecodes/dbconnection.php');
$username=$_GET['username'];
$status=$_GET['status'];
$updateuserstatus="UPDATE userdetails SET status=$status
WHERE username='$username' 
";
$statusquery=mysqli_query($conn,$updateuserstatus);
if($statusquery==TRUE){
    if($status==1){
        $_SESSION['studentupdate']='landlord with username '.$username.' blocked successfully';
        }elseif($status==0){
        $_SESSION['studentupdate']='landlord with username '.$username.' unblocked successfully';  
        }
    header('location:'.SITEURL.'RENTALADMIN/adminstudents.php');
}
?>