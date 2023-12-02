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
                            <h4 class="card-title">Add Product Detail Form</h4>
                            <form class="forms-sample" id="product_form" method="POST">
                                <!-- brand -->
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <select class="form-control " name="brand_name" id="brand_name">
                                        <option value="">-- Select Brand --</option>
                                        <?php
                                        $brand = "SELECT * FROM tblbrand";
                                        $brand_result = mysqli_query($con, $brand);
                                        if (mysqli_num_rows($brand_result) > 0) {
                                            while ($row = mysqli_fetch_assoc($brand_result)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                            }
                                        }
                                        // $brandid = $_POST['bid'];
                                        ?>
                                    </select>
                                </div>

                                <!-- product name -->
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <select class="form-control" name="product_name" id="product_name" disabled>
                                        <option value="">-- Select Brand First --</option>
                                        <?php
                                        // $prodid = $_POST['pid'];
                                        ?>
                                    </select>
                                </div>

                                <!-- color -->
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <select class="form-control" name="color" id="color" disabled>
                                        <option value="">-- Select Product First --</option>
                                        <?php
                                        // $colorid = $_POST['colorid'];
                                        ?>
                                    </select>
                                </div>

                                <!-- storage -->
                                <div class="form-group">
                                    <label for="storage">Storage</label>
                                    <select class="form-control" name="storage" id="storage" disabled>
                                        <option value="">-- Select Color Fisrt --</option>
                                    </select>
                                </div>

                                <!-- price -->
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price">
                                </div>

                                <!-- stock -->
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock">
                                </div>

                                <!-- description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Enter Description"></textarea>
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="adddetail" id="adddetail" class="btn btn-primary mr-2">Add Details</button>
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
            location.href = "product_view.php";
        };

        // Product Selection
        $("#brand_name").change(function() {
            var brandid = $(this).val();
            if (brandid === "") {
                $("#product_name").html("<option value=''>-- Select Brand First --</option>");
                $("#product_name").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "get_product_dropdown.php",
                    data: {
                        bid: brandid
                    },
                    success: function(response) {
                        $("#product_name").prop("disabled", false);
                        $("#product_name").html(response);
                    },
                });
            }
        });

        // Color Selection
        $("#product_name").change(function() {
            var productid = $(this).val();
            if (productid === "") {
                $("#color").html("<option value=''>-- Select Product First --</option>");
                $("#color").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "get_product_dropdown.php",
                    data: {
                        pid: productid
                    },
                    success: function(response) {
                        $("#color").prop("disabled", false);
                        $("#color").html(response);
                    },
                });
            }
        });

        // Storage Selection
        $("#color").change(function() {
            var colorid = $(this).val();
            if (colorid === "") {
                $("#storage").html("<option value=''>-- Select Color First --</option>");
                $("#storage").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "get_product_dropdown.php",
                    data: {
                        cid: colorid
                    },
                    success: function(response) {
                        $("#storage").prop("disabled", false);
                        $("#storage").html(response);
                    },
                });
            }
        });

        $('#product_form').validate({
            rules: {
                'brand_name': {
                    required: true
                },
                'product_name': {
                    required: true
                },
                'color': {
                    required: true
                },
                'storage': {
                    required: true
                },
                'price': {
                    required: true,
                    number: true
                },
                'stock': {
                    required: true,
                    number: true
                },
                'description': {
                    required: true,
                }
            },
            messages: {
                'brand_name': {
                    required: "Please select brand"
                },
                'product_name': {
                    required: "Please select product"
                },
                'color': {
                    required: "Please select color"
                },
                'storage': {
                    required: "Please select storage"
                },
                'price': {
                    required: "Please enter price",
                    number: "Please enter valid price"
                },
                'stock': {
                    required: "Please enter stock",
                    number: "Please enter valid stock"
                },
                'description': {
                    required: "Please enter description",
                }
            }
        });
    </script>
</body>

</html>
</body>

</html>

<?php
if (isset($_POST['adddetail'])) {
    $product_brand = $_POST['brand_name'];
    $product_id = $_POST['product_name'];
    $color = $_POST['color'];
    $storage = $_POST['storage'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $select = "SELECT * FROM tblproductdetail WHERE pid = $product_id AND cid = $color AND sid = $storage";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {
        echo "<script>toastr.error('Product Details Already Exists')</script>";
    } else {
        $sql = "INSERT INTO tblproductdetail (pid, cid, sid, price, stock, description) VALUES ($product_id, $color, $storage, $price, $stock, '$description')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>toastr.success('Product Details Added Successfully')</script>";
        } else {
            echo "<script>toastr.error('Error in adding Product Details')</script>";
        }
    }
}
?>