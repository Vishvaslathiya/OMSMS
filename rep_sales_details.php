<?php

include('includes/dbconnection.php');
$ftotal = 0;
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
                                <!-- <h4 class="card-title">Confiremd Orders</h4> -->
                                <?php
                                $fdate = $_POST['fromdate'];
                                $tdate = $_POST['todate'];
                                $rtype = $_POST['requesttype'];

                                ?>

                                <?php if ($rtype == 'mtwise') {
                                    $month1 = strtotime($fdate);
                                    $month2 = strtotime($tdate);
                                    $m1 = date("F", $month1);
                                    $m2 = date("F", $month2);
                                    $y1 = date("Y", $month1);
                                    $y2 = date("Y", $month2);
                                    ?>
                                    <h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
                                    <h4 align="center" style="color:blue">Sales Report from
                                        <?php echo $m1 . "-" . $y1; ?> to
                                        <?php echo $m2 . "-" . $y2; ?>
                                    </h4>
                                    <hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Month / Year </th>
                                                <th>Sales</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $fstatus = 'Product Delivered';
                                        $ret = mysqli_query($con, "select month(OrderTime) as lmonth,year(OrderTime) as lyear, sum(PrdPrice*tblorders.PrdQty) as totalitmprice from tblorders  join tblorderaddresses on 1=1  join tblprd  on tblprd.ID=tblorders.PrdId  where date(tblorderaddresses.OrderTime) between '$fdate' and '$tdate'  and tblorderaddresses.OrderFinalStatus='$fstatus'  group by lmonth,lyear");
                                        // $ret = mysqli_query($con, "select month(OrderTime) as lmonth,year(OrderTime) as lyear, sum(PrdPrice*tblorders.PrdQty) as totalitmprice from tblorders  join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber  join tblprd  on tblprd.ID=tblorders.PrdId  where  date(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.OrderFinalStatus='Product Delivered'  group by lmonth,lyear ");
                                        $cnt = 1;
                                        // if ($ret) {
                                        //     echo "Query Success";
                                        // } else {

                                        //     echo "Query failed";
                                        // }

                                        while ($row = mysqli_fetch_array($ret)) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['lmonth'] . "/" . $row['lyear']; ?>
                                                    <!-- 12/22 -->
                                                </td>
                                                <td>
                                                    <!-- 2200 -->
                                                    <?php echo $total = $row['totalitmprice']; ?>
                                                </td>

                                            </tr>
                                            <?php
                                            $ftotal += $total;
                                            $cnt++;
                                        } ?>

                                        <tr>
                                            <td colspan="2" align="center">Total </td>
                                            <td>
                                                <?php echo $ftotal; ?>
                                            </td>



                                        </tr>

                                    </table>
                                <?php } else {
                                    $year1 = strtotime($fdate);
                                    $year2 = strtotime($tdate);
                                    $y1 = date("Y", $year1);
                                    $y2 = date("Y", $year2);
                                    $fstatus = 'Product Delivered';
                                    ?>
                                    <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
                                    <h4 align="center" style="color:blue">Sales Report from
                                        <?php echo $y1; ?> to
                                        <?php echo $y2; ?>
                                    </h4>
                                    <hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th> Year </th>
                                                <th>Sales</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        // $ret = mysqli_query($con, "select year(OrderTime) as lyear,sum(PrdPrice*tblorders.PrdQty) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblprd on tblprd.ID=tblorders.PrdId where year(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.OrderFinalStatus='$fstatus' group by lyear");
                                        $ret = mysqli_query($con, "select year(OrderTime) as lyear,sum(PrdPrice*tblorders.PrdQty) as totalitmprice from tblorders join tblorderaddresses on 1=1  join tblprd on tblprd.ID=tblorders.PrdId where year(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.OrderFinalStatus='$fstatus' group by lyear");
                                        // $ret = mysqli_query($con, "SELECT YEAR(tblorderaddresses.OrderTime) AS lyear,SUM(100 * tblorders.PrdQty) AS totalitmprice FROM tblorders JOIN tblorderaddresses ON tblorderaddresses.Ordernumber = tblorders.OrderNumber JOIN tblprd ON tblprd.ID = tblorders.PrdId WHERE YEAR(tblorderaddresses.OrderTime) BETWEEN '$fdate' AND '$tdate' AND tblorderaddresses.OrderFinalStatus = '$fstatus' GROUP BY lyear");

                                        $cnt = 1;
                                        // if ($ret) {
                                        //     echo "Query Success";
                                        // } else {

                                        //     echo "Query failed";
                                        // }

                                        while ($row = mysqli_fetch_array($ret)) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>

                                                    <?php echo $row['lyear']; ?>
                                                    <!-- 12/22 -->
                                                </td>
                                                <td>
                                                    <!-- 2200 -->
                                                    <?php echo $total = $row['totalitmprice']; 
                                                     
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php
                                            $ftotal += $total;
                                            $cnt++;
                                        } ?>

                                        <tr>
                                            <td colspan="2" align="center">Total </td>
                                            <td>
                                                <?php echo $ftotal; ?>
                                            </td>



                                        </tr>

                                    </table>
                                <?php } ?>

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