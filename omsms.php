<?php
// include "includes/dbconnection.php";
// $conn = mysqli_connect("localhost", "root", "", "omsms");
// require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");
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
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include_once("includes/cust_navbar.php");
    ?>
    <div class="container-scroller">
        <?php
        if (isset($_SESSION['uid'])) {
        ?>
            <button type="button" class="btn btn-primary" id="logout">Signout</button>
        <?php
        } else {
        ?>
            <button type="button" class="btn btn-primary" id="login">Signin</button>
        <?php
        }
        ?>
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

    <script>
        $(document).ready(function() {
            // login button
            $("#login").click(function() {
                location.href = "login.php";
            });

            // logout button
            $("#logout").click(function() {
                let conf = confirm("Are you sure you want to logout?");
                if (conf) {
                    location.href = "logout.php";
                }
            });
        });
    </script>
</body>

</html>