<?php
try 
{
    $rtype = $_POST['requesttype'];
    if ($rtype == "Bar Chart") {



        $con = mysqli_connect("localhost", "root", "", "omsms");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data for the chart
        $dataPoints = array();
        $res = mysqli_query($con, "SELECT MONTHNAME(tblorderaddresses.OrderTime) AS month_name, COALESCE(COUNT(tblorderaddresses.ordernumber), 0) AS total_orders
                            FROM tblorderaddresses
                            LEFT JOIN tblorders ON tblorders.ordernumber = tblorderaddresses.ordernumber
                            WHERE tblorderaddresses.Orderfinalstatus = 'Product Delivered'
                                AND (tblorders.ordernumber IS NOT NULL OR tblorderaddresses.ordernumber IS NOT NULL)   
                            GROUP BY MONTH(tblorderaddresses.OrderTime)");

        // Define all months
        $allMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        // Initialize data points for all months
        foreach ($allMonths as $month) {
            $dataPoints[] = array("y" => 0, "label" => $month);
        }

        // Update data points with actual counts
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $index = array_search($row['month_name'], $allMonths);
                if ($index !== false) {
                    $dataPoints[$index]["y"] = $row['total_orders'];
                }
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>
        <!DOCTYPE HTML>
        <html>

        <head>
            <title>OMSMS</title>
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

            <script>
                window.onload = function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: "Monthly Orders"
                        },
                        axisY: {
                            title: "Number of Orders"
                        },
                        axisX: {
                            title: "Month",
                            interval: 1
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#,##0.##",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });

                    chart.render();
                }
            </script>


        </head>

        <body>
            <?php
            include('includes/Navbar.php');
            ?>

            <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <div class="container-fluid page-body-wrapper">
                    <?php
                    include('includes/sidebar.php');
                    ?>
                    <div class="main-panel">
                        <div class="content-wrapper">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>

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
    <?php } elseif ($rtype == "Line Chart") {
        $con = mysqli_connect("localhost", "root", "", "omsms");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data for the chart
        $dataPoints = array();
        $res = mysqli_query($con, "SELECT MONTHNAME(tblorderaddresses.OrderTime) AS month_name, COALESCE(COUNT(tblorderaddresses.ordernumber), 0) AS total_orders
                            FROM tblorderaddresses
                            LEFT JOIN tblorders ON tblorders.ordernumber = tblorderaddresses.ordernumber
                            WHERE tblorderaddresses.Orderfinalstatus = 'Product Delivered'
                                AND (tblorders.ordernumber IS NOT NULL OR tblorderaddresses.ordernumber IS NOT NULL)   
                            GROUP BY MONTH(tblorderaddresses.OrderTime)");

        // Define all months
        $allMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        // Initialize data points for all months
        foreach ($allMonths as $month) {
            $dataPoints[] = array("y" => 0, "label" => $month);
        }

        // Update data points with actual counts
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $index = array_search($row['month_name'], $allMonths);
                if ($index !== false) {
                    $dataPoints[$index]["y"] = $row['total_orders'];
                }
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>


        <!DOCTYPE HTML>
        <html>

        <head>
            <title>OMSMS</title>
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
            <script>
                window.onload = function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: "Monthly Orders"
                        },
                        axisY: {
                            title: "Number of Orders"
                        },
                        axisX: {
                            title: "Month",
                            interval: 1
                        },
                        data: [{
                            type: "line",
                            yValueFormatString: "#,##0.##",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });

                    chart.render();
                }
            </script>
        </head>

        <body>
            <?php
            include('includes/Navbar.php');
            ?>

            <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <div class="container-fluid page-body-wrapper">
                    <?php
                    include('includes/sidebar.php');
                    ?>
                    <div class="main-panel">
                        <div class="content-wrapper">
                            <div id="chartContainer" style="height: 370px; width: 100%; "></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>

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
        <?php
    } elseif ($rtype == "Pie Chart") {
        $con = mysqli_connect("localhost", "root", "", "omsms");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data for the chart
        $dataPoints = array();
        $res = mysqli_query($con, "SELECT MONTHNAME(tblorderaddresses.OrderTime) AS month_name, COALESCE(COUNT(tblorderaddresses.ordernumber), 0) AS total_orders
                                FROM tblorderaddresses
                                LEFT JOIN tblorders ON tblorders.ordernumber = tblorderaddresses.ordernumber
                                WHERE tblorderaddresses.Orderfinalstatus = 'Product Delivered'
                                    AND (tblorders.ordernumber IS NOT NULL OR tblorderaddresses.ordernumber IS NOT NULL)   
                                GROUP BY MONTH(tblorderaddresses.OrderTime)");

        // Define all months
        $allMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        // Initialize data points for all months
        foreach ($allMonths as $month) {
            $dataPoints[] = array("y" => 0, "label" => $month);
        }

        // Update data points with actual counts
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $index = array_search($row['month_name'], $allMonths);
                if ($index !== false) {
                    $dataPoints[$index]["y"] = $row['total_orders'];
                }
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>


        <!DOCTYPE HTML>
        <html>

        <head>
            <title>OMSMS</title>
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
            <script>
                window.onload = function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: "Monthly Orders"
                        },
                        axisY: {
                            title: "Number of Orders"
                        },
                        axisX: {
                            title: "Month",
                            interval: 1
                        },
                        data: [{
                            type: "pie",
                            yValueFormatString: "#,##0.##",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });

                    chart.render();
                }
            </script>
        </head>

        <body>
            <?php
            include('includes/Navbar.php');
            ?>

            <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <div class="container-fluid page-body-wrapper">
                    <?php
                    include('includes/sidebar.php');
                    ?>
                    <div class="main-panel">
                        <div class="content-wrapper">
                            <div id="chartContainer" style="height: 370px; width: 100%; "></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>

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
        <?php
    } elseif ($rtype == "on-off Chart") {
        $con = mysqli_connect("localhost", "root", "", "omsms");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data for the chart
        // $dataPoints = array();
        // $res = mysqli_query($con, "SELECT MONTHNAME(tblorderaddresses.OrderTime) AS month_name, COALESCE(COUNT(tblorderaddresses.ordernumber), 0) AS total_orders
        //                                 FROM tblorderaddresses
        //                                 LEFT JOIN tblorders ON tblorders.ordernumber = tblorderaddresses.ordernumber
        //                                 WHERE tblorderaddresses.Orderfinalstatus = 'Product Delivered'
        //                                     AND (tblorders.ordernumber IS NOT NULL OR tblorderaddresses.ordernumber IS NOT NULL)   
        //                                 GROUP BY MONTH(tblorderaddresses.OrderTime)");

        // // Define all months
        // $allMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        // // Initialize data points for all months
        // foreach ($allMonths as $month) {
        //     $dataPoints[] = array("y" => 0, "label" => $month);
        // }

        // // Update data points with actual counts
        // if ($res) {
        //     while ($row = mysqli_fetch_assoc($res)) {
        //         $index = array_search($row['month_name'], $allMonths);
        //         if ($index !== false) {
        //             $dataPoints[$index]["y"] = $row['total_orders'];
        //         }
        //     }
        // } else {
        //     echo "Error: " . mysqli_error($con);
        // }

        // mysqli_close($con);

        $dataPoints1 = array(
            array("label" => "2010", "y" => 36.12),
            array("label" => "2011", "y" => 34.87),
            array("label" => "2012", "y" => 40.30),
            array("label" => "2013", "y" => 35.30),
            array("label" => "2014", "y" => 39.50),
            array("label" => "2015", "y" => 50.82),
            array("label" => "2016", "y" => 74.70)
        );
        $dataPoints2 = array(
            array("label" => "2010", "y" => 64.61),
            array("label" => "2011", "y" => 70.55),
            array("label" => "2012", "y" => 72.50),
            array("label" => "2013", "y" => 81.30),
            array("label" => "2014", "y" => 63.60),
            array("label" => "2015", "y" => 69.38),
            array("label" => "2016", "y" => 98.70)
        );

        ?>


        <!DOCTYPE HTML>
        <html>

        <head>
            <title>OMSMS</title>
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
            <script>
                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
                        },
                        axisY: {
                            includeZero: true
                        },
                        legend: {
                            cursor: "pointer",
                            verticalAlign: "center",
                            horizontalAlign: "right",
                            itemclick: toggleDataSeries
                        },
                        data: [{
                            type: "column",
                            name: "Real Trees",
                            indexLabel: "{y}",
                            yValueFormatString: "$#0.##",
                            showInLegend: true,
                            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                        }, {
                            type: "column",
                            name: "Artificial Trees",
                            indexLabel: "{y}",
                            yValueFormatString: "$#0.##",
                            showInLegend: true,
                            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                    function toggleDataSeries(e) {
                        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        }
                        else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }

                }
            </script>
        </head>

        <body>
            <?php
            include('includes/Navbar.php');
            ?>

            <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <div class="container-fluid page-body-wrapper">
                    <?php
                    include('includes/sidebar.php');
                    ?>
                    <div class="main-panel">
                        <div class="content-wrapper">
                            <div id="chartContainer" style="height: 370px; width: 100%; "></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>

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
        <?php
    }
}
catch(Exception $e)
{
    echo 'Something Went Wrong';
}
?>