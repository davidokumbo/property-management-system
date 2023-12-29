<?php
include('../reputablecodes/dbconnection.php');
$no= $_GET['no'];
 $no;
$sql="DELETE FROM hostels WHERE no='$no'";
$querry=mysqli_query($conn,$sql);
if($querry==TRUE){

    $getusername="SELECT username FROM userdetails WHERE usertype='Student'";
    $usernamequerry=mysqli_query($conn,$getusername);
    if($usernamequerry==true){
        while($fetchusername=mysqli_fetch_assoc($usernamequerry)){
            $username=$fetchusername['username'];
            $sqlupdateuseraccounts="DELETE FROM $username WHERE no='$no'";
            $useraccountquerry=mysqli_query($conn,$sqlupdateuseraccounts);
        }

      $_SESSION['delete']="record deleted successfully";
       header('location:'.SITEURL.'RENTALADMIN/postedrooms.php');
    }
   
}

?>
<style>
    .messagediv{
        margin-left:20px;
        background-color: palevioletred;
        width:20%;
        margin-bottom:1%;
    }
.backbtn{
    text-decoration: none;
    margin-left:20px;
}
</style>