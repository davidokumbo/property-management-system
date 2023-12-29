<?php
include('../reputablecodes/dbconnection.php');
?>
<?php
$sql = "SELECT * FROM userdetails WHERE usertype='landlord'"; //landlord email
$querry = mysqli_query($conn, $sql);
if (($querry == TRUE)) {

?>
    <br>
    <table>
        <h2 class="hostelheading">Landlords</h2>
        <div class="updatelandlord">
        <?php
        if(isset($_SESSION['landlordupdate'])){
            echo $_SESSION['landlordupdate'];
             unset($_SESSION['landlordupdate']);
        }
        ?>
        </div>
        <tr>
            <th>name</th>
            <th>phone number</th>
            <th>Email </th>
            <th>username</th>
            <th>Date Registered</th>
        </tr>

        <?php
        $count = mysqli_num_rows($querry);
        if ($count > 0) {
            while ($fetchdetails = mysqli_fetch_assoc($querry)) {
                $name = $fetchdetails['name'];
                $phonenumber = $fetchdetails['phonenumber'];
                $email = $fetchdetails['email'];
                $username=$fetchdetails['username'];
                $date=$fetchdetails['date'];
                $status = $fetchdetails['status'];
        ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $phonenumber; ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $date?></td>
                    <td class="edit">
                        <a href="editlandlord.php?email=<?php echo $email?>">EDIT</a>
                    </td>
                    <td class="status">
                        <?php
                    if($status=='0'){
                       echo"<a href='blockuser.php?email=$email&status=1'>BLOCK</a>";
                    }elseif($status=='1'){
                        $userstatus='UNBLOCK';
                        echo"<a href='blockuser.php?email=$email&status=0'>UNBLOCK</a>";
                    }
                
                        ?>
                      
                    </td>
                    
                   
                </tr>
    <?php


            }
        } else {
            echo "no booking request available";
        }
    }
    ?>
    </table>
    <br>
    <a class="viewbookingbackbtn" href="adminhomepage.php">BACK</a>
    <style>
        .updatelandlord{
            background-color: greenyellow;
            margin-left: 10%;
            width:30%;
            padding-left: 2%;
            border-radius: 3px;
            font-weight: bold;
        }
        .edit{
            background-color: lightgreen;
        }
        .edit:hover{
            background-color: green;
        }
       .status{
        background-color:lightgrey;
       }
       .status:hover{
        background-color: darkgrey;
       }
       .status,a{
        color:black;
        font-size: medium;
        font-weight:bolder;
        text-decoration: none;
       }
       .status:active{
          background-color: lightcoral;
       }
        table, h2,.viewbookingbackbtn{
            margin-left: 10%;
        }
        th {
            background-color: lightblue;
        }

        tr:nth-child(even) {
            background-color: lightgrey;
        }

        .viewbookingbackbtn {
            text-decoration: none;

        }

        .acceptbtn {
            background-color: palegreen;
            text-decoration: none;
        }

        .acceptbtn:active {
            background-color: greenyellow;
        }

        .rejectbtn {
            background-color: palevioletred;
            text-decoration: none;
        }

        .rejectbtn:active {
            background-color: red;
        }
    </style>