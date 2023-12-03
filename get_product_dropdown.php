
<?php

// Database Connection
require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");

// Product Selection
if (isset($_POST['bid'])) {
    $brandid = $_POST['bid'];
    $sql = "SELECT * FROM tblproduct WHERE bid = $brandid";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // echo '<select name="pid" id="pid">';
        echo "<option value=''>-- Select a Product --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        // echo '</select>';
    } else {
        echo "<option value=''>-- No Products Found --</option>";
    }
}

// Color Selection
if (isset($_POST['pid'])) {
    // $productid = $_POST['pid'];
    // $sql = "SELECT * FROM tblproductcolor WHERE pid = $productid";
    $sql = "SELECT * FROM tblcolor";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // echo '<select name="cid" id="cid">';
        echo "<option value=''>-- Select a Color --</option>";
        while ($row = $result->fetch_assoc()) {
            // $colorid = $row['colorid'];
            // $sql1 = "SELECT * FROM tblcolor WHERE id = $colorid";
            // $result1 = $con->query($sql1);
            // $row1 = $result1->fetch_assoc();
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        // echo '</select>';
    } else {
        echo "<option value=''>-- No Colors Found --</option>";
    }
}

// Storage Selection
if (isset($_POST['cid'])) {
    // $colorid = $_POST['cid'];
    $sql = "SELECT * FROM tblstorage";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // echo '<select name="sid" id="sid">';
        echo "<option value=''>-- Select a Storage --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['storage'] . "</option>";
        }
        // echo '</select>';
    } else {
        echo "<option value=''>-- No Storages Found --</option>";
    }
}
?>
