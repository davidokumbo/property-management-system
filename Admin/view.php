
  <?php 
  include('../reputablecodes/dbconnection.php');
  include('../reputablecodes/navbar.php');
  ?>




         <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Admin.css">
    <title>view details</title>
</head>
<body>
<div class="headdiv fixedhead"><h2  class="heading">view details page</h2></div> 
<div class="clearfix"></div>
  <br> <br><br><br><br><br><br>
<?php
if(isset($_SESSION['delete'])){ //session that calls and displays the delete message  redirected from the delete.php page to be displayed here
  echo $_SESSION['delete']; //displaying the message redirected from the delete.php page
  unset($_SESSION['delete']); // removing the displayed message whenever you refresh the page
}
    if(isset($_SESSION['updated'])){
        echo $_SESSION['updated'];
        unset($_SESSION['updated']);
    }

?>
<br><br>

<table class="tbl">
        <tr>
        <th>landlord name</th>
        <th>landlord id number</th>
        <th>landlord phone number</th>
        <th>landlord email address	</th>
        </tr>
<br>
<?php
   //code to get data from database and insert in the table
 

     $sql="SELECT* FROM landlords";
     $res=mysqli_query($conn,$sql) or die(sqli_error());
     if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count>0){
            while($rows=mysqli_fetch_assoc($res))
            {
                //getting individual data from database
                  $landlord_name=$rows['landlord_name'];
                  $landlord_id_number = $rows['landlord_id_no'];
                  $landlord_phone_no = $rows['landlord_phone_no'];
                  $landlord_email = $rows['landlord_email'];
                  //display the values in our table
?>

     <br><br>
        <tr>
            <td><?php echo  $landlord_name; ?></td>
            <td><?php echo $landlord_id_number;?> </td>
            <td><?php echo $landlord_phone_no;?> </td>
            <td><?php echo  $landlord_email;?> </td>

            <td class="updatebtn"> <a href="<?php echo SITEURL;?>Admin/update.php?id=<?php echo  $landlord_id_number;?>">update</a></td>
            <!-- Getting the id details via get method and redirecting it in the delete.php page id is just a variable created here to hold the values 
            of  $landlord_id_number variable fetched from database -->
            <td class="deletebtn"><a href="<?php echo SITEURL;?>Admin/delete.php?id=<?php echo $landlord_id_number?>">Delete</a> </td> 
           
        </tr>
        
   <?php
            }
        }
    
        else{
            echo "no data in database";
        }
   } 
 
     ?>
    </table>

    <button class="back" ><a href="landlord.php">Back</a></button>
    <br><br><br>
<?php include('../reputablecodes/footer.php'); ?>
</body>
</html>