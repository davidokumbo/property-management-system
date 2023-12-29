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
        <h2 class="hostelheading">Landlord currently Registered</h2>
        <tr>
            <th>name</th>
            <th>phone number</th>
            <th>Email </th>
            <th>Date Registered </th>
        </tr>

        <?php
        $count = mysqli_num_rows($querry);
        if ($count > 0) {
            while ($fetchdetails = mysqli_fetch_assoc($querry)) {
                $name = $fetchdetails['name'];
                $phonenumber = $fetchdetails['phonenumber'];
                $email = $fetchdetails['email'];
                $date = $fetchdetails['date'];

        ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $phonenumber; ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $date ?></td>
                   
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
    <a class="viewbookingbackbtn" href="landlordhomepage.php">BACK</a>
    <style>
       
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