<?php
// delete_product.php

 include_once("includes/dbconnection.php");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the product ID from the AJAX request
$productId = isset($_POST['productId']) ? $_POST['productId'] : '';

// Validate and sanitize the product ID
$productId = mysqli_real_escape_string($con, $productId);

// Perform the deletion query
$query = "DELETE FROM tblorder WHERE PrdId = '$productId'";

if (mysqli_query($con, $query)) {
    echo "Product deleted successfully";
} else {
    echo "Error deleting product: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
