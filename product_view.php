<?php
<<<<<<< HEAD
// include "includes/dbconnection.php";
$conn = mysqli_connect("localhost", "root", "", "omsms");
=======
require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
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
                            <h4 class="card-title">Your Products</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="tableData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Product</th>
                                                    <th>Brand</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $product = "SELECT * FROM tblproduct";
<<<<<<< HEAD
                                                $product_result = mysqli_query($conn, $product);
=======
                                                $product_result = mysqli_query($con, $product);
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
                                                if (mysqli_num_rows($product_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($product_result)) {
                                                ?>
                                                        <tr class="odd">
                                                            <td>
                                                                <?php
                                                                echo $num++;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $row['name'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $bid = $row['bid'];
                                                                $brand = "SELECT * FROM tblbrand WHERE id = '$bid'";
<<<<<<< HEAD
                                                                $brand_result = mysqli_query($conn, $brand);
=======
                                                                $brand_result = mysqli_query($con, $brand);
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
                                                                $row_brand = mysqli_fetch_assoc($brand_result);
                                                                echo $row_brand['name'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $row['description'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] == 1) {
<<<<<<< HEAD
                                                                    echo "Active";
                                                                } else {
                                                                    echo "Inactive";
=======
                                                                ?>
                                                                    <a href="product_view.php?aid=' <?php echo $row['id'] ?>'" class=" text-success">Active</a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="product_view.php?iaid='<?php echo $row['id'] ?>'" class=" text-danger">Inactive</a>
                                                                <?php
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <!-- edit -->
<<<<<<< HEAD
                                                                <a class="px-1 text-dark" href="product_edit.php?pid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- edit detail -->
                                                                <a class="px-1 text-dark" href="edit_product.php?esid=<?php echo $row['id']; ?>">Edit Details</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-dark" href="product_delete.php?pid=<?php echo $row['id']; ?>">Delete</a>
=======
                                                                <a class="px-1" href="product_edit.php?eid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- edit detail -->
                                                                <a class="px-1 text-primary" href="product_edit.php?esid=<?php echo $row['id']; ?>">Edit Details</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="product_edit.php?did=<?php echo $row['id']; ?>">Delete</a>
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a

                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

    <!-- pagination -->
    <script>
        $(document).ready(function() {
            // Initialize DataTable on your table
            var dataTable = $('#tableData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
<<<<<<< HEAD
                    searchPlaceholder: "Search Brand",
=======
                    searchPlaceholder: "Search Product",
>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
                },
                "ordering": true,
                "info": true,
                responsive: true,
                "autoWidth": false,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        });
    </script>
</body>

</html>
</body>

</html>

<?php
<<<<<<< HEAD
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
=======
// Ative and Inactive
if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $sql = "UPDATE tblproduct SET status = 0 WHERE id = $aid";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('Product is now Inactive'); </script>";
        // echo "<script>toastr.success('Product is now Inactive')</script>";
        echo "<script> window.location.href = 'product_view.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'product_view.php'; </script>";
    }
}

if (isset($_GET['iaid'])) {
    $iaid = $_GET['iaid'];
    $sql = "UPDATE tblproduct SET status = 1 WHERE id = $iaid";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('Product is now Active'); </script>";
        // echo "<script>toastr.success('Product is now Active')</script>";
        echo "<script> window.location.href = 'product_view.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'product_view.php'; </script>";
    }
}

>>>>>>> b561b8198bc29dec46e5abd77239a3f44df33a4a
?>