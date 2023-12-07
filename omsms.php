<?php
// include "includes/dbconnection.php";
// $conn = mysqli_connect("localhost", "root", "", "omsms");
$current_page = 'omsms.php';
require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- flowbite css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include_once("cust_navbar.php");
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
    <!-- flowbite js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    
</body>

</html>
<?php
require_once 'cust_footer.php';
?>