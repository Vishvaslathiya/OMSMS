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
                            <?php
                            if (isset($_GET['eid'])) {
                                $eid = $_GET['eid'];
                                $select = "SELECT * FROM tbluser WHERE id = '$eid'";
                                $select_result = mysqli_query($con, $select);

                                if (mysqli_num_rows($select_result) > 0) {
                                    $select_row = mysqli_fetch_assoc($select_result);
                                    $name = $select_row['name'];
                                    $email = $select_row['email'];
                                    $contact = $select_row['contact'];
                                    $gender = $select_row['gender'];
                                    $cid = $select_row['cityid'];
                                    $address = $select_row['address'];

                                    //  fetch state id
                                    $state = "SELECT sid FROM tblcity WHERE id = '$cid'";
                                    $state_result = mysqli_query($con, $state);
                                    $state_row = mysqli_fetch_assoc($state_result);
                                    $sid = $state_row['sid'];
                            ?>
                                    <h4 class="card-title">Edit User Form</h4>
                                    <form class="forms-sample" id="update_user_form" method="POST">

                                        <!-- User Name -->
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?php echo $name ?>">
                                        </div>

                                        <!-- User Email -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email ?>" disabled>
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="form-group">
                                            <label for="contact">Contact Number</label>
                                            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="<?php echo $contact ?>">
                                        </div>

                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <div class="d-flex flex-row">
                                                <?php
                                                if ($gender == "male") {
                                                ?>
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
                                                <?php
                                                } else if ($gender == "female") {
                                                ?>
                                                    <div class="form-check px-3">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="gender" id="gender" value="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check px-3">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="gender" id="gender" value="female" checked>
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="form-check px-3">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="gender" id="gender" value="other">
                                                            Other
                                                        </label>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="form-check px-3">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="gender" id="gender" value="male">
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
                                                            <input type="radio" class="form-check-input" name="gender" id="gender" value="other" checked>
                                                            Other
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
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
                                                            $state_id = $row_state['id'];
                                                            $state_name = $row_state['name'];
                                                            if ($state_id == $sid) {
                                                    ?>
                                                                <option value="<?php echo $row_state['id'] ?>" selected><?php echo $row_state['name'] ?></option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="<?php echo $row_state['id'] ?>"><?php echo $row_state['name'] ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- City -->
                                            <div class="form-group w-100 pl-3 ">
                                                <label for="city">City</label>
                                                <select class="form-control" id="city" name="city">
                                                    <option value="">Select City</option>
                                                    <?php
                                                    $city = "SELECT * FROM tblcity WHERE sid = '$sid'";
                                                    $city_result = mysqli_query($con, $city);
                                                    if (mysqli_num_rows($city_result) > 0) {
                                                        while ($city_row = mysqli_fetch_assoc($city_result)) {
                                                            $city_id = $city_row['id'];
                                                            $city_name = $city_row['name'];
                                                            if ($city_id == $cid) {
                                                    ?>
                                                                <option value="<?php echo $city_row['id'] ?>" selected><?php echo $city_row['name'] ?></option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="<?php echo $city_row['id'] ?>"><?php echo $city_row['name'] ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="4" placeholder="Address"><?php echo $address ?></textarea>
                                        </div>

                                        <!-- buttons -->
                                        <button type="submit" name="updateuser" id="updateuser" class="btn btn-primary mr-2">Update User</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                }
                            }
                            ?>
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
            location.href = "user_view.php";
        };

        // City Selection
        $("#state").change(function() {
            var stateId = $(this).val();
            if (stateId == "" || stateId == null) {
                $("#city").prop("disabled", true);
                $("#city").html("<option value=''>Select City</option>");
            }
            $.ajax({
                type: "POST",
                url: "user_edit.php",
                data: {
                    sid: stateId
                },
                success: function(response) {
                    $("#city").prop("disabled", false);
                    $("#city").html(response);
                },
            });
        });

        // Jquery Validation
        $("#update_user_form").validate({
            rules: {
                'name': {
                    required: true,
                },
                // 'email': {
                //     required: true,
                //     email: true,
                // },
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
                'address': {
                    required: true,
                },
            },
            messeges: {
                'name': {
                    required: "Please Enter Name",
                },
                // 'email': {
                //     required: "Please Enter Email",
                //     email: "Please Enter Valid Email",
                // },
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
                'address': {
                    required: "Please Enter Address",
                },
            }
        })
    </script>
</body>

</html>
<?php
// city selection
if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];
    $city = "SELECT * FROM tblcity WHERE sid = '$sid'";
    $city_result = mysqli_query($con, $city);
    if (mysqli_num_rows($city_result) > 0) {
        echo "<option value=''>-- Select City --</option>";
        while ($city_row = mysqli_fetch_assoc($city_result)) {
            $city_id = $city_row['id'];
            $city_name = $city_row['name'];
            echo "<option value='$city_id'>$city_name</option>";
        }
    } else {
        echo "<option value=''>-- Select State First --</option>";
    }
}

?>

<?php
// delete user
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $select = "SELECT * FROM tbluser WHERE id = '$id'";
    $select_result = mysqli_query($con, $select);

    if ($select_result->num_rows > 0) {
        $select_row = mysqli_fetch_assoc($select_result);
        $uid = $select_row['id'];
        $delete = "DELETE FROM tblcustomer WHERE uid = '$id'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            $delete = "DELETE FROM tbluser WHERE id = '$id'";
            $delete_result = mysqli_query($con, $delete);
            if ($delete_result) {
                // echo "<script>toastr.success('User Deleted Successfully'); location.href = 'ap_users.php';</script>";
                echo "<script>alert('User Deleted Successfully'); location.href = 'ap_users.php';</script>";
            } else {
                // echo "<script>toastr.error('Failed to Delete User');</script>";
                echo "<script>alert('Failed to Delete User');</script>";
            }
        } else {
            // echo "<script>toastr.error('Failed to Delete User');</script>";
            echo "<script>alert('Failed to Delete User');</script>";
        }
    }
}

// update user
if (isset($_POST['updateuser'])) {
    $name = $_POST['name'];
    // $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $update = "UPDATE tbluser SET name = '$name', contact = $contact, gender = '$gender', cityid = $city, address = '$address' WHERE id = $eid";
    $update_result = mysqli_query($con, $update);
    if ($update_result) {
        // $update = "UPDATE tblcustomer SET address = '$address' WHERE uid = '$eid'";
        // $update_result = mysqli_query($con, $update);
        // if ($update_result) {
        echo "<script>alert('Profile Updated Successfully'); location.href = 'user_view.php';</script>";
        // } else {
        //     echo "<script>alert('Failed to Update Profile');</script>";
        // }
    } else {
        echo "<script>alert('Failed to Update Profile');</script>";
    }
}
?>