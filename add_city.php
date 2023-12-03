<?php
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

    <!-- error -->
    <style>
        .error {
            color: red;
        }
    </style>
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
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add City Form</h4>
                            <form class="forms-sample" id="city_form" method="POST" enctype="multipart/form-data">

                                <!-- State -->
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-control" id="state" name="state">
                                        <option value="">Select State</option>
                                        <?php
                                        $state = "SELECT * FROM tblstate";
                                        $state_result = mysqli_query($con, $state);
                                        if (mysqli_num_rows($state_result) > 0) {
                                            while ($row_state = mysqli_fetch_assoc($state_result)) {
                                        ?>
                                                <option value="<?php echo $row_state['id'] ?>"><?php echo $row_state['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- City -->
                                <div class="form-group">
                                    <label for="city">City Name</label>
                                    <input type="text" class="form-control" id="city_name" name="city_name" placeholder="City Name">
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="addcity" id="addcity" class="btn btn-primary mr-2">Add City</button>
                                <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                            </form>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        toastr.options = {
            "positionClass": "toast-top-center",
            "timeOut": 2000, // 2 seconds
            "extendedTimeOut": 1000, // 1 second extended time on hover
            "closeButton": true,
            "progressBar": true,
            "debug": false,
            "showDuration": 300,
            "hideDuration": 1000,
        };
        // toastr.success("Success.....!")
    </script>

    <script>
        // cancel button
        document.getElementById("cancel").onclick = function() {
            location.href = "other_details.php";
        };

        // Form Validate
        $('#city_form').validate({
            rules: {
                'state': {
                    required: true,
                    number: true,
                },
                'city_name': {
                    required: true,
                    number: false,
                },
            },
            messages: {
                'state': {
                    required: "Please Select State",
                    number: "Please Select Valid State",
                },
                'city_name': {
                    required: "Please Enter city Name",
                    number: "Please Enter Valid city Name",
                },
            }
        })
    </script>
</body>

</html>

<?php
if (isset($_POST['addcity'])) {
    $city_name = $_POST['city_name'];
    $state = $_POST['state'];

    $cid = "SELECT id FROM tblcity WHERE name = '$city_name'";
    $cid_result = mysqli_query($con, $cid);
    if (mysqli_num_rows($cid_result) > 0) {
        echo "<script>toastr.error('city Already Exists!')</script>";
    } else {
        $insert_city = "INSERT INTO tblcity (name, sid) VALUES ('$city_name', '$state')";
        $insert_city_result = mysqli_query($con, $insert_city);

        if ($insert_city_result) {
            echo "<script>alert('city Added Successfully!'); location.href='other_details.php'</script>";
        } else {
            echo "<script>toastr.error('Something went Wrong!')</script>";
        }
    }
}

?>