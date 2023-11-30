<?php
// include "includes/dbconnection.php";
$conn = mysqli_connect("localhost", "root", "", "project");
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
                            <h4 class="card-title">Add Product Form</h4>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                <!-- Brand Name -->
                                <div class="form-group">
                                    <label for="product_brand">Product Brand</label>
                                    <select class="form-control" id="product_brand" name="product_brand">
                                        <option value="">Select Brand</option>
                                        <?php
                                        $brand = "SELECT * FROM tblbrand";
                                        $brand_result = mysqli_query($conn, $brand);
                                        if (mysqli_num_rows($brand_result) > 0) {
                                            while ($row = mysqli_fetch_assoc($brand_result)) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                                </div>

                                <!-- description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image">File upload</label>
                                    <input type="file" name="image" id="image" class="form-control file-upload-info">
                                </div>

                                <!-- buttons -->
                                <button type="submit" name="addproduct" id="addproduct" class="btn btn-primary mr-2">Add</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
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
</body>

</html>
</body>

</html>

<?php
if (isset($_POST['addproduct'])) {
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    // $price = $_POST['price'];
    // $stock = $_POST['stock'];
    // $color = $_POST['color'];
    // $storage = $_POST['storage'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];


    // Store image in a directory
    $targetDirectory = "uploads/";
    $image = $targetDirectory . $imageName;
    $pid = "SELECT id FROM tblproduct WHERE name = '$product_name'";
    $pid_result = mysqli_query($conn, $pid);
    if (mysqli_num_rows($pid_result) > 0) {
        echo "<script>toastr.error('Product Already Exists!')</script>";
    } else {
        if (move_uploaded_file($imageTmpName, $image)) {
            $insert_product = "INSERT INTO tblproduct (bid, name, description, imageName, status) VALUES ('$product_brand', '$product_name', '$description', '$image', 1)";
            $insert_product_result = mysqli_query($conn, $insert_product);

            if ($insert_product_result) {
                // fetching product id
                // $fetch_pid = "SELECT id FROM tblproduct WHERE name = '$product_name'";
                // $run_pid = mysqli_query($conn, $fetch_pid);

                // $last_id = mysqli_insert_id($conn);
                // if ($run_pid) {
                //     $row_pid = mysqli_fetch_assoc($run_pid);
                //     $pid = $row_pid['id'];
                //     foreach ($color as $color_id) {
                //         $insert_color = "INSERT INTO tblproductcolor (pid, colorid) VALUES ($pid, $color_id)";
                //         $insert_color_result = mysqli_query($conn, $insert_color);
                //     }

                echo "<script>toastr.success('Product Added Successfully')</script>";
                echo '<script>location.href="product_view.php"</script>';
                // }
            } else {
                echo "<script>toastr.error('Something went Wrong!')</script>";
            }
        } else {
            echo "<script>toastr.error('Error in Uploading Image!')</script>";
        }
    }
}
?>