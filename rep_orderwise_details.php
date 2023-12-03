<?php
include("includes/dbconnection.php");
$ftotal = 0;
$ttlny = 0;
$fntotal = 0;
$fctotal = 0;
$fatotl = 0;
$fintotal = 0;
$faritotal = 0;
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
                                <div class="table-responsive pt-3">


                                    <h4 class="header-title m-t-0 m-b-30">Report Counts</h4>
                                    <?php
                                    $fdate = $_POST['fromdate'];
                                    $tdate = $_POST['todate'];
                                    ?>
                                    <h5 align="center" style="color:blue">Order Count Report from
                                        <?php echo $fdate ?> to
                                        <?php echo $tdate ?>
                                    </h5>
                                    <hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Total Order</th>
                                                <th>Total Order not confirmed</th>
                                                <th>Total Order Confirmed</th>
                                                <th>Total Order Cancelled</th>
                                                <th>Total Product not Available Orders</th>
                                                <th>Total Order Pickup</th>
                                                <th>Total Delivered</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select month(OrderTime) as lmonth,year(OrderTime) as lyear,
                                    count(ID) as totalcount,count(if((OrderFinalStatus='' || OrderFinalStatus is null),0,null)) as uncofirmedorder,
    count(if(OrderFinalStatus='Order Confirmed',0,null)) as confirmedorder,
    count(if(OrderFinalStatus='Product not Available',0,null)) as prdnav,
    count(if(OrderFinalStatus='Product Pickup',0,null)) as Productpickup,
    count(if(OrderFinalStatus='Product Delivered',0,null)) as Productdel,
    count(if(OrderFinalStatus='Order Cancelled',0,null)) as odrcancel 
    from tblorderaddresses where date(OrderTime) between '$fdate' and '$tdate' group by lmonth,lyear");
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <td>
                                                    <?php echo $row['lmonth'] . "/" . $row['lyear']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $total = $row['totalcount']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $npytotal = $row['uncofirmedorder']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ntotal = $row['confirmedorder']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $tctotal = $row['odrcancel']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $atotl = $row['prdnav']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $intotal = $row['Productpickup']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $aritotal = $row['Productdel']; ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $ftotal += $total;
                                            $ttlny += $npytotal;
                                            $fntotal += $ntotal;
                                            $fctotal += $tctotal;
                                            $fatotl += $atotl;
                                            $fintotal += $intotal;
                                            $faritotal += $aritotal;
                                        } ?>

                                        <tr>
                                            <td>Total </td>
                                            <td>
                                                <?php echo $ftotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $ttlny; ?>
                                            </td>
                                            <td>
                                                <?php echo $fntotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $fctotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $fatotl; ?>
                                            </td>
                                            <td>
                                                <?php echo $fintotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $faritotal; ?>
                                            </td>


                                        </tr>

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