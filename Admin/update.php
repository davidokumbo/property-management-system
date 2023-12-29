        
<?php include('../reputablecodes/dbconnection.php'); ?>
         
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update landlord page</title>
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<body>
    <?php
    $id = $_GET['id'];
    $sql ="SELECT * FROM landlords WHERE landlord_id_no = $id;";
    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $count = mysqli_num_rows($res);
        if($count==1){
            $row = mysqli_fetch_assoc($res);

                $landlord_name = $row['landlord_name'];
                $landlord_id_no = $row['landlord_id_no'];
                $landlord_phone_no = $row['landlord_phone_no'];
                $landlord_email = $row['landlord_email'];

        }

    }
    
    ?>

    

<form action="" method="POST">
        <h3 class="headform">update landlord details</h3>
        <br>
        <label for="landlord_name">landlord name:</label><br>
        <input type="text" id="landlord_name"  name="landlord_name" value="<?php echo  $landlord_name;?>" >
     <br><br>
      
     <label for="landlord_phone_no">landlord phone number:</label><br>
     <input type="number" id="landlord_phone_no" name="landlord_phone_no" value="<?php echo $landlord_phone_no;?>" >
     <br><br>
     <label for="landlord_email">landlord email address:</label><br>
      <input type="email" id="landlord_email" name="landlord_email" value="<?php echo $landlord_email ?>" >
     <br><br>
     <input type="hidden" id="landlord_id_no" name="landlord_id_no" value="<?php echo  $id;?>" >
        <input type="submit" name="update" value="update" class="submitbtn">
    </form> 


    <?php
    
   if(isset($_POST['update'])){
    //getting data from the form using the name variable of respective form element
    $landlord_name = $_POST['landlord_name'];
    $landlord_phone_no = $_POST['landlord_phone_no'];
     $landlord_email = $_POST['landlord_email'];
     
    // sql querry to update the data into database
    $sql = "UPDATE landlords SET
    landlord_name ='$landlord_name',
    landlord_phone_no = '$landlord_phone_no',
    landlord_email = ' $landlord_email'
    WHERE landlord_id_no = $id
    ";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['updated']="<div class='landlord_deleted'>landlord details updated successfully</div>";
        header('location:'.SITEURL.'Admin/view.php');
    }
    else{
        $_SESSION['updated']='landlord details failed to be updated';
        header('location:'.SITEURL.'Admin/view.php');
    }
    }

    ?>

</body>
</html>
 