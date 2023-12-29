<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentpage</title>
    <link rel="stylesheet" href="../css/studentpage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
</head>
<body>
    <div class="container">
        <nav>
            <!--navbar starts here-->
            <div class="headdiv fixedhead"><h1 class="heading">Student's application page</h1></div>
            <div class="clearfix"></div>
            <!-- <?php include("../reputablecodes/navbar.php")?> -->
            <div class="clearfix"></div>
            <!--navbar ends here-->
        </nav>
    </div>


    <section class="content">
    <div  class="buttonclass">
     <ul>
     <form>
        <li><input type="button" name="studentbtn1" value="check for available Rooms"  class="btn"></li>
        <br>
        <li><input type="submit" name="studentbtn2" value="check for application details" class="btn"></li>
        </form>
     </ul>
    </div>
    </section>
   
    <!--footer starts here-->
    <?php include("../reputablecodes/footer.php")?>
    <!--footer ends here-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>