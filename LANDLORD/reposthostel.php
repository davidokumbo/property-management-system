<?php
include('../reputablecodes/dbconnection.php');
 $no=$_GET['no'];
 $email=$_GET['email'];
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
                ?>
                <div class="repostdiv">
                  <?php echo "Hostel details reposted successfully";?>
                </div>
                <?php
                echo "<br>";
            }else{
              echo"failed to delete";
            }
          }else{
            ?>
            <div class="repostdiv">
              <?php echo "No records available";?>
            </div>
            <?php
            echo "<br>";
          }
         }
       
}
?>
       <a  class="backbtn"href="acceptedrequestlist.php?email=<?php echo $email?>">BACK</a>

       <style>
        .repostdiv{
          padding-left: 1%;
          margin-left:5%;
          margin-top: 2%;
          background-color: lightblue;
          width:15%;

        }
        .backbtn{
          margin-left:5%;
          text-decoration: none; 
          font-weight: bold;
        }
       </style>