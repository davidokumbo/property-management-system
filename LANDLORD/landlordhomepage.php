<?php
include('../reputablecodes/dbconnection.php');

if(isset( $_SESSION['email'])){
   echo $email= $_SESSION['email'];    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner's page</title>
    <link rel="stylesheet" href="../css/owner.css">
</head>

<body>
    <section class="section">
        <div class="container ">

            <div class="menu sticky ">
                <div class="navlist">
                    <ul class="text-center">
                        <!-- <li>
                            <a href="#">Home</a>
                        </li> -->
                        <li>
                            <?php
                            if(isset( $_SESSION['email'])){
                             $email= $_SESSION['email'];    
                             ?>
                            <a href="posthostel.php?email=<?php echo $email?>">post hostel</a>
                            <?php
                            }
                            ?>
                        </li>
                        <li>
                            <a href="viewhostel.php?email=<?php echo $email?>">viewhostel</a> 
                        </li>
                        <li>
                            <a href="acceptedrequestlist.php?email=<?php echo $email?>">Accepted Requests</a>
                        </li>
                       <li>
                            <a href="registeredlandlord.php">other landlord users</a>
                        </li>
                        <li>
                            <a href="../frontend/homepage.php">logout</a>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div class="clearfix"></div>


    <!--navbar starts here-->
    <!-- <div class="headdiv fixedhead"> 
    </div>
    <div class="clearfix"></div>
  
    <div class="clearfix"></div> -->
    <!--navbar ends here-->

    <div class="formatcontent">

        <section class="content">
            <button onclick="myfunction()" class="sidebar">sidebar</button>
            <div id="content" class="buttonclass">
                <ul>
                    <!-- <form>
                        <li onclick=""><a href="posthostel.php">posthostel</a></li>
                        <br>
                        <li><a href="viewhostel.php">viewhostel</a></li>
                        <br>
                        <li><a href="">Check booking request</a></li>
                    </form> -->
                </ul>
            </div>
        </section>

        <div class="adverts">
        <div class="posthostelresponse">
            
            <?php
            if (isset($_SESSION['posthostel'])) {
                echo $_SESSION['posthostel'];
                 unset($_SESSION['posthostel']);
            }
            ?>
        </div>
            <br>
            <div>
             <h3>Efficient and secure platform you can trust</h3>
             </div>
             <br>
             <br>
             <div>
             <p>Welcome to your portal page as a Landlord  to help you post vacant houses, 
                receive notification from clients, accepting or rejecting, sending response
                 to the client and assigning vacant houses to the successful applicants.</p>
             </div>
             <br>
             <br>
             <div>
                <h4>feel free to easily use the application. </h4>
             </div>
        </div>
      
        <div id="posthostel" class="content2">
            <?php include("posthostel.php") ?>
        </div>
        <?php

        ?>
        <div id="viewhostel" class="content3">

        </div>
    </div>

    <script>
        function myfunction() {
            document.getElementById("content").classList.toggle("show");
        }

        function posthostel() {
            document.getElementById("posthostel").classList.toggle("showposthostel");
        }

        function viewhostel() {
            document.getElementById("viewhostel").classList.toggle("showposthostel");
        }
    </script>
    <!--footer starts here-->
    <?php include("../reputablecodes/footer.php") ?>

    <!--footer ends here-->
</body>




<style>
    /* styling the headernavbar at the top */
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
    .posthostelresponse{
        background-color: palegreen;
        width:24%;
    }
.adverts{
    border-radius: 10px;
    padding:0 2%;
    background-color: wheat;
    margin-top:6%;
    margin-left: 8%;
    /* border:2px solid red; */
    width:80%;
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
</style>

</html>