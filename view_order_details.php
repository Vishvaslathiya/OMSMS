<?php
$msg = "";
$grandtotal = 0;
include_once("includes/dbconnection.php");
// $oid = ;
if (isset($_POST['submit'])) {
    $ressta = $_POST['status'];
    $remark = $_POST['restremark'];
    $toemail = $_POST['useremail'];
    $oid = $_GET['orderid'];

    // $query = mysqli_query($con, "insert into tblfoodtracking(OrderId,remark,status) value('$oid','$remark','$ressta')");
    $query = mysqli_query($con, "update tblorderaddresses set OrderFinalStatus='$ressta' where Ordernumber='$oid'");
    if ($query) {
        //Code for email
        $msg = "Order Has been updated";
        echo "<script>alert('Order Updated');</script>";
    } else {
        $msg = "Something Went Wrong. Please try again";
    }
}


?>
<!DOCTYPE html>
<html>

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

    <div id="wrapper">

        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
            <div class="container-fluid page-body-wrapper">
                <?php
                include_once("includes/Navbar.php");
                include_once("includes/sidebar.php");
                ?>
                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">

                                <div class="ibox-content">

                                    <?php
                                    $oid = $_GET['orderid'];

                                    // $oid = 637402070;
                                    $con = mysqli_connect("localhost", "root", "", "OMSMS");
                                    if (mysqli_connect_errno()) {
                                        echo "Failed to connect to MySQL:" . mysqli_connect_error();
                                    }
                                    $ret = "";
                                    $ret = mysqli_query($con, "select * from tblorderaddresses join tblcustomer on tblcustomer.ID=tblorderaddresses.UserId where tblorderaddresses.Ordernumber=$oid");
                                    if (!$ret) {
                                        echo "Error in query";
                                    }

                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>



                                        <div class="row">
                                            <div class="col-4">

                                                <p style="font-size:16px; color:red; text-align: center">
                                                    <?php if ($msg) {
                                                        echo $msg;
                                                    } ?>
                                                </p>
                                                <table border="1" class="table table-bordered mg-b-0">
                                                    <tr align="center">
                                                        <td colspan="2" style="font-size:20px;color:blue">
                                                            User Details</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Order Number</th>
                                                        <td>
                                                            <?php echo $row['Ordernumber']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>
                                                            <?php echo $row['name']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Email</th>
                                                        <td>
                                                            <?php echo $uemail = $row['email']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Flat no./buldng no.</th>
                                                        <td>
                                                            <?php echo $row['Flatnobuldngno']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>StreetName</th>
                                                        <td>
                                                            <?php echo $row['StreetName']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Area</th>
                                                        <td>
                                                            <?php echo $row['Area']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Land Mark</th>
                                                        <td>
                                                            <?php echo $row['Landmark']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>
                                                            <?php echo $row['City']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <td>
                                                            <?php echo $row['OrderTime']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Final Status</th>
                                                        <td>
                                                            <?php
                                                            $orserstatus = $row['OrderFinalStatus'];
                                                            if ($row['OrderFinalStatus'] == "Order Confirmed") {
                                                                echo "Order Confirmed";
                                                            }

                                                            if ($row['OrderFinalStatus'] == "Product being Prepared") {
                                                                echo "Product being Prepared";
                                                            }
                                                            if ($row['OrderFinalStatus'] == "Product Pickup") {
                                                                echo "Product Pickup";
                                                            }
                                                            if ($row['OrderFinalStatus'] == "Product Delivered") {
                                                                echo "Product Delivered";
                                                            }
                                                            if ($row['OrderFinalStatus'] == "") {
                                                                echo "Wait for Shops approval";
                                                            }
                                                            if ($row['OrderFinalStatus'] == "Order Cancelled") {
                                                                echo "Order Cancelled";
                                                            }
                                                            ; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-6" style="margin-top:0.73%">
                                                <?php
                                                // $oid = $_GET['orderid'];
                                                // $con = mysqli_connect('localhost','root','','omsms');
                                                // $query = mysqli_query($con, "select tblprd.Image,tblprd.prdName,tblprd.prdDes,tblprd.prdPrice,tblprd.prdQty,tblorders.prdId,tblorders.prdQty, tblorders.payment_mode from tblorders join tblprd on tblprd.ID=tblorders.PrdId where tblorders.IsOrderPlaced=1 and tblorders.OrderNumber='$oid'");
                                                // $num = mysqli_num_rows($query);
                                                $cnt = 1; ?>
                                                <!-- <div class="table-responsive"> -->

                                                    <table border="1" class="table table-bordered mg-b-0">
                                                        <tr align="center">
                                                            <td colspan="10" style="font-size:20px;color:blue">
                                                                Order Details</td>
                                                        </tr>

                                                         <tr>
                                                            <th>#</th>
                                                            <th>Product </th>
                                                            <th>Product Name</th>
                                                            <th>Qty</th>
                                                            <th>Price/Unit</th>
                                                            <th>Payment Mode</th>
                                                            <th>Total</th>

                                                        </tr>
                                                        <?php
                                                        $oid = $_GET['orderid'];
                                                        // $oid = '637402070';
                                                        $con = mysqli_connect('localhost', 'root', '', 'omsms');
                                                        $query = mysqli_query($con, "select tblprd.Image,tblprd.prdName,tblprd.prdDes,tblprd.prdPrice,tblprd.prdQty,tblorders.prdId,tblorders.prdQty, tblorders.payment_mode from tblorders join tblprd on tblprd.ID=tblorders.PrdId where tblorders.IsOrderPlaced=1 and tblorders.OrderNumber='$oid'");
                                                        $num = mysqli_num_rows($query);
                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $cnt; ?>
                                                                </td>
                                                                <td><img src="prj_img/<?php echo $row1['Image']; ?>"
                                                                        style="border-radius: 0; padding: 0; margin: 0;"
                                                                        width="120px" height="40px"
                                                                        alt="<?php echo $row1['prdName'] ?>"></td>
                                                                <td>
                                                                    <?php echo $row1['prdName']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $qty = $row1['prdQty']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $ppu = $row1['prdPrice']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row1['payment_mode']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $total = $qty * $ppu; ?>
                                                                </td>
                                                            </tr>
                                                            
                                                            <?php
                                                            $grandtotal += $total;
                                                            $cnt = $cnt + 1;
                                                        } ?>
                                                        <tr>
                                                            <th colspan="6" style="text-align:center">Grand Total </th>
                                                            <td class="text-danger">
                                                                <strong><?php echo $grandtotal; ?></strong>
                                                            </td>
                                                        </tr>


                                                    </table>

                                                </div>


                                            </div>


                                        </div>




                                        <table class="table mb-0">



                                            <form name="submit" method="post">

                                                <tbody>
                                                    <tr>
                                                        <th>Shop Remark :</th>
                                                        <td>
                                                            <input type="hidden" name="useremail" value="shreyas@gmail.com">
                                                            <textarea name="restremark" placeholder="" rows="12" cols="14"
                                                                class="form-control wd-450" required="true"></textarea>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Shop Status :</th>
                                                        <td>
                                                            <select name="status" class="form-control wd-450"
                                                                required="true">
                                                                <option name="status" value="Order Confirmed"
                                                                    selected="true">Order
                                                                    Confirmed</option>
                                                                <option name="status" value="Order Cancelled">Order
                                                                    Cancelled</option>
                                                                <option name="status" value="Product being Prepared">Product
                                                                    Not
                                                                    Available
                                                                </option>
                                                                <option name="status" value="Product Pickup">Product Pickup
                                                                </option>
                                                                <option name="status" value="Product Delivered">Product
                                                                    Delivered
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td colspan="2"><button type="submit" name="submit"
                                                                class="btn btn-primary">Update
                                                                order</button></td>
                                                    </tr>

                                            </form>

                                        <?php } ?>


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

    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>

</body>

</html>