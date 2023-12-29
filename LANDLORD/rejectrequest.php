<?php
include('../reputablecodes/dbconnection.php');
$email = $_GET['email']; //landlord
$no = $_GET['no'];

$sqlgetstudentemail = "SELECT * FROM pendingbooking WHERE no=$no;";
$studentemailquery = mysqli_query($conn, $sqlgetstudentemail);
if ($studentemailquery == true) {
  $fetch = mysqli_fetch_assoc($studentemailquery);
  $hostel_name = $fetch['hostel_name'];
  $type = $fetch['type'];
  $location = $fetch['location'];
  $rent_per_month  = $fetch['rent_per_month'];
  $deposit  = $fetch['deposit'];
  $phonenumber = $fetch['phonenumber'];
  $semail = $fetch['student_email_address'];    //getting hostel information from pending

  $sqlreject = "INSERT INTO requests SET   
  no=$no,
  response ='request rejected',
  hostel_name ='$hostel_name',
  type ='$type',
  location ='$location',
  rent_per_month ='$rent_per_month',
  deposit ='$deposit',
  phonenumber ='$phonenumber',
  student_email_address='$semail'
";
  $rejectquery = mysqli_query($conn, $sqlreject);
  if ($rejectquery == true) {
    

    $sqlusername = "SELECT username FROM userdetails WHERE email='$semail'"; //getting username from userdetails
    $usernamequery = mysqli_query($conn, $sqlusername);
    $fetchusername = mysqli_fetch_assoc($usernamequery);
    if ($fetchusername == true) {
      echo $username = $fetchusername['username'];

      $_SESSION['rejecthostel'] = "request for hostel number $no from applicant with email $semail has been rejected";
      $_SESSION['susername'] = $username;
      $_SESSION['semailrejectaccept'] = $semail;
      $semail;
      $no;
      $sqldelete = "DELETE FROM pendingbooking WHERE no='$no' AND student_email_address='$semail'";
      $deletequerry = mysqli_query($conn, $sqldelete);
      if ($deletequerry == TRUE) {
        echo "request for hostel number $no from applicant with email $semail has been rejected";
        $sqlreset = "UPDATE $username SET status='0' WHERE no=$no"; //updating username account
        $resetquery = mysqli_query($conn, $sqlreset);
        $_SESSION['rejectrequest'] = "booking rejected";
        $email;
        $_SESSION['deleterequestemail'] = $email;
        header('location' . SITEURL . 'LANDLORD/viewbookingrequest.php');
      }
      else {
        echo $error = mysqli_error($conn);
        echo " failed to reject in requests table";
      }
    } 
  }
}
echo "<br>";
?>

<a href="viewbookingrequest.php?email=<?php echo $email ?>">BACK</a>