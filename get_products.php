<?php
// Include your database connection code here
// $con = mysqli_connect("your_host", "your_user", "your_password", "your_database");

if (isset($_GET['category'])) {
  $category = mysqli_real_escape_string($con, $_GET['category']);

  // Fetch products for the selected category
  $query = "SELECT prdName FROM `tblprd` WHERE `CategoryName` = '$category' ORDER BY `tblprd`.`prdName` ASC";
  $result = mysqli_query($con, $query);

  // Return products as JSON
  $products = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
  }

  echo json_encode($products);
} else {
  echo "Invalid request!";
}
?>
