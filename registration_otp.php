<?php
// session_start();
require_once('includes/dbconnection.php');
require_once("mail_config.php");
require_once('preloader.php');
if (!isset($_SESSION['otp'])) {
    // header('location: registration.php');
    echo "<script>location.href='registration.php'</script>";
} else {
    $otp = $_SESSION['otp'];
}
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
                            <h4>OTP Verification</h4>
                            <form class="forms-sample" id="otp_form" method="POST">

                                <!-- User Name -->
                                <div class="form-group">
                                    <label for="userotp">OTP</label>
                                    <input type="text" class="form-control" id="userotp" name="userotp" placeholder="000000">
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="otpbtn" id="otpbtn" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Verify Now</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Doesn't get OTP? <a href="registration.php" class="text-primary">Try Again!</a>
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
        toastr.success("OTP has been sent to your Email Address!")
    </script>

    <script>
        // cancel button
        document.getElementById("close").onclick = function() {
            location.href = "omsms.php";
        };


        // Form Validate
        $('#otp_form').validate({
            rules: {
                'userotp': {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 6
                }
            },
            messages: {
                'userotp': {
                    required: "Please enter otp",
                    number: "Please enter valid otp",
                    minlength: "Please enter valid otp",
                    maxlength: "Please enter valid otp"
                }
            }
        })
    </script>
</body>

</html>

<?php
if (isset($_POST['otpbtn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $uerotp = $_POST['userotp'];
    // $otp = $_SESSION['otp'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $confpassword = $_SESSION['confpassword'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $city = $_SESSION['city'];
    $address = $_SESSION['address'];
    $gender = $_SESSION['gender'];
    $contact = $_SESSION['contact'];
    $role = "customer";

    // $email = $_POST['email'];
    // $name = $_POST['name'];
    // $password = $_POST['password'];
    // $confpassword = $_POST['confpassword'];
    // $encpass = password_hash($password, PASSWORD_BCRYPT);
    // $city = $_POST['city'];
    // $gender = $_POST['gender'];
    // $contact = $_POST['contact'];
    // $address = $_POST['address'];
    // $role = "customer";

    if ($uerotp == $otp) {
        // setting session variables
        // $_SESSION['name'] = $name;
        // $_SESSION['email'] = $email;
        // $_SESSION['password'] = $password;
        // $_SESSION['confpassword'] = $confpassword;
        // $_SESSION['city'] = $city;
        // $_SESSION['contact'] = $contact;
        // $_SESSION['gender'] = $gender;
        $register = "INSERT INTO tbluser (name, email, password, contact, gender, cityid, address, role, status) VALUES ('$name', '$email', '$encpass', '$contact', '$gender', $city, '$address', '$role', 1)";
        $result = mysqli_query($con, $register);
        if ($result) {
            echo "<script>alert('Registration Successful!')</script>";
            // fetching user id
            $uid_query = "SELECT id FROM tbluser WHERE email = '$email'";
            $uid_result = mysqli_query($con, $uid_query);
            $uid_row = mysqli_fetch_assoc($uid_result);
            $id = $uid_row['id'];
            session_destroy();

            // // inserting into tblcustomer
            // $customer = "INSERT INTO tblcustomer (uid) VALUES ('$id')";
            // $customer_result = mysqli_query($con, $customer);

            // checking if cart already exists
            // $cart_query = "SELECT * FROM tblcart WHERE uid = $id";
            // $cart_result = mysqli_query($con, $cart_query);
            // if (!mysqli_num_rows($cart_result) > 0) {
            //     // inserting into tblcart
            //     $cart = "INSERT INTO tblcart (uid) VALUES ($id)";
            //     $cart_result = mysqli_query($con, $cart);
            // }
            // echo "<script>location.href='login.php'</script>";
            echo "<script>toastr.success('Registration Successful!')</script>";
            echo "<script>setTimeout(\"location.href = 'login.php';\",2000);</script>";
        } else {
            echo "<script>toastr.error('Registration Failed! Try Again!')</script>";
        }
    } else {
        echo "<script> toastr.error('OTP not Matched!') </script>";
    }
}
?>