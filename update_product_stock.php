<?php
require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");


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

// price stock selection
if (isset($_POST['color_id']) && isset($_POST['storage_id']) && isset($_POST['product_name'])) {
    $color_id = $_POST['color_id'];
    $storage_id = $_POST['storage_id'];
    $product_name = $_POST['product_name'];

    $select_pid = "SELECT * FROM tblproduct WHERE name = '$product_name'";
    $result_pid = mysqli_query($con, $select_pid);
    $row_pid = mysqli_fetch_assoc($result_pid);
    $product_id = $row_pid['id'];
    $query = "SELECT * FROM tblproductdetail WHERE cid = $color_id AND sid = $storage_id AND pid = $product_id";

    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $price = $row['price'];
            $stock = $row['stock'];
            $description = $row['description'];
            // echo $price . ',' . $stock;
            echo json_encode(array('price' => $price, 'stock' => $stock, 'description' => $description));
        }
    } else {
        // echo "No data found, No data found";
        echo json_encode(array('price' => 0, 'stock' => 0, 'description' => 'data not found'));
    }
}
