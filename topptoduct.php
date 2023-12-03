<?php
include("includes/dbconnection.php");

$result = mysqli_query($con, "SELECT tblprd.prdName, tblprd.prdPrice, MAX(tblorderaddresses.OrderTime) AS LastOrderedDate, SUM(tblorders.PrdQty) AS TotalOrderedQty FROM tblorders JOIN tblprd ON tblorders.PrdId = tblprd.ID JOIN tblorderaddresses ON tblorders.OrderNumber = tblorderaddresses.Ordernumber GROUP BY tblprd.prdName ORDER BY TotalOrderedQty DESC LIMIT 7; ");

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Product Name: " . $row["prdName"]. " - Price: " . $row["prdPrice"]. " - Last Ordered Date: " . $row["LastOrderedDate"]. " - Total Ordered Quantity: " . $row["TotalOrderedQty"]. "<br>";
        }
    } else {
        echo "No results found";
    }
} else {
    // Handle query error
    echo "Error executing the query: " . mysqli_error($con);
}

mysqli_close($con);
?>
