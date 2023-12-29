<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
      #login-form{
        display:none;
      }
      
      
      .form-box{
        width:40%;
        height:400px;
        position:relative;
        top:90px;
        left:210px;
        text-align:center;
       
      }
      .main-heading{
        color:orangered;
        padding-bottom:20px;
      }
      .form{
        position:relative;
        margin: 0 auto 100px;
        padding:45px;
        
        text-align:center;
        background-color:lightblue;

      }
      .form input{
        font-family:sans-serif;
        outline:none;
        border:none;
        border-bottom: 1px solid black;
        width:100%;
        padding:3%;
        font-size:14px;
        margin:1%;
      }
      .form button{
        cursor:pointer;
        width:80%;
        color: white;
        font-family:sans-serif;
        background-color:coral;
        padding:15px;
        margin:2px;
        border:none;
        font-size: 15px;
      }
      .form .button a{
        text-decoration:none;
        color: white;
      }
      .form .asking{
        font-size:14px;
        color:black;
        margin:15px 0 0;
      }
      .form .asking a{
        text-decoration:none;
        color: orangered;
      }
      .form .student-form{
        display:none;
      }
      .form .registration{
        display:none;
      }
    </style>

</head>
<body>
<button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button>

<div id="login-form" class="login-page">
  <div class="form-box">
        <div class="form">

            <form action="" class="login-form">
                <center><h1 class="main-heading">LOGIN AS:</h1></center>
                <button>STUDENT</button>
                <button>LANDLORD</button>
                <P class="asking">Not reqistered? <a href="#">register</a></P>
            </form>

            <form action=""class="registration">
            <center><h1 class="main-heading">REGISTER AS:</h1></center>
                <button class="button"><a href="#">STUDENT</a></button>
                <button class="button"><a href="#">LANDLORD</a></button>
                <P class="asking">Already reqistered? <a href="#">login</a></P>
            </form>
        </div>
   </div>
</div>

<div id='student-form' class="login-form">
           <form action=""class="student-form">
                <center><h1 class="main-heading">STUDENT REGISTRATION FORM:</h1></center>
                <input type="text" placeholder="student name">
                <input type="number" placeholder="student ID number">
                <input type="number" placeholder="student phone number">
                <input type="text" placeholder="student email">
                <input type="text" placeholder="username">
                <input type="text" placeholder="set password">
                <input type="text" placeholder="confirm password">
                <button>Register</button>
                <P class="asking">Already reqistered? <a href="#">login</a></P>
            </form>
</div>


<script>
    var modal= document.getElementById('login-form');
    window.onclick=function(event){
    if(event.target==modal){
          modal.style.display='none';
    }
}
</script>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>

<script>
    $('.asking a').click (function(){
        $('form').animate({height:"toggle", opacity:"toggle"}, "slow");
    });
</script>

</body>
</html> -->