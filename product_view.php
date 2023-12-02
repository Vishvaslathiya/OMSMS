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
                                                $product_result = mysqli_query($con, $product);
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
                                                                $brand_result = mysqli_query($con, $brand);
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
                                                                ?>
                                                                    <a href="product_view.php?aid=' <?php echo $row['id'] ?>'" class=" text-success">Active</a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="product_view.php?iaid='<?php echo $row['id'] ?>'" class=" text-danger">Inactive</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <!-- edit -->
                                                                <a class="px-1" href="product_edit.php?eid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- edit detail -->
                                                                <a class="px-1 text-primary" href="product_edit.php?esid=<?php echo $row['id']; ?>">Edit Details</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="product_edit.php?did=<?php echo $row['id']; ?>">Delete</a>

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
                    searchPlaceholder: "Search Product",
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

?>