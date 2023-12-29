<?php
//including db connection code and session_start() here
include('../reputablecodes/dbconnection.php');

echo $id = $_GET['id'];   //getting the id to be deleted from the view.php page. $id is the variable created here to store the value of id variable 
                           //created at the view.php page.
$sql = "DELETE FROM landlords WHERE landlord_id_no=$id;"; //sql query to delete the gotten id
$res = mysqli_query($conn, $sql);  //database connection, $conn is inside the include file at the top page

if($res==TRUE){ // line to check whether the query is executed successfully
    $_SESSION['delete'] = "<div class='landlord_updated'>Landlord deleted successfully</div>";//session to store the dispaly message whenever the landlord is deleted successfully
    header('location:'.SITEURL.'Admin/view.php');//redirecting the dispaly message to be displayed in the view.php page
}
else{
    $_SESSION['delete']="<div class='no_landlord_deletion'>Failed to delete the landlord</div>";
    header('location:'.SITEURL.'Admin/view.php');
}
?>