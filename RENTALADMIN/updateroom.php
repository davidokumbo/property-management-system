<?php
include('../reputablecodes/dbconnection.php');
 $no = $_GET['no'];
$sqlroomdetails = "SELECT * FROM hostels WHERE no=$no";
$roomdetailsquerry = mysqli_query($conn, $sqlroomdetails);
if ($roomdetailsquerry) {
    $fetch = mysqli_fetch_assoc($roomdetailsquerry);
    $hostel_name = $fetch['hostel_name'];
    $type = $fetch['type'];
    $roomnumber = $fetch['roomnumber'];
    $location = $fetch['location'];
    $rent_per_month = $fetch['rent_per_month'];
    $deposit = $fetch['deposit'];
    $owner_name = $fetch['owner_name'];
    $phonenumber = $fetch['phonenumber'];
    $owner_email_address = $fetch['owner_email_address'];
}
?>

<form method="post">
    <label for="hostelname">Hostel name</label><br>
    <input class="posthostelform" type="text" id="hostelname" name="hostelname" value="<?php echo $hostel_name ?>"><br>
    <label for="hosteltype">Room type</label><br>
    <select class="posthostelform" name="hosteltype" id="hosteltype">
        <option value="singleroom">Single room</option>
        <option value="bedsitter">Bed sitter</option>
        <option value="doubleroom">Double room</option>
    </select><br> <label for="roomnumber">Room number</label><br>
    <input class="posthostelform" type="number" id="roomnumber" name="roomnumber" value="<?php echo $roomnumber ?>"><br>
    <label for="location">hostel location</label><br>
    <select class="posthostelform" name="location" id="location">
        <option value="kiwanja area">Kiwanja area</option>
        <option value="transformer">Transformer</option>
        <option value="moriah region">Moriah region</option>
        <option value="beside laquinta">beside laquinta</option>
        <option value="next to esther apartment">Esther Apartments </option>
        <option value="winners region">Winners Apartments </option>
        <option value="beside tulivu hostel">Tulivu Apartments </option>
        <option value="near lucy hostel">lucy Apartments </option>
    </select><br>
    <label for="rent">Rent per month</label><br>
    <input class="posthostelform" type="number" id="rent" name="rent" value="<?php echo $rent_per_month ?>"><br>
    <label for="landlord">Owner name</label><br>
    <input class="posthostelform" type="text" id="landlord" name="landlord" value="<?php echo $owner_name ?>" disabled><br>
    <label for="phonenumber">Phone number</label><br>
    <input class="posthostelform" type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>" disabled><br>
    <label for="email">Owner email</label><br>
    <input class="posthostelform" type="email" id="email" name="email" value="<?php echo $owner_email_address ?>" disabled><br>


    <a class="backlinkform" href="postedrooms.php">BACK</a>
    <input class="posthostelformbtn" type="submit" name="updatehostel" value="update hostel">

</form>

<?php
if (isset($_POST['updatehostel'])) {
    $hostelname = $_POST['hostelname'];
    $hosteltype = $_POST['hosteltype'];
    $roomnumber = $_POST['roomnumber'];
    $location = $_POST['location'];
    $rent = $_POST['rent'];

    if (($rent < 2000) || ($rent > 15000)) {
        echo "<script>alert('Invalid rent amount, minimum amount of 2000, maximum of 15000')</script>";
    } else {
        if (($roomnumber < 0) || ($roomnumber > 1000)) {
            echo "<script>alert('Invalid room  number. minimum of 1 and maximum of 1000')</script>";
        } else {

            $sqlupdate = "UPDATE hostels SET
                    hostel_name='$hostelname',
                    type='$hosteltype',
                    roomnumber='$roomnumber',
                    location='$location',
                    rent_per_month='$rent',
                    deposit='$rent'
                    WHERE no='$no'
                    ";
            $sqlupdatequerry = mysqli_query($conn, $sqlupdate);
            if ($sqlupdatequerry == true) {
                $sqlgetusername = "SELECT username FROM userdetails WHERE usertype='Student'";
                $usernamequerry = mysqli_query($conn, $sqlgetusername);
                while ($fetch = mysqli_fetch_assoc($usernamequerry)) {
                    $username = $fetch['username'];
                    $sqlupdateaccount = "UPDATE $username SET
                            hostel_name='$hostel_name',
                                type='$hosteltype',
                                roomnumber='$roomnumber',
                                location='$location',
                                rent_per_month='$rent',
                                deposit='$deposit'
                                WHERE no='$no'
                            ";
                    $updateaccountquerry = mysqli_query($conn, $sqlupdateaccount);
                    if ($updateaccountquerry == true) {
                        $_SESSION['roomupdate'] = $hostel_name . ' hostel number ' . $no . ' updated successfully';
                        header('location:' . SITEURL . 'RENTALADMIN/postedrooms.php');
                    }
                }
            }
        }
    }
}
?>

<style>
    .backlinkform {
        text-decoration: none;
        margin-right: 15%;
        margin-left: -15%;
        background-color: wheat;
    }

    form {
        margin-left: 20%;
        margin-right: 50%;
        background-color: bisque;
        text-align: center;
        border-radius: 10px;
    }

    label {
        font-weight: bolder;
    }

    .posthostelform {
        padding: 0.5%;
        margin-bottom: 2px;
        border: none;
        width: 60%;

    }

    .posthostelform:hover {
        border: none;
        border-bottom: 1px solid black;
    }

    .posthostelformbtn {
        background-color: lightgreen;
        font-weight: bold;
        padding: 2% 2%;
        border: none;
        border-radius: 5px;
        font-style: larger;
        margin-bottom: 4px;
    }

    .posthostelformbtn:active {

        background-color: greenyellow;
    }
</style>