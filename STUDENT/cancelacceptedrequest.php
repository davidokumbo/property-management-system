<?php
include('../reputablecodes/dbconnection.php');
$semail=$_GET['semail']; //getting email and no from checkhostel.php from notification div
$no=$_GET['no'];
$sqldeleteacceptednotification="DELETE FROM requests WHERE student_email_address='$semail' AND no='$no'";
$deletequerry=mysqli_query($conn,$sqldeleteacceptednotification);
if($deletequerry==true){

//inserting into the hostel and getting auto increment number
$sql="INSERT INTO hostels (hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,owner_email_address)
SELECT hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,owner_email_address FROM booking
WHERE no=$no; ";
$sqlrepostquery=mysqli_query($conn,$sql);
if($sqlrepostquery==true){
//selecting latest auto increment number from hostels
    $getautonumber="SELECT MAX(no) as recent
    FROM hostels;";
     $autonumberquerry=mysqli_query($conn,$getautonumber);
      $fetchnumber=mysqli_fetch_assoc($autonumberquerry);
      echo "<br>";
       $number=$fetchnumber['recent'];
    //getting each user account names i.e usernames
    $getuseraccount="SELECT username FROM userdetails WHERE usertype='Student'";
    $useraccountquery=mysqli_query($conn,$getuseraccount);
    while($fetch=mysqli_fetch_assoc($useraccountquery)){
      $username=$fetch['username']; 
      //inserting into username accounts with auto increment number from hostels
      $sqli="INSERT INTO  $username (no,hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,owner_email_address)
      SELECT no, hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,owner_email_address FROM hostels
      WHERE no=$number; ";
      $sqlirepostquery=mysqli_query($conn,$sqli);
      if($sqlirepostquery==true){
     
        $sqlstatus = "UPDATE $username SET status='0' WHERE no='$number' ";
        $statusquery=mysqli_query($conn,$sqlstatus);
        if($statusquery==true){
          echo "fine";
    
        }else{
          echo "second failed";
          echo mysqli_error($conn);
        } 
      }
      else{
        echo "first failed";    
        echo mysqli_error($conn);
      }
    } 

          $num=$_GET['no'];
         $check="SELECT * FROM booking WHERE no=$num";
         $checkquery=mysqli_query($conn,$check);
         if($checkquery==true){
          $count=mysqli_num_rows($checkquery);
          if($count>0){
            $sqldelete= "DELETE FROM booking WHERE no=$num ";
            $deletequery=mysqli_query($conn,$sqldelete);
            if($deletequery==true){
              echo "deleted";
            }else{
              echo"failed to delete";
            }
          }else{
            echo "no records available";
          }
         }
       
}


}
$_SESSION['semailrejectaccept']=$email;
header('location:'.SITEURL.'STUDENT/checkhostel.php');
?>