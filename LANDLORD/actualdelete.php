<?php
include('../reputablecodes/dbconnection.php');
$no=$_GET['no'];
$email=$_GET['email'];
 
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
        ?>
            <div class="messagediv">
                <?php
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                ?>
                 <br>
            </div>
       <?php
    }
   
}

?>
<a class="backbtn"href="viewhostel.php?email=<?php echo$email?>">BACK</a>
<style>
    .messagediv{
        padding-left:1%;
        margin-top: 2%;
        margin-left:10%;
        background-color: palevioletred;
        width:20%;
        margin-bottom:1%;
    }
.backbtn{
    text-decoration: none;
    margin-left:10%;
}
</style>