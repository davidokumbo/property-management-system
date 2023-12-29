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
<!--navbar starts here-->
<div class="headdiv fixedhead"><h1 class="heading">Landlord/Lady page</h1></div>
    <div class="clearfix"></div>
    <?php include("../reputablecodes/navbar.php")?>
    <div class="clearfix"></div>
    <!--navbar ends here-->


    <section class="content">
    <div  class="buttonclass">
     <ul>
     <form>
        <li><input type="button" name="studentbtn1" value="Post hostel"  class="btn"></li>
        <br>
        <li ><input type="button" name="studentbtn2" value="View Hostel Status" class="btn"></li>
        <br>
        <li ><input type="button" name="studentbtn2" value="Delete hostel" class="btn"></li>
        </form>
     </ul>
    </div>
    </section>
   
    <!--footer starts here-->
    <?php include("../reputablecodes/footer.php")?>
    <!--footer ends here-->
</body>
</html>