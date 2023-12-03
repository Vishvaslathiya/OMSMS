<?php
// include "includes/dbconnection.php";
$conn = mysqli_connect("localhost", "root", "", "omsms");
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
                                                $product_result = mysqli_query($conn, $product);
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
                                                                $brand_result = mysqli_query($conn, $brand);
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
                                                                    echo "Active";
                                                                } else {
                                                                    echo "Inactive";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <!-- edit -->
                                                                <a class="px-1 text-dark" href="product_edit.php?pid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- edit detail -->
                                                                <a class="px-1 text-dark" href="edit_product.php?esid=<?php echo $row['id']; ?>">Edit Details</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-dark" href="product_delete.php?pid=<?php echo $row['id']; ?>">Delete</a>

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
                    searchPlaceholder: "Search Brand",
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