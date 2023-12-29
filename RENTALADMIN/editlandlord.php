<?php
include('../reputablecodes/dbconnection.php');
 $email=$_GET['email'];
$getdetailssql="SELECT * FROM userdetails WHERE email='$email'";
$sqlquerry=mysqli_query($conn,$getdetailssql);
$count=mysqli_num_rows($sqlquerry);
$fetch=mysqli_fetch_assoc($sqlquerry);
 $name=$fetch['name'];
 $phonenumber=$fetch['phonenumber'];
 $email=$fetch['email'];
 $username=$fetch['username'];

?>
 <form method="post">
        <label for="landlordname">landlord name</label><br>
        <input class="posthostelform" type="text" id="landlordname" name="landlordname" value="<?php echo $name ?>" ><br>
        <label for="landlordphone">landlord phone number</label><br>
        <input class="posthostelform" type="number" id="landlordphone" name="landlordphone" value="<?php echo $phonenumber ?>"><br>
        <label for="landlordemail">landlord email</label><br>
        <input class="posthostelform" type="email" id="landlordemail" name="landlordemail" value="<?php echo $email ?>"disabled><br>
        <label for="username">username</label><br>
        <input class="posthostelform" type="text" id="username" name="username" value="<?php echo $username ?>" ><br>
        <a class="backlinkform" href="adminlandlords.php">BACK</a>
        <input class="posthostelformbtn" type="submit" name="updatelandlord" value="post hostel">
    
 </form>
                <?php
                if(isset($_POST['updatelandlord'])){
                   echo $name=$_POST['landlordname'];
                   echo $phonenumber=$_POST['landlordphone'];
                   echo $username=$_POST['username'];


                   if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    echo "<script>alert('name must be letters only')</script>";
                  } else {
                    $countnum = strlen($phonenumber);
                    if ($countnum != 10) {
                      echo "<script>alert('Phone number must contain 10  digits')</script>";
                    } else {
                      if ($phonenumber < 0) {
                        echo "<script>alert('Invalid phone number')</script>";
                      } else {
                          if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                            echo "<script>alert('failed to track your details, ensure username has no @ or numbers')</script>";
                          } else {
                     $sqlupdate="UPDATE userdetails SET
                                        name='$name',
                                        phonenumber='$phonenumber',
                                        username='$username'
                                        WHERE email='$email'
                                        ";
                      $sqlupdatequerry=mysqli_query($conn,$sqlupdate);
                      if($sqlupdatequerry==true){
                        $_SESSION['landlordupdate']='Records for landlord '.$name.' updated successfully';
                        header('location:'.SITEURL.'RENTALADMIN/adminlandlords.php');
                      }
                          }
                        }
                    }
                }
            }
                
                ?>


<style>
      .backlinkform {
            text-decoration: none;
            margin-right: 15%;
            margin-left: -15%;
            background-color: wheat;
        }

        form {
            margin-left: 20%;
            margin-right: 50%;
            background-color: bisque;
            text-align: center;
            border-radius: 10px;
        }

        label {
            font-weight: bolder;
        }
     .posthostelform {
            padding: 0.5%;
            margin-bottom: 2px;
            border: none;
            width: 60%;

        }

        .posthostelform:hover {
            border: none;
            border-bottom: 1px solid black;
        }

        .posthostelformbtn {
            background-color: lightgreen;
            font-weight: bold;
            padding: 2% 2%;
            border: none;
            border-radius: 5px;
            font-style: larger;
            margin-bottom: 4px;
        }

        .posthostelformbtn:active {

            background-color: greenyellow;
        }
</style>