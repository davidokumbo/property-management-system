<?php
include('../reputablecodes/dbconnection.php');
$no=$_GET['no'];
$semail=$_GET['semail'];
  $sqldelete="DELETE FROM requests WHERE no='$no' AND student_email_address='$semail'";
  $sqldeletequery=mysqli_query($conn,$sqldelete);
  $_SESSION['semail']=$semail;
  $_SESSION['no']=$no;
  header('location:'.SITEURL.'STUDENT/deletenotification.php');
?>