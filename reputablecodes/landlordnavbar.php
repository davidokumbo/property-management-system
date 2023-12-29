<?php
if(isset( $_SESSION['email'])){
  echo  $email= $_SESSION['email'];
}
?>
<section class="section">
    <div class="container ">

        <div class="menu sticky ">
            <div class="navlist">
                <ul class="text-center">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Testimonials</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
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
        position:fixed;
        top: 0%;
        width:100%;
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