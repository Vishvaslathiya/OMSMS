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
                                <h4 class="card-title">Cancelled Orders</h4>

                                <div class="table-responsive pt-3">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Order Number
                                                </th>
                                                <th>
                                                    Customer name
                                                </th>
                                                <th>
                                                    Order Date
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $con = mysqli_connect("localhost", "root", "", "omsms");
                                            $ret = mysqli_query($con, "select * from tblorderaddresses where OrderFinalStatus='Order Cancelled'");
                                            $user = mysqli_query($con, "select * from tblcustomer join tblorderaddresses on tblcustomer.ID=tblorderaddresses.UserId where tblorderaddresses.UserId=tblcustomer.ID ");
                                            // select * from tblorderaddresses join tblcustomer on tblcustomer.ID=tblorderaddresses.UserId where tblorderaddresses.Ordernumber=$oid
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret) and $row1 = mysqli_fetch_array($user)) {

                                                ?>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <?php echo $cnt; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Ordernumber']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row1['name']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['OrderTime']; ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="view_order_details.php?orderid=<?php echo $row['Ordernumber']; ?>">
                                                            <input type="submit" name="viewdtls" value="View Details"
                                                                style="width: 120px; " class="btn btn-info"></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                            } ?>

                                        </tbody>
                                    </table>
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