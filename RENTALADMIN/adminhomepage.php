<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>

<body>
    <h2>Admin Panel</h2>

    <div class="aligndivs">

        <div class="admindashboard">
            <a class="adminbtnlinks" href="adminlandlords.php">Landlords</a>
            <a class="adminbtnlinks" href="adminstudents.php">Students/Tenants</a>
            <a class="adminbtnlinks " href="postedrooms.php">Available Posted Vacant rooms</a>
            <a class="adminbtnlinks" href="acceptedvacantrooms.php">Accepted vacant rooms</a>
            <div class=" genreportdiv">
                <p>Reports</p> 
                <div class="reportlist">
                    <a class="reportlink" href="landlordsreport.php">landlords</a>
                    <a class="reportlink"href="studentsreport.php">students</a>
                    <a class="reportlink"href="postedroomsreport.php">available posted vacant rooms</a>
                    <a class="reportlink"href="acceptedvacantrooms.php">accepted rooms</a>
                </div>
            </div>


            <a class="adminbtnlinks" id="logout" href="../frontend/homepage.php">logout</a>
        </div>



        <div class="explanation">
        <div class="align">
          <br>
            <div>
             <h3>Efficient and secure platform you can trust</h3>
             </div>
             <br>
             <br>
             <div>
             <p>Welcome to your portal page as an application administrator where 
                you can block users, modify landlords vacant houses, 
                view all users using the application,
                 and manage the entire system.
           </p>
             </div>
             <br>
             <br>
             <div>
                <h4>feel free to easily manage the application and users. </h4>
             </div>
        </div>
       </div>

    </div>
    <div>
        <?php
        include('../reputablecodes/footer.php');
        ?>
    </div>
</body>
<style>
      .align{
      
        background-color: wheat;
        min-height: 340px;
        width:50%;
        margin-left:20%;
        border-radius: 20px;
        text-align:center;
        padding:0 5px;
        margin-top: 5px;
    }
    .genreportdiv{
        /* border:2px solid red; */
        width: 15%;
        display: block;
        margin-left: 3%;
        margin-bottom: 5%;
        padding-top: 1.7%;
        text-align: center;
        color:darkblue;
        font-weight: bold;
        position: relative;

    }
    .genreportdiv:hover{
        color: darkorange;
    }
    .genreportdiv :active{
        color: red;  
    }

    .reportlist{
        /* border:2px solid yellow; */
        /* display:block; */
        display:none;
       border-radius:10px;
       background-color: wheat;
      
    }
    .reportlink{
        /* border:2px solid green; */
        display: inline-block;
        width:90%;
        padding:0 4%;
        margin-bottom: 2%;
    }
    .reportlink:hover{
        color:green;
    }
    .genreportdiv:hover .reportlist{
        display: block;
        position: absolute;
    }

    #logout {
        margin-left: 15%;
    }

    .clearfix {
        clear: both;
        float: none;
    }

    a {
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        color: darkorange;
    }

    a:active {
        color: red;
    }

    .aligndivs {
        display: block;
        border: 2px solid white;
    }

    .explanation {
        background-color: lightcyan;
        width: 100%;
        min-height: 400px;
        padding-top:50px;
    }

    .adminpanel {
        border: 2px solid black;
    }

    .admindashboard {
        background-color: lightgrey;
        min-height: 50px;
        width: 95%;
        position: absolute;
        display: flex;
        margin-left: 2%;
        border-radius: 10px;
        margin-bottom: 0%;
        padding-left: 0.5%;
        top:0%;
        position: sticky;
    }
    
    .adminbtnlinks {
        color:darkblue;
        width: auto;
        display: flex;
        margin-left: 3%;
        margin-bottom: 5%;
        padding-top: 3%;
        text-align: center;
    }

    h2 {
        text-align: center;
    }
</style>

</html>