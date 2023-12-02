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

                        <!-- Brand -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Brand</h4>
                                <button type="submit" name="addbrand" id="addbrand" class="btn btn-primary btn-sm mb-1 mr-2">+ Add Brand</button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="brandData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $brand = "SELECT * FROM tblbrand";
                                                $brand_result = mysqli_query($con, $brand);
                                                if (mysqli_num_rows($brand_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($brand_result)) {
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
                                                                <!-- edit -->
                                                                <a class="px-1" href="other_details_edit.php?beid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger" href="other_details_edit.php?bdid=<?php echo $row['id']; ?>">Delete</a>

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

                        <hr>

                        <!-- Storage -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Storage</h4>
                                <button type="submit" name="addstorage" id="addstorage" class="btn btn-primary btn-sm mb-1 mr-2">+ Add Storage</button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="storageData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Storage</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $storage = "SELECT * FROM tblstorage";
                                                $storage_result = mysqli_query($con, $storage);
                                                if (mysqli_num_rows($storage_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($storage_result)) {
                                                ?>
                                                        <tr class="odd">
                                                            <td>
                                                                <?php
                                                                echo $num++;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $row['storage'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <!-- edit -->
                                                                <a class="px-1" href="other_details_edit.php?strgeid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="other_details_edit.php?strgdid=<?php echo $row['id']; ?>">Delete</a>

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

                        <hr>

                        <!-- Color -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Color</h4>
                                <button type="submit" name="addcolor" id="addcolor" class="btn btn-primary btn-sm mb-1 mr-2">+ Add Color</button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="colorData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $color = "SELECT * FROM tblcolor";
                                                $color_result = mysqli_query($con, $color);
                                                if (mysqli_num_rows($color_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($color_result)) {
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
                                                                <!-- edit -->
                                                                <a class="px-1" href="other_details_edit.php?clreid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="other_details_edit.php?clrdid=<?php echo $row['id']; ?>">Delete</a>

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

                        <hr>

                        <!-- State -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">State</h4>
                                <button type="submit" name="addstate" id="addstate" class="btn btn-primary btn-sm mb-1 mr-2">+ Add State</button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="stateData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $state = "SELECT * FROM tblstate";
                                                $state_result = mysqli_query($con, $state);
                                                if (mysqli_num_rows($state_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($state_result)) {
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
                                                                <!-- edit -->
                                                                <a class="px-1" href="other_details_edit.php?seid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="other_details_edit.php?sdid=<?php echo $row['id']; ?>">Delete</a>

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

                        <hr>

                        <!-- City -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">City</h4>
                                <button type="submit" name="addcity" id="addcity" class="btn btn-primary btn-sm mb-1 mr-2">+ Add City</button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="cityData" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1;
                                                $city = "SELECT * FROM tblcity";
                                                $city_result = mysqli_query($con, $city);
                                                if (mysqli_num_rows($city_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($city_result)) {
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
                                                                <!-- edit -->
                                                                <a class="px-1" href="other_details_edit.php?ceid=<?php echo $row['id']; ?>">Edit</a>

                                                                <!-- delete -->
                                                                <a class="px-1 text-danger " href="other_details_edit.php?cdid=<?php echo $row['id']; ?>">Delete</a>

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
            // brand datatable
            var brandData = $('#brandData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search Brand",
                },
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [
                    [5, 15, -1],
                    [5, 15, "All"]
                ],
            });

            // storage datatable
            var storageData = $('#storageData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search Storage",
                },
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [
                    [5, 15, -1],
                    [5, 15, "All"]
                ],
            });

            // color datatable
            var colorData = $('#colorData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search Color",
                },
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [
                    [5, 15, -1],
                    [5, 15, "All"]
                ],
            });

            // state datatable
            var stateData = $('#stateData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search State",
                },
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [
                    [5, 15, -1],
                    [5, 15, "All"]
                ],
            });

            // city datatable
            var cityData = $('#cityData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search City",
                },
                "ordering": true,
                "info": true,
                "responsive": false,
                "autoWidth": false,
                // "lengthMenu": [
                //     [10, 25, 50],
                //     [10, 25, 50]
                // ],
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
    $sql = "UPDATE tbluser SET status = 0 WHERE id = $aid";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('User is now Inactive'); </script>";
        // echo "<script>toastr.success('User is now Inactive')</script>";
        echo "<script> window.location.href = 'user_view.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'user_view.php'; </script>";
    }
}

if (isset($_GET['iaid'])) {
    $iaid = $_GET['iaid'];
    $sql = "UPDATE tbluser SET status = 1 WHERE id = $iaid";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('User is now Active'); </script>";
        // echo "<script>toastr.success('User is now Active')</script>";
        echo "<script> window.location.href = 'user_view.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'user_view.php'; </script>";
    }
}

?>