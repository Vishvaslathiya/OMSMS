<?php
session_start();

// require_once('includes/dbconnection.php');
// require_once('preloader.php');

$con = mysqli_connect("localhost", "root", "", "OMSMS");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
}
