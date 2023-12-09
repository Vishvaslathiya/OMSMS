<?php
// session_start();
require_once('includes/dbconnection.php');
require_once("mail_config.php");
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo d-flex justify-content-between">
                                <h3>Mobile Shop</h3>
                                <i class="ti-close" role="button" id="close"></i>
                            </div>
                            <h4>Change Passwod?</h4>
                            <h6 class="font-weight-light pb-3 ">For Better Security, You can take this Step!</h6>
                            <form class="forms-sample" id="change_password_form" method="POST">
                                <?php
                                $aid = $_SESSION['aid'];
                                $sql = "SELECT * FROM tbluser WHERE id='$aid'";
                                $query = mysqli_query($con, $sql);
                                $result = mysqli_fetch_assoc($query);
                                ?>
                                <!-- User Name -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['email'] ?>" placeholder="Email">
                                </div>

                                <!-- Old Password -->
                                <div class="form-group">
                                    <label for="oldpassword">Old Password</label>
                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">
                                </div>


                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="confpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirm Password">
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="change_password" id="change_password" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Save Password</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Doesn't Remember Password? <a href="forgot_password.php" class="text-primary">Forgot Password</a>
                                </div>
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
        // toastr.success("OTP has been sent to your Email Address!")
    </script>

    <script>
        // cancel button
        document.getElementById("close").onclick = function() {
            location.href = "index.php";
        };

        // Form Validate
        $('#change_password_form').validate({
            rules: {
                'email': {
                    required: true,
                    email: true,
                },
                'oldpassword': {
                    required: true,
                },
                'password': {
                    required: true,
                },
                'confpassword': {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                'email': {
                    required: "Please Enter Email",
                    email: "Please Enter Valid Email",
                },
                'oldpassword': {
                    required: "Please Enter Old Password"
                },
                'password': {
                    required: "Please Enter Password"
                },
                'confpassword': {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password and Confirm Password must be same"
                },
            }
        })
    </script>
</body>

</html>

<?php
if (isset($_POST['change_password'])) {
    $email = $_POST['email'];
    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    $emailquery = "select * from tbluser where email='$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount) {
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        if (password_verify($oldpassword, $db_pass)) {
            if ($password == $confpassword) {
                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $updatequery = "update tbluser set password='$encpass' where email='$email'";
                $iquery = mysqli_query($con, $updatequery);

                if ($iquery) {
                    echo "<script>toastr.success('Password Changed Successfully!')</script>";
                    echo "<script>setTimeout(\"location.href = 'login.php';\",2000);</script>";
                } else {
                    echo "<script>toastr.error('Password Not Changed!')</script>";
                }
            } else {
                echo "<script>toastr.error('Password and Confirm Password must be same!')</script>";
            }
        } else {
            echo "<script>toastr.error('Old Password is Incorrect!')</script>";
        }
    } else {
        echo "<script>toastr.error('Email is Incorrect!')</script>";
    }
}
?>