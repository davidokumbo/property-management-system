<?php
include("../reputablecodes/dbconnection.php");
?>

<?php
//registration backend starts
if (isset($_POST["Register"])) {
  $usertype = $_POST["user"];
  $name = $_POST["name"];
  $phonenumber = $_POST["phonenumber"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $passwordcon = $_POST["passwordcon"];
  if ($password != $passwordcon) {
    echo "<script>alert('password mismatch')</script>";
    $_SESSION['delete'] = "<div class='landlord_updated'>Password mismatch please check again</div>"; //session to store the dispaly message whenever the landlord is deleted successfully
    // header('location:'.SITEURL.'Admin/view.php');//redirecting the dispaly message to be displayed in the view.php page
?>
    <script>
      document.getElementById("login-form").style.display = "block";
    </script>
    <?php
  } else {
    $passwordlength = strlen($password);
    if (($passwordlength < 6) || ($passwordlength > 15)) {
      echo "<script>alert('password must be more than six characters and less than fifteen characters')</script>";
    } else {
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
            if ($phonenumber[0] != '0') {
              echo "<script>alert('Invalid phone number')</script>";
            } else {
              if (($phonenumber[1] == 1) || ($phonenumber[1] == 7)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo "<script>alert('Invalid email address')</script>";
                } else {
                  if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                    echo "<script>alert('failed to track your details, ensure username has no @ or numbers')</script>";
                  } else {
                    $sqlcheck = "SELECT * FROM userdetails WHERE email='$email'";
                    $count = mysqli_num_rows(mysqli_query($conn, $sqlcheck));
                    if ($count > 0) {
                      echo "<script>alert('user already exist')</script>";
                    } else {
                      $sqlcheck = "SELECT * FROM userdetails WHERE username='$username'";
                      $count = mysqli_num_rows(mysqli_query($conn, $sqlcheck));
                      if ($count > 0) {
                        echo "<script>alert('username already exists, please choose another username')</script>";
                      } else {

                        if ($usertype == 'Student') {
                          $sqlcreatetable = " CREATE TABLE $username (
                    number INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    no INT(6),
                    hostel_name VARCHAR(30) NOT NULL,
                    type VARCHAR(30) NOT NULL,
                    roomnumber INT(30),
                    location VARCHAR(50),
                    rent_per_month DECIMAL(10,0),
                    deposit DECIMAL(10,0),
                    owner_name VARCHAR(50),
                    phonenumber INT(30),
                    owner_email_address VARCHAR(50),
                    status INT(1),
                    date TIMESTAMP
                  )";
                          $createtable = mysqli_query($conn, $sqlcreatetable);
                          if ($createtable == true) {

                            $sql = "INSERT INTO userdetails SET
                      usertype = '$usertype',
                      name = '$name',
                      phonenumber	 = '$phonenumber',
                      email  = '$email',
                      username = '$username',
                      password = '$password'
                      ";
                            $res = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                            if ($res == true) {
                              echo "<script>alert('account created successfully')</script>";

                              $sqlupdatestudentaccount = "INSERT INTO $username (no,hostel_name,type,roomnumber,location,rent_per_month,deposit,owner_name,phonenumber,owner_email_address)
                         SELECT no,hostel_name,type,roomnumber,location,rent_per_month,deposit,owner_name,phonenumber,owner_email_address FROM hostels;";
                              $updateaccountquery = mysqli_query($conn, $sqlupdatestudentaccount);
                            } else {
                              echo "<script>alert('failed to create account')</script>";
                            }
                          } else {
                            echo "<script>alert('failed to track your details, ensure username has no spaces, @ or numbers')</script>";
                          }
                        } elseif ($usertype == 'landlord') {

                          $sql = "INSERT INTO userdetails SET
                        usertype = '$usertype',
                        name = '$name',
                        phonenumber	 = '$phonenumber',
                        email  = '$email',
                        username = '$username',
                        password = '$password'
                        ";
                          $res = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                          if ($res == true) {
                            echo "<script>alert('account created successfully')</script>";
                          }
                        }
                      }
                    }
                  }
                }
              } else {
                echo "<script>alert('Invalid phone number')</script>";
              }
            }
          }
        }
      }
    }
  }
}
//registration backend ends
//login verification starts

if (isset($_POST['login'])) {

  echo $Semail = $_POST['Semail'];
  $email = mysqli_real_escape_string($conn, $Semail);
  echo $Susername = $_POST['Susername'];
  $Susername = mysqli_real_escape_string($conn, $Susername);
  echo $Spassword = $_POST['Spassword'];
  $password = mysqli_real_escape_string($conn, $password);

  $loginsql = "SELECT * FROM userdetails WHERE email='$Semail'";
  $loginresult = mysqli_query($conn, $loginsql);

  $row = mysqli_fetch_assoc($loginresult);
  if (mysqli_num_rows($loginresult) > 0) {

    $usertype = $row['usertype'];
    $email = $row['email'];
    $username = $row['username'];
    $password = $row['password'];
    $username = $row['username'];
    $status = $row['status'];
    if ($status == 0) {
      if (($Semail == $email) && ($Susername ==  $username) && ($Spassword == $password)) {
        if ($usertype == 'Student') {


          $_SESSION['user'] = $row['usertype'];
          $_SESSION['semail'] =  $Semail;
          $_SESSION['username'] = $row['username'];
          header('location:' . SITEURL . '\STUDENT\studenthomepage.php');
        } elseif ($usertype == 'landlord') {
          $_SESSION['email'] =  $email; //sending session to viewhostel.php in landlord side
          header('location:' . SITEURL . '\LANDLORD\landlordhomepage.php');
        }
      } else {
        echo "<script>alert('invalid input, check and try again ')</script>";
    ?>
        <html>
        <Script>
          document.getElementById("login-form").style.display = "block";
        </Script>

        </html>
    <?php
      }
    } elseif ($status == 1) {
      echo "<script>alert('You are blocked, contact system administrator for more information')</script>";
    }
  } elseif ($_POST['Semail'] == 'admin@gmail.com' && $_POST['Susername'] == 'admin' && $_POST['Spassword'] == 'david22') {
    header('location:' . SITEURL . '\RENTALADMIN\adminhomepage.php');
  } else {
    echo "<script>alert('user not registered')</script>";
    ?>
    <Script>
      document.getElementById("login-form").style.display = "block";
    </Script>
<?php
  }
}

//login verification ends

?>


<section class="section">
  <div class="container ">

    <div class="menu sticky ">
      <div class="navlist">
        <ul class="text-center">
          <li>
            <a href="../frontend/homepage.php">Home</a>
          </li>
          <li>
            <a href="#about-us">About</a>
          </li>
          <li>
            <a href="#testimonyformarterdiv">Testimonials</a>
          </li>
          <li>
            <a href="#footer">Contact</a>
          </li>
          <li>
            <button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login/Register</button>
            <div id="login-form" class="login-page">
              <div class="form-box">
                <div class="form">

                  <form action="" class="login-form" method="POST">
                    <h1 class="main-heading">LOGIN:</h1>
                    <input class="formelement" name="Semail" type="email" placeholder="enter your email" required>
                    <input class="formelement" name=" Susername" type="text" placeholder="enter username" required>
                    <input class="formelement" name="Spassword" type="password" placeholder=" enter password" required>
                    <input class="submit" type="submit" name="login" value="login">
                    <P class="asking">Not reqistered? <a href="#">register</a></P><br>
                    <p><a href="passwordreset.php">forgot password?</a></p>
                  </form>

                  <form action="" class="registration" id="registration" method="POST">

                    <h1 class="main-heading">REGISTER</h1>
                    <select class="formelement select" name="user" id="">
                      <option value="Student">Student</option>
                      <option value="landlord">Landlord</option>
                    </select>
                    <input class="formelement" name="name" type="text" placeholder=" name" required>
                    <input class="formelement" name="phonenumber" type="number" placeholder="phone number" required>
                    <input class="formelement" name="email" type="email" placeholder="email" required>
                    <input class="formelement" name="username" type="text" placeholder="username, no spaces or numbers" required>
                    <input class="formelement" name="password" type="password" placeholder="set password" required>
                    <input class="formelement" name="passwordcon" type="password" placeholder="confirm password" required><br>
                    <input class="submit" type="submit" name="Register" value="Register">
                    <P class="asking"> reqistered? <a href="#">login</a></P>
                  </form>
                </div>
              </div>
            </div>

            <script>
              var modal = document.getElementById('login-form');
              window.onclick = function(event) {
                if (event.target == modal) {
                  modal.style.display = 'none';
                }
              }
            </script>

            <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>

            <script>
              $('.asking a').click(function() {
                $('form').animate({
                  height: "toggle",
                  opacity: "toggle"
                }, "slow");
              });

              $('.submit').click(function() {
                $('.login-page').style.display == "none";
              });
            </script>
          </li>

        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>
<div class="clearfix"></div>



<style>
  * {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .section {
    margin: 2% 0;
  }

  .container {
    margin: 0px;
    padding: 0;


  }

  .navlist {
    margin-top: 2%;
  }

  .menu {
    background-color: aqua;
    padding: 0;
    width: 100%;

  }

  .menu ul {
    list-style-type: none;
    text-align: center;
    padding-bottom: 2%;
    margin-top: 1%;


  }

  .menu ul li {
    display: inline;
    padding: 3%;
    font-weight: 1%;
  }

  .menu ul li a {
    color: darkslategray;
    text-decoration: none;
    line-height: 4%;
  }

  .menu ul li a:hover {
    background-color: darkgoldenrod;
    color: darkmagenta;
    font-weight: bold;
    border-radius: 5px;
    padding: 5px;
  }

  .clearfix {
    clear: both;
    float: none;

  }

  .sticky {
    position: fixed;
    top: 0%;
    width: 100%;
  }

  /* login form css */

  #login-form {
    display: none;
    position: absolute;
    width: 60%;
    left: 30%;
    top: 120%;
  }

  .form-box {
    width: 40%;
    height: 400px;
    top: 90px;
    left: 210px;
    text-align: center;

  }

  .select {
    width: 100%;
  }

  .main-heading {
    color: orangered;
    padding-bottom: 20px;
  }

  .form {
    position: relative;
    margin: 0 auto 100px;
    padding: 45px;

    text-align: center;
    background-color: lightblue;

  }

  .form input {
    font-family: sans-serif;
    outline: none;
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
    padding: 3%;
    font-size: 14px;
    margin: 1%;
  }

  .form button {
    cursor: pointer;
    width: 80%;
    color: white;
    font-family: sans-serif;
    background-color: coral;
    padding: 15px;
    margin: 2px;
    border: none;
    font-size: 15px;
  }

  .form .button a {
    text-decoration: none;
    color: white;
  }

  .form .asking {
    font-size: 14px;
    color: black;
    margin: 15px 0 0;
  }

  .form .asking a {
    text-decoration: none;
    color: orangered;
  }

  .form .student-form {
    display: none;
  }

  .form .registration {
    display: none;
  }

  .loginbtn {
    border: none;
    background-color: aqua;
    font-size: 15px;
  }

  .loginbtn:hover {
    background-color: darkgoldenrod;
    color: darkmagenta;
    font-weight: bold;
    border-radius: 5px;
    padding: 0 5px;
  }

  .registration-form {
    display: none;
    position: absolute;
    width: 15%;
    border: 3px solid black;
    top: 120%;
    left: 60%;
  }

  .formelement {
    margin: 3px 0px;
    padding: 3px 0px;
    /* border: 3px solid red; */
  }

  .submit {
    cursor: pointer;
    width: 80%;
    color: white;
    font-family: sans-serif;
    background-color: coral;
    padding: 15px;
    margin: 2px;
    border: none;
    font-size: 15px;
  }

  .submit:hover {
    border: 1px solid black;
    border-radius: 5px;
  }
</style>