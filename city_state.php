<?php
require_once('includes/dbconnection.php');
// city selection
if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];
    $city = "SELECT * FROM tblcity WHERE sid = '$sid'";
    $city_result = mysqli_query($con, $city);
    if (mysqli_num_rows($city_result) > 0) {
        echo "<option value=''>Select City</option>";
        while ($city_row = mysqli_fetch_assoc($city_result)) {
            $city_id = $city_row['id'];
            $city_name = $city_row['name'];
            echo "<option value='$city_id'>$city_name</option>";
        }
    } else {
        echo "<option value=''>Select State First</option>";
    }
}
