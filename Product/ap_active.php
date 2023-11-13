<?php
require 'include/connection.php';

// Inactive Product
if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $sql = "UPDATE tblproduct SET status = 0 WHERE id = $aid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "<script> alert('Product is now Inactive'); </script>";
        echo "<script>toastr.success('Product is now Inactive')</script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    }
}

// Active Product
if (isset($_GET['iaid'])) {
    $iaid = $_GET['iaid'];
    $sql = "UPDATE tblproduct SET status = 1 WHERE id = $iaid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "<script> alert('Product is now Active'); </script>";
        echo "<script>toastr.success('Product is now Active')</script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    }
}

// Inactive User

