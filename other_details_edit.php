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
                            // edit brand
                            if (isset($_GET['beid'])) {
                                $id = $_GET['beid'];
                                $select = "SELECT * FROM tblbrand WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit Brand Form</h4>
                                    <form class="forms-sample" id="brand_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                        ?>
                                            <!-- Brand Name -->
                                            <div class="form-group">
                                                <label for="brand_name">Brand Name</label>
                                                <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo $row['name'] ?>" placeholder="Brand Name">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updatebrand" id="updatebrand" class="btn btn-primary mr-2">Update Brand</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('Brand not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
                            }
                            ?>

                            <?php
                            // edit storage
                            if (isset($_GET['strgeid'])) {
                                $id = $_GET['strgeid'];
                                $select = "SELECT * FROM tblstorage WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit Storage Form</h4>
                                    <form class="forms-sample" id="brand_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                        ?>
                                            <!-- Storage -->
                                            <div class="form-group">
                                                <label for="storage">Storage</label>
                                                <input type="text" class="form-control" id="storage" name="storage" value="<?php echo $row['storage'] ?>" placeholder="Storage">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updatestorage" id="updatestorage" class="btn btn-primary mr-2">Update Storage</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('Storage not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
                            }
                            ?>

                            <?php
                            // edit color
                            if (isset($_GET['clreid'])) {
                                $id = $_GET['clreid'];
                                $select = "SELECT * FROM tblcolor WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit Color Form</h4>
                                    <form class="forms-sample" id="color_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                        ?>
                                            <!-- Color Name -->
                                            <div class="form-group">
                                                <label for="color">Color Name</label>
                                                <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['name'] ?>" placeholder="Color Name">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updatecolor" id="updatecolor" class="btn btn-primary mr-2">Update Color</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('Color not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
                            }
                            ?>

                            <?php
                            // edit state
                            if (isset($_GET['seid'])) {
                                $id = $_GET['seid'];
                                $select = "SELECT * FROM tblstate WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit State Form</h4>
                                    <form class="forms-sample" id="state_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                        ?>
                                            <!-- State Name -->
                                            <div class="form-group">
                                                <label for="state">State Name</label>
                                                <input type="text" class="form-control" id="state" name="state" value="<?php echo $row['name'] ?>" placeholder="State Name">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updatestate" id="updatestate" class="btn btn-primary mr-2">Update State</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('State not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
                            }
                            ?>

                            <?php
                            // edit city
                            if (isset($_GET['ceid'])) {
                                $id = $_GET['ceid'];
                                $select = "SELECT * FROM tblcity WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit City Form</h4>
                                    <form class="forms-sample" id="state_form" method="POST" enctype="multipart/form-data">
                                        <?php while ($row = mysqli_fetch_assoc($select_result)) { ?>
                                            <!-- State Name -->
                                            <div class="form-group">
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
                                                            $sid = $row['sid'];
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

                                            <!-- City Name -->
                                            <div class="form-group">
                                                <label for="city">City Name</label>
                                                <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['name'] ?>" placeholder="City Name">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updatecity" id="updatecity" class="btn btn-primary mr-2">Update City</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('City not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
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
            location.href = "other_details.php";
        };

        // color selection
        // $("#color").change(function() {
        //     var colorid = $(this).val();
        //     if (colorid === "") {
        //         $("#storage").html("<option value=''>-- Select Color First --</option>");
        //         $("#storage").prop("disabled", true);
        //     } else {
        //         $.ajax({
        //             type: "POST",
        //             url: "update_product_dropdown.php",
        //             data: {
        //                 cid: colorid
        //             },
        //             success: function(response) {
        //                 $("#storage").prop("disabled", false);
        //                 $("#storage").html(response);
        //             },
        //         });
        //     }
        // });

        // price selection
        $(document).ready(function() {

            // validation for brand form
            $('#brand_form').validate({
                rules: {
                    brand_name: {
                        required: true,
                        number: false,
                    },
                },
                messages: {
                    brand_name: {
                        required: "Please enter product name",
                        number: "Please enter valid product name"
                    },
                }
            });

            // validation for state form
            $('#state_form').validate({
                rules: {
                    state_name: {
                        required: true,
                        number: false,
                    },
                },
                messages: {
                    state_name: {
                        required: "Please enter product name",
                        number: "Please enter valid product name"
                    },
                }
            });

            // validation for city form
            $('#city_form').validate({
                rules: {
                    state: {
                        required: true
                    },
                    city_name: {
                        required: true,
                        number: false,
                    },
                },
                messages: {
                    state: {
                        required: "Please select state"
                    },
                    city_name: {
                        required: "Please enter product name",
                        number: "Please enter valid product name"
                    },
                }
            });
        });
    </script>
</body>

</html>

<?php
// update brand
if (isset($_POST['updatebrand'])) {
    $brand_name = $_POST['brand_name'];

    $check_brand = "SELECT * FROM tblbrand WHERE name = '$brand_name'";
    $check_brand_result = mysqli_query($con, $check_brand);
    if (mysqli_num_rows($check_brand_result) > 0) {
        echo "<script>toastr.error('Brand Already Exists!');</script>";
    } else {
        // update brand
        $update = "UPDATE tblbrand SET name = '$brand_name' WHERE id = '$id'";
        $update_result = mysqli_query($con, $update);
        if ($update_result) {
            echo "<script>alert('Brand Details Updated Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>toastr.error('Failed to Update Brand');</script>";
        }
    }
}

// update state
if (isset($_POST['updatestate'])) {
    $state_name = $_POST['state_name'];

    $check_state = "SELECT * FROM tblstate WHERE name = '$state_name'";
    $check_state_result = mysqli_query($con, $check_state);
    if (mysqli_num_rows($check_state_result) > 0) {
        echo "<script>toastr.error('State Already Exists!');</script>";
    } else {
        // update state
        $update = "UPDATE tblstate SET name = '$state_name' WHERE id = '$id'";
        $update_result = mysqli_query($con, $update);
        if ($update_result) {
            echo "<script>alert('State Details Updated Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>toastr.error('Failed to Update State');</script>";
        }
    }
}

// update city
if (isset($_POST['updatecity'])) {
    $state = $_POST['state'];
    $city_name = $_POST['city_name'];

    $check_city = "SELECT * FROM tblcity WHERE name = '$city_name'";
    $check_city_result = mysqli_query($con, $check_city);
    if (mysqli_num_rows($check_city_result) > 0) {
        echo "<script>toastr.error('City Already Exists!');</script>";
    } else {
        // update city
        $update = "UPDATE tblcity SET name = '$city_name', sid = '$state' WHERE id = '$id'";
        $update_result = mysqli_query($con, $update);
        if ($update_result) {
            echo "<script>alert('City Details Updated Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>toastr.error('Failed to Update City');</script>";
        }
    }
}

?>
<?php
// delete brand
if (isset($_GET['bdid'])) {
    $id = $_GET['bdid'];
    $select = "SELECT * FROM tblproduct WHERE bid = '$id'";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {
        // echo "<script> toastr.error('Brand cannot be deleted, Brand Details is in Use');</script>";
        echo "<script> alert('Brand cannot be deleted, Brand Details is in Use');</script>";
        echo "<script> window.location.href = 'other_details.php'</script>";
    } else {
        $delete = "DELETE FROM tblbrand WHERE id = '$id'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            echo "<script>alert('Brand Deleted Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>alert('Failed to Delete Brand');</script>";
        }
    }
}

// delete State
if (isset($_GET['sdid'])) {
    $id = $_GET['sdid'];
    $select = "SELECT * FROM tblcity WHERE sid = '$id'";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {
        // echo "<script> toastr.error('State cannot be deleted, State Details is in Use');</script>";
        echo "<script> alert('State cannot be deleted, State Details is in Use');</script>";
        echo "<script> window.location.href = 'other_details.php'</script>";
    } else {
        $delete = "DELETE FROM tblstate WHERE id = '$id'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            echo "<script>alert('State Deleted Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>alert('Failed to Delete State');</script>";
        }
    }
}

// delete City
if (isset($_GET['cdid'])) {
    $id = $_GET['cdid'];
    $select = "SELECT * FROM tbluser WHERE cityid = '$id'";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {
        // echo "<script> toastr.error('City cannot be deleted, City Details is in Use');</script>";
        echo "<script> alert('City cannot be deleted, City Details is in Use');</script>";
        echo "<script> window.location.href = 'other_details.php'</script>";
    } else {
        $delete = "DELETE FROM tblcity WHERE id = '$id'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            echo "<script>alert('City Deleted Successfully'); location.href = 'other_details.php';</script>";
        } else {
            echo "<script>alert('Failed to Delete City');</script>";
        }
    }
}
?>