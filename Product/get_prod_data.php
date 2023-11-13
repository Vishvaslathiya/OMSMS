<?php
// require 'include/connection.php';
$conn = mysqli_connect("localhost", "root", "", "project");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sid']) && isset($_POST['pid'])) {
    $sid = $_POST['sid'];
    $pid = $_POST['pid'];
    $select = "SELECT * FROM tblproductdetail WHERE sid = '$sid' AND pid = '$pid' AND stock > 0";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row['cid'];
            $select_color = "SELECT * FROM tblcolor WHERE id = '$cid'";
            $color_result = mysqli_query($conn, $select_color);
            if (mysqli_num_rows($color_result) > 0) {
                while ($color = mysqli_fetch_assoc($color_result)) {
?>
                    <input type="radio" name="color" id="color" data-pid="<?php echo $pid ?>" value="<?php echo $color['id'] ?>"><?php echo $color['name'] ?>
        <?php
                }
            }
        }
    } else {
        ?>
        <h3 text-lg font-bold>Sold Out</h3>
<?php
    }
}
?>

<?php

// get price
if (isset($_POST['colorid']) && isset($_POST['productid']) && isset($_POST['storageid'])) {
    $cid = $_POST['colorid'];
    $pid = $_POST['productid'];
    $sid = $_POST['storageid'];
    $select = "SELECT * FROM tblproductdetail WHERE cid = '$cid' AND pid = '$pid' AND sid = '$sid'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $description = $row['description'];
            echo json_encode(array('price' => $price, 'description' => $description));
        }
    } else {
        echo json_encode(array('price' => 'No data found', 'description' => 'No data found'));
    }
}
?>