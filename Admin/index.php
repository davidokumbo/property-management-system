<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<body>

<div class="headdiv fixedhead"><h1  class="heading">  Admin panel</h1></div> 
    
    <?php include('../reputablecodes/navbar.php')?>

         <!-- content starts here -->
    <div class="dropdown">

       <div class="dropdown1">
        <button class="btn">ADD</button>
        <div class="dropdown-content1">
          <a href="">Landlord</a>
          <a href="">Student</a>
          <a href="">Hostel</a>
          <a href="">Admin</a>
        </div>
       </div>
       
    
     <div class="dropdown2">
       <button class="btn">VIEW</button>
        <div class="dropdown-content2">
          <a href="">Landlord</a>
          <a href="">Student</a>
          <a href="">Hostel</a>
          <a href="">Admin</a>
        </div>
    
     </div>

    </div>
       <!-- content ends here -->
    <?php include("../reputablecodes/footer.php")?>
</body>
</html>