<?php
require_once("includes/dbconnection.php");
require_once("preloader.php");

// session_start();
error_reporting(0);
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <?php
                  $aid = $_SESSION['aid'];
                  $sql = "SELECT * FROM tbluser WHERE id='$aid'";
                  $query = mysqli_query($con, $sql);
                  $result = mysqli_fetch_assoc($query);
                  ?>
                  <h3 class="font-weight-bold">Welcome <?php echo $result['name'] ?></h3>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <!-- <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                      </button> -->
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <a href="odr_notconfirmed.php" class="text-decoration-none text-white">
                      <div class="card-body">
                        <p class="mb-4">Today’s Orders</p>
                        <?php
                        $sql = "SELECT * FROM tblorderaddresses where OrderTime = CURRENT_TIMESTAMP()";
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);
                        ?>
                        <p class="fs-30 mb-2" style="font-size:30px;">
                          <?php echo "$count"; ?>
                        </p>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <a href="odr_view_all.php" class="text-decoration-none text-white">
                      <div class="card-body">
                        <p class="mb-4">Total Orders</p>
                        <?php
                        $sql = "SELECT * FROM tblorderaddresses";
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);
                        ?>

                        <p class="fs-30 mb-2" style="font-size:30px;">
                          <?php echo "$count"; ?>
                        </p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <!-- <a href="" class="text-decoration-none text-white"> -->
                      <div class="card-body">
                        <p class="mb-4">Total Of Orders Rs.</p>

                        <?php

                        $prd = "SELECT SUM(CAST(tblprd.prdPrice AS DECIMAL(10, 2)) * tblorders.PrdQty) AS TotalOrderValue FROM tblorders JOIN tblprd ON tblorders.PrdId = tblprd.ID;";
                        $result = mysqli_query($con, $prd);
                        $row = mysqli_fetch_assoc($result);
                        $sum = $row['TotalOrderValue'];
                        ?>
                        <p class="fs-30 mb-2" style="font-size:30px;">
                          <?php echo "$sum"; ?>
                        </p>
                      </div>
                    <!-- </a> -->
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <a href="user_view.php" class="text-decoration-none text-white">
                      <div class="card-body">
                        <p class="mb-4">Number of Users</p>
                        <?php
                        $sql = "SELECT * FROM tbluser";
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);
                        ?>

                        <p class="fs-30 mb-2" style="font-size:30px;">
                          <?php echo "$count"; ?>
                        </p>

                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Products Of All Time</p> </br>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Last Ordered Date</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                        $result = mysqli_query($con, "SELECT tblprd.prdName, tblprd.prdPrice, DATE_FORMAT(MAX(tblorderaddresses.OrderTime), '%d/%m/%Y') AS LastOrderedDate, SUM(tblorders.PrdQty) AS TotalOrderedQty FROM tblorders JOIN tblprd ON tblorders.PrdId = tblprd.ID JOIN tblorderaddresses ON tblorders.OrderNumber = tblorderaddresses.Ordernumber GROUP BY tblprd.prdName ORDER BY TotalOrderedQty DESC; ");

                        if ($result) {
                          if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '<tr>';
                              echo "<td>" . $row["prdName"] . "</td>";
                              echo "<td class='font-weight-bold'> " . $row["prdPrice"] . "</td>";
                              echo "<td> " . $row["TotalOrderedQty"] . " </td>";
                              echo "<td> " . $row["LastOrderedDate"] . " </td>";
                              echo '</tr>';
                            }
                          } else {
                            echo "<tr><td colspan='4'>No results found</td></tr>";
                          }
                        } else {
                          // Handle query error
                          echo "<tr><td colspan='4'>Error executing the query: " . mysqli_error($con) . "</td></tr>";
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
        include 'includes/footer.php';
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
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
  <!-- End custom js for this page-->
</body>

</html>