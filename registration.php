<?php
// session_start();
require_once('includes/dbconnection.php');
include_once("mail_config.php");
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo d-flex justify-content-between">
                                <h3>Mobile Shop</h3>
                                <i class="ti-close" role="button" id="close"></i>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light pb-3 ">Signing up is easy. It only takes a few steps</h6>
                            <form class="forms-sample" id="registration_form" method="POST" enctype="multipart/form-data">

                                <!-- User Name -->
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                </div>

                                <!-- User Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                                <!-- Contact Number -->
                                <div class="form-group">
                                    <label for="contact">Contact Number</label>
                                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="confpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Conferm Password">
                                </div>

                                <!-- Gender -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="d-flex flex-row">
                                        <div class="form-check px-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="gender" value="male" checked>
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check px-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="gender" value="female">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check px-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="gender" value="other">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- State and City -->
                                <div class="d-flex justify-content-between">
                                    <!-- State -->
                                    <div class="form-group w-100 pr-3">
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
                                    <div class="form-group w-100 pl-3 ">
                                        <label for="city">City</label>
                                        <select class="form-control" id="city" name="city" disabled>
                                            <option value="">Select State First</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="4" placeholder="Address"></textarea>
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="register" id="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign Up</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="login.html" class="text-primary">Login</a>
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
        // toastr.success("Success.....!")
    </script>

    <script>
        // cancel button
        document.getElementById("cancel").onclick = function() {
            location.href = "#";
        };
        // City Selection
        $("#state").change(function() {
            var stateId = $(this).val();
            // console.log(stateId);
            if (stateId === "") {
                $("#city").html("<option value=''>Select State First</option>");
                $("#city").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "registration.php",
                    data: {
                        sid: stateId
                    },
                    success: function(response) {
                        $("#city").prop("disabled", false);
                        $("#city").html(response);
                    },
                });
            }
        });

        // Form Validation
        $("#registration_form").validate({
            rules: {
                'role': {
                    required: true,
                },
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                },
                'password': {
                    required: true,
                },
                'confpassword': {
                    required: true,
                    equalTo: "#password",
                },
                'contact': {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                'gender': {
                    required: true,
                },
                'state': {
                    required: true,
                },
                'city': {
                    required: true,
                },
            },
            messeges: {
                'role': {
                    required: "Please Select Role",
                },
                'name': {
                    required: "Please Enter Name",
                },
                'email': {
                    required: "Please Enter Email",
                },
                'password': {
                    required: "Please Enter Password",
                },
                'confpassword': {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password not match",
                },
                'contact': {
                    required: "Please Enter Contact Number",
                    number: "Please Enter Valid Contact Number",
                    minlength: "Please Enter 10 Digit Contact Number",
                    maxlength: "Please Enter 10 Digit Contact Number",
                },
                'gender': {
                    required: "Please Select Geneder",
                },
                'state': {
                    required: "Please Select State",
                },
                'city': {
                    required: "Please Select City",
                },
            }
        })
    </script>
</body>

</html>

<?php
// City Selection
if (isset($_POST['sid'])) {
    $stateId = $_POST['sid'];
    $sql = "SELECT * FROM tblcity WHERE sid = $stateId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value=''>-- Select a City --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Cities Found --</option>";
    }
}
?>

<?php
// Customer side Registration
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $check_email = "SELECT * FROM tbluser WHERE email = '$email'";
    $result_email = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result_email) > 0) {
        echo "<script>toastr.error('Email already Exist..!')</script>";
        return false;
    } else {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        // $encpass = password_hash($password, PASSWORD_DEFAULT);
        $city = $_POST['city'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $role = "customer";

        // Setting Session Variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['confpassword'] = $confpassword;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        $_SESSION['contact'] = $contact;
        $_SESSION['gender'] = $gender;

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        // Send the OTP to the user's email
        $subject = "Your Login Code";
        $message = "<h2>Your OTP for Registration is: $otp</h2>";

        $mail->addAddress("$email");
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = " Hello  there, $message";
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        echo "<script>toastr.success('OTP Sent Successfully on $email.....!')</script>";
        echo "<script>location.href='registration_otp.php'</script>";
    }
}
?>