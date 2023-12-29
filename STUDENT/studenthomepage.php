<?php include('../reputablecodes/dbconnection.php')



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentpage</title>
    <link rel="stylesheet" href="../css/studentpage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>

<body>

    <div class="container">
        <nav>

            <div class="headdiv fixedhead">
                <h1 class="heading">Student's application page</h1>
            </div>
            <div class="clearfix"></div>
            <div class="zindexnotification">
                <?php include("../reputablecodes/studentnavbar.php") ?>
            </div>
            <div class="clearfix"></div>

        </nav>
    </div>


    <div class="decoration">
        <div class="align">
          <br>
            <div>
             <h3>Efficient and secure platform you can trust</h3>
             </div>
             <br>
             <br>
             <div>
             <p>Welcome to your portal page as a vacant room applicant to help you view posted vacant houses, apply,
                receive notification from landlords, booking, accepting or cancellation of applied requests and
                 being allocated a vacant house once the process is successfully completed.</p>
             </div>
             <br>
             <br>
             <div>
                <h4>feel free to easily use the application. </h4>
             </div>
        </div>
    </div>
    <!--footer starts here-->

    <!--footer ends here-->

    <?php include("../reputablecodes/footer.php") ?>
</body>

</html>
<style>
    .decoration{
        border: 2px solid white;
        min-height: 300px;
        
    }
    .align{
        margin-top: 8%;
        background-color: wheat;
        min-height: 340px;
        width:50%;
        margin-left:20%;
        border-radius: 20px 20px  0 0 ;
        text-align:center;
        padding:0 5px;
    }
</style>