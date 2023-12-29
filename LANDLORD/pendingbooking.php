<?php

include('../reputablecodes/dbconnection.php');
$username=$_GET['username']; //getting from checkhostel.php
 $no=$_GET['no']; //Getting from viewbooking request.php
 $status=$_GET['status'];
 $semail=$_GET['semail'];
$sql= "SELECT * FROM $username WHERE no=$no";
$querry=mysqli_query($conn,$sql);
if($querry==true){
   while($data=mysqli_fetch_assoc($querry)){
   echo $no=$data['no'];
   echo $hostelname=$data['hostel_name'];
   echo $hosteltype=$data['type'];
        $roomnumber=$data['roomnumber'];
   echo $location=$data['location'];
   echo $Rent=$data['rent_per_month'];
   echo $deposit=$data['deposit'];
   echo $landlordname=$data['owner_name'];
   echo $landlordphone =$data['phonenumber'];
   echo $owneremailaddress=$data['owner_email_address'];
      $bookinsert="INSERT INTO pendingbooking SET
                     no='$no',
                     hostel_name='$hostelname',
                     type='$hosteltype',
                     roomnumber='$roomnumber',
                     location ='$location',
                     rent_per_month='$Rent',
                     deposit ='$deposit',
                     owner_name='$landlordname',
                     phonenumber='$landlordphone',
                     student_email_address='$semail',
                     owner_email_address='$owneremailaddress'
                     ";
        $querry2=mysqli_query($conn,$bookinsert);
        if( $querry2==true){
           $sqlstatus="UPDATE $username SET status='$status' WHERE no='$no'";
           $statusquery=mysqli_query($conn,$sqlstatus);
           $_SESSION['username']=$username;
           $_SESSION['semail']=$semail;
           header('location:'.SITEURL.'STUDENT/checkhostel.php');
               
        }else{
            echo "failed to book";
        }
     }
}
?>