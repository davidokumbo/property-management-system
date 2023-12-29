<?php
include('../reputablecodes/dbconnection.php');
if (isset($_POST['resetpassword'])) {
    $error = "";
    $email = $_POST['Semail'];
    $pass = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];

    $checkemail = "SELECT * FROM userdetails WHERE email='$email'";
    $checkquery = mysqli_query($conn, $checkemail);
    if ($checkquery == true) {
        $count = mysqli_num_rows($checkquery);
        if ($count > 0) {
            if ($pass != $confirmpass) {
                $_SESSION['error'] = "password does not match";
            } else {
                $passwordlength = strlen($pass);
                if (($passwordlength < 6) || ($passwordlength > 15)) {
                    $_SESSION['error'] = "password must be more than six characters and less than fifteen characters";
                } else {
                    $sql = "UPDATE userdetails SET password='$pass' WHERE email='$email'";
                    $sqlquerry = mysqli_query($conn, $sql);
                    if ($sqlquerry == true) {
                        $_SESSION['error'] = "Reset password process completed successfully";
                    } else {
                        $_SESSION['error'] = "failed to reset password";
                    }
                }
            }
        } else {
            $_SESSION['error'] = "Email is not found, enter email you used during registration";
        }
    } else {
        $_SESSION['error'] = "failed to check your details";
    }
}


?>

<form method="POST">
    <h4 class="main-heading">RESET PASSWORD</h4>
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
    <br>
    <input class="formelement" name="Semail" type="email" placeholder="enter your email" required><br><br>
    <input class="formelement" name="password" type="password" placeholder="enter password" required><br><br>
    <input class="formelement" name="confirmpassword" type="password" placeholder="confirm password" required><br><br>
    <input class="submit" type="submit" name="resetpassword" value="Reset password">
</form>
<a class="backbtn" href="homepage.php">Back to homepage</a>
<style>
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

    .backbtn {
        text-decoration: none;
        margin-left: 30%;
        font-weight: bold;
    }

    .backbtn:hover {
        color: green;
    }

    form {
        margin-left: 30%;
        margin-top: 5%;
        background-color: wheat;
        width: 20%;
        padding-left: 3%;
        padding-top: 1%;
        padding-bottom: 1%;
    }

    .formelement {
        margin: 3px 0px;
        padding: 3px 0px;
        /* border: 3px solid red; */
    }
</style>