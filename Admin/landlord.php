
           <?php 
           include('../reputablecodes/dbconnection.php');
           ?>
         

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLandlordpage</title>
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<body>
           <br>
          <?php
                   if(isset($_SESSION['add']))
                   {
                       echo $_SESSION['add'];
                       unset($_SESSION['add']);
                   }                     
            ?>
            <br>
            
    <form action="" method="POST">
        <h3 class="headform">Add landlord form</h3>
        <br>
        <label for="landlord_name">landlord name:</label><br>
        <input type="text" id="landlord_name"  name="landlord_name" place holder="enter your names" required>
     <br><br>
         <label for="landlord_id_no">landlord id number:</label><br>
       <input type="number" id="landlord_id_no" name="landlord_id_no" place holder="enter your id number" required>
     <br><br>
     <label for="landlord_phone_no">landlord phone number:</label><br>
     <input type="number" id="landlord_phone_no" name="landlord_phone_no" place holder="enter your phone number" required>
     <br><br>
     <label for="landlord_email">landlord email address:</label><br>
      <input type="email" id="landlord_email" name="landlord_email" place holder="enter your email address" required>
     <br><br>
        <input type="submit" name="submit" value="submit" class="submitbtn">
    </form>
    <br><br>
   
     <a href="view.php" class="submitbtn" style="text-decoration:none;"> view details</a>


  

    
</body>
</html>
   

<?php
               //  process the value from add landlord form and save them in the database
            //    check whether the submit button in the add landlord form is clicked
            if(isset($_POST['submit']))
            {
                // 1. getting the data from form
                $landlord_name = $_POST['landlord_name'];
                $landlord_id_no = $_POST['landlord_id_no'];
                $landlord_phone_no = $_POST['landlord_phone_no'];
                $landlord_email = $_POST['landlord_email'];

               // 2. query to save data into database
               $sql= " INSERT INTO landlords SET 
                    landlord_name = ' $landlord_name',
                    landlord_id_no = '$landlord_id_no',
                    landlord_phone_no = '$landlord_phone_no',
                    landlord_email = '$landlord_email'
               ";
            //     //   connect to database

            //    execute query and save data in database
                  $res = mysqli_query($conn, $sql);

                  if ($res==TRUE)
                  {
                   $_SESSION['add']="Landlord added successfully";
                   header('location'.SITEURL.'Admin/landlord.php');
                  }
                  else{ 
                    $_SESSION['add']="Landlord failed to be added";
                   header('location'.SITEURL.'Admin/landlord.php');
                  }

           }


          
                
            
           
?>