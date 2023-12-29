<?php
include('../reputablecodes/dbconnection.php');
$username=$_GET['username'];
$no=$_GET['no'];
$status=$_GET['status'];
$sql="DELETE FROM pendingbooking WHERE no=$no";
$sqlquery=mysqli_query($conn, $sql);
if($sqlquery==true){
    // echo "deleted";
    $sqlupdate="UPDATE $username SET status='$status' WHERE no='$no'";
    $sqlstatus=mysqli_query($conn,$sqlupdate);
    $_SESSION['username']=$username;
    header('location:'.SITEURL.'STUDENT/checkhostel.php');
}
?>