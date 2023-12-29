<?php

include('../reputablecodes/dbconnection.php');
 $email=$_GET['email']; //getting from viewbooking request.php
 $no=$_GET['no'];

$sql="INSERT INTO booking (no,hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,student_email_address,owner_email_address)
SELECT no,hostel_name,type,location,roomnumber,rent_per_month,deposit,owner_name,phonenumber,student_email_address,owner_email_address FROM pendingbooking
WHERE no=$no; ";
$acceptquery=mysqli_query($conn,$sql);
if($acceptquery==true){
   $sqldeletefrompendingbooking="DELETE  FROM pendingbooking  WHERE no=$no; ";
   $deletequery=mysqli_query($conn, $sqldeletefrompendingbooking);
   if($deletequery==true){
    $sqldeletefromhostels="DELETE  FROM hostels  WHERE no=$no; ";
   $deletedquery=mysqli_query($conn, $sqldeletefromhostels);
   if($deletedquery==true){
    echo "request for hostel number $no has been accepted successfully";
    
    $sqlgetsemail="SELECT student_email_address FROM booking WHERE owner_email_address='$email' AND no='$no'";
    $getsemailquery=mysqli_query($conn,$sqlgetsemail);  //getting user email address to be used to get the username 
     $fetchsemail=mysqli_fetch_assoc($getsemailquery);
     $semaily=$fetchsemail['student_email_address'];
     $getusername="SELECT username FROM userdetails WHERE email='$semaily'";
     $getusernamequery=mysqli_query($conn,$getusername); //getting the username
     $fetchusername=mysqli_fetch_assoc($getusernamequery);  
     $username=$fetchusername['username'];
    // echo $username;
       // getting user accounts
    $getuseraccount="SELECT username FROM userdetails WHERE usertype='Student'";
    $useraccountquery=mysqli_query($conn,$getuseraccount);
    if($useraccountquery==true){ //getting username from userdetails and using while loop to delete record accepted in every user account
        while($fetchusername=mysqli_fetch_assoc($useraccountquery)){
            $username=$fetchusername['username'];
             $sqldeleteacceptedrequest="DELETE FROM $username WHERE no=$no";
            $deleteacceptedrequestquery=mysqli_query($conn,$sqldeleteacceptedrequest);
        }
    }


    // $sqldeletefromhostels="DELETE  FROM  $username  WHERE no=$no; ";
    //  $deletedquery=mysqli_query($conn, $sqldeletefromhostels);

    $_SESSION['susername']=$username;
    $_SESSION['acceptrequest'] = "booking number $no accepted";  //exporting username using session to the username account
    $_SESSION['semailrejectaccept'] = $semaily;
    header('location'.SITEURL.'LANDLORD/viewbookingrequest.php');
  
}
   }
   else {
    echo "failed to remove the record from pending requests";
   }
}  
else{
    echo "failed to accept booking number $no";
}
$sqlaccept="SELECT * FROM booking WHERE no=$no; ";
$sqlacceptquery=mysqli_query($conn,$sqlaccept);
if($sqlacceptquery==true){
    $fetch=mysqli_fetch_assoc($sqlacceptquery);
    $hostel_name=$fetch['hostel_name'];
    $roomnumber=$fetch['roomnumber'];
    $rent_per_month=$fetch['rent_per_month'];
    $deposit=$fetch['deposit'];
    $phonenumber=$fetch['phonenumber'];
    $semail=$fetch['student_email_address'];
    $owner_email_address=$fetch['owner_email_address'];
    $sqlreject = "INSERT INTO requests SET
    no=$no,
    response ='request accepted',
    hostel_name='$hostel_name',
    roomnumber='$roomnumber',
    rent_per_month='$rent_per_month',
    deposit='$deposit',
    phonenumber=$phonenumber,
    student_email_address='$semail',
    owner_email_address='$email'
    ";
    $acceptquery=mysqli_query($conn,$sqlreject);

}

echo "<br>";
?>
<a href="viewbookingrequest.php?email=<?php echo $email ?>">BACK</a>