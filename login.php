<?php
// session_start();
require_once('includes/dbconnection.php');
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
                            <h4>Already have Account?</h4>
                            <h6 class="font-weight-light pb-3 ">Signing here to access more functionality</h6>
                            <form class="forms-sample" id="login_form" method="POST">

                                <!-- User Name -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="login" id="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Doesn't Remember Password? <a href="forgot_password.php" class="text-primary">Forgot Password</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Doesn't have Account? <a href="registration.php" class="text-primary">Signup</a>
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
            location.href = "omsms.php";
        };

        // Form Validate
        $('#login_form').validate({
            rules: {
                'email': {
                    required: true,
                    email: true,
                },
                'password': {
                    required: true,
                }
            },
            messages: {
                'email': {
                    required: "Please Enter Email",
                    email: "Please Enter Valid Email",
                },
                'password': {
                    required: "Please Enter Password"
                },
            }
        })
    </script>
</body>

</html>

<?php
// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // password decryption
    $fetch = "SELECT * FROM tbluser WHERE email = '$email'";
    $result = mysqli_query($con, $fetch);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $uid = $row['id'];
        $encpass = password_verify($password, $row['password']);
        $role = $row['role'];
        $status = $row['status'];

        if ($row['email'] == $email && $row['password'] == $encpass && $row['role'] == $role) {
            if ($status == 0) {
                echo "<script>toastr.error('You can not Login, Your Account is Blocked!')</script>";
            } else {
                if ($role == "admin") {
                    $_SESSION['admin_email'] = $email;
                    $_SESSION['aid'] = $uid;
                    echo "<script> alert('Login Success!'); location.href = 'index.php'</script>";
                } else {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['uid'] = $uid;
                    echo "<script> location.href = 'omsms.php'</script>";
                }
            }
        } else {
            echo "<script> toastr.error('Oops! Invalid Credentials!')</script>";
        }
    } else {
        echo "<script>toastr.error('Email not Found! Please create free Account!')</script>";
    }
}
?>