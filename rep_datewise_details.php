<?php
include "includes/dbconnection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <div class="container-fluid page-body-wrapper">
            <?php
            include_once("includes/Navbar.php");
            include_once("includes/sidebar.php");
            ?>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $fromdate = $_POST['fromdate'];
                                $todate = $_POST['todate'];
                                $request_type = $_POST['requesttype'];
                                ?>

                                <h4 class="card-title">Orders between
                                    <?php echo "$fromdate"; ?> and
                                    <?php echo "$todate"; ?>
                                    <?php echo "$request_type"; ?>
                                </h4>

                                <div class="table-responsive pt-3">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Order Number</th>
                                                <th>Order Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <!-- Not Confirmed Orders -->
                                        <?php

                                        if ($request_type == "all") {

                                            $result = mysqli_query($con, "select * from tblorderaddresses where Ordertime between '$fromdate' and '$todate' ");
                                            $count = 1;

                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['Ordernumber'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['OrderTime'];
                                                            ?>
                                                        </td>
                                                        <td><a
                                                                href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                Details</a>
                                                    </tr>
                                                    <?php
                                                    $count = $count + 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    <?php } 
                                    // Not Confirmed
            
                                    if ($request_type == '') {
                                        $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus is null  && Ordertime between '$fromdate' and '$todate' ");
                                            $count = 1;

                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['Ordernumber'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['OrderTime'];
                                                            ?>
                                                        </td>
                                                        <td><a
                                                                href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                Details</a>
                                                    </tr>
                                                    <?php
                                                    $count = $count + 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php }
                                        //  Canclled Order

                                        
                                    if ($request_type == 'Canclled Order') {
                                       
                                        $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Order Cancelled' && Ordertime between '$fromdate' and '$todate' ");
                                            $count = 1;

                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tbody>
                                                   
                                                    
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['Ordernumber'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['OrderTime'];
                                                            ?>
                                                        </td>
                                                        <td><a
                                                                href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                Details</a>
                                                    </tr>
                                                    <?php
                                                    $count = $count + 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php }
                                        
                                        
                                    if ($request_type == 'Confirmed Order') {
                                        $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Order Confirmed' && Ordertime between '$fromdate' and '$todate' ");
                                            $count = 1;

                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['Ordernumber'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['OrderTime'];
                                                            ?>
                                                        </td>
                                                        <td><a
                                                                href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                Details</a>
                                                    </tr>
                                                    <?php
                                                    $count = $count + 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        
                                        <?php }
                                        
                                        
                                    if ($request_type == 'Pickup') {
                                        $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Product Pickup' && Ordertime between '$fromdate' and '$todate' ");
                                            $count = 1;

                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['Ordernumber'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['OrderTime'];
                                                            ?>
                                                        </td>
                                                        <td><a
                                                                href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                Details</a>
                                                    </tr>
                                                    <?php
                                                    $count = $count + 1;
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                        
                                        <?php } 
                                        
                                        
                                        if ($request_type == 'Delivered') {
                                            $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Product Delivered' && Ordertime between '$fromdate' and '$todate' ");
                                                $count = 1;
    
                                                while ($row = mysqli_fetch_array($result)) {
    
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $count;
                                                                ?>
                                                            </td>
    
                                                            <td>
                                                                <?php echo $row['Ordernumber'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['OrderTime'];
                                                                ?>
                                                            </td>
                                                            <td><a
                                                                    href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                    Details</a>
                                                        </tr>
                                                        <?php
                                                        $count = $count + 1;
                                                }
                                                ?>
    
                                                </tbody>
                                            </table>
                                            
                                            <?php } 
                                        
                                        
                                        if ($request_type == 'Product Not Available') {
                                            $result = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Product Not Available' && Ordertime between '$fromdate' and '$todate' ");
                                                $count = 1;
    
                                                while ($row = mysqli_fetch_array($result)) {
    
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $count;
                                                                ?>
                                                            </td>
    
                                                            <td>
                                                                <?php echo $row['Ordernumber'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['OrderTime'];
                                                                ?>
                                                            </td>
                                                            <td><a
                                                                    href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">View
                                                                    Details</a>
                                                        </tr>
                                                        <?php
                                                        $count = $count + 1;
                                                }
                                                ?>
    
                                                </tbody>
                                            </table>
                                            
                                            <?php }
                                            ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="vendors/js/vendor.bundle.base.js"></script>

    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
</body>

</html>
</body>

</html>