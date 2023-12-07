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
                            // edit product
                            if (isset($_GET['eid'])) {
                                $id = $_GET['eid'];
                                $select = "SELECT * FROM tblproduct WHERE id = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit Product Form</h4>
                                    <form class="forms-sample" id="product_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                        ?>
                                            <!-- Brand Name -->
                                            <div class="form-group">
                                                <label for="product_brand">Product Brand</label>
                                                <select class="form-control" id="product_brand" name="product_brand">
                                                    <option value="">Select Brand</option>
                                                    <?php
                                                    $brand = "SELECT * FROM tblbrand";
                                                    $brand_result = mysqli_query($con, $brand);
                                                    if (mysqli_num_rows($brand_result) > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($brand_result)) {
                                                            if ($row['bid'] == $row1['id']) {
                                                                echo '<option value="' . $row1['id'] . '" selected>' . $row1['name'] . '</option>';
                                                            } else {
                                                                echo '<option value="' . $row1['id'] . '">' . $row1['name'] . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['name'] ?>" placeholder="Product Name">
                                            </div>

                                            <!-- description -->
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Product Description"><?php echo $row['description'] ?></textarea>
                                            </div>

                                            <!-- Image -->
                                            <?php
                                            // image
                                            $image = $row['imageName'];
                                            // trim image name
                                            $imageName = trim($image, "uploads/");
                                            ?>
                                            <div class="form-group">
                                                <label for="image">File upload</label>
                                                <input type="file" name="image" id="image" value="<?php echo $imageName ?>" class="form-control file-upload-info">
                                            </div>
                                        <?php } ?>
                                        <!-- buttons -->
                                        <button type="submit" name="updateprod" id="updateprod" class="btn btn-primary mr-2">Edit Product</button>
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>toastr.error('Product not Found!')</script>";
                                }
                            } else {
                                echo "<script>toastr.error('Something went Wrong!')</script>";
                            }
                            ?>

                            <?php
                            // edit stock
                            if (isset($_GET['esid'])) {
                                $id = $_GET['esid'];
                                $select = "SELECT * FROM tblproductdetail WHERE pid = '$id'";
                                $select_result = mysqli_query($con, $select);
                                if (mysqli_num_rows($select_result) > 0) {
                            ?>
                                    <h4 class="card-title">Edit Product Detail Form</h4>
                                    <form class="forms-sample" id="stock_form" method="POST">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($select_result)) {
                                            $pid = $row['pid'];
                                        }
                                        $row = mysqli_fetch_assoc($select_result);
                                        ?>
                                        <!-- product name -->
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <?php
                                            $product = "SELECT * FROM tblproduct WHERE id = '$pid'";
                                            $product_result = mysqli_query($con, $product);
                                            if (mysqli_num_rows($product_result) > 0) {
                                                $row1 = mysqli_fetch_assoc($product_result);
                                            ?>
                                                <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $row1['name'] ?>" placeholder="Enter Name" disabled>
                                            <?php } ?>
                                        </div>

                                        <!-- color -->
                                        <div class="form-group">
                                            <label for="color">Color</label>
                                            <select class="form-control" name="color" id="color">
                                                <option value="">-- Select Color --</option>
                                                <?php
                                                $color = "SELECT * FROM tblcolor";
                                                $color_result = mysqli_query($con, $color);
                                                if (mysqli_num_rows($color_result) > 0) {
                                                    while ($row1 = mysqli_fetch_assoc($color_result)) {
                                                ?>
                                                        <option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>

                                        <!-- storage -->
                                        <div class="form-group">
                                            <label for="storage">Storage</label>
                                            <select class="form-control" name="storage" id="storage">
                                                <option value="">-- Select Storage --</option>
                                                <?php
                                                $storage = "SELECT * FROM tblstorage";
                                                $storage_result = mysqli_query($con, $storage);
                                                if (mysqli_num_rows($storage_result) > 0) {
                                                    while ($row1 = mysqli_fetch_assoc($storage_result)) {
                                                ?>
                                                        <option value="<?php echo $row1['id'] ?>"><?php echo $row1['storage'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <!-- price -->
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" disabled>
                                        </div>

                                        <!-- stock -->
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="text" name="stock" id="stock" class="form-control" placeholder="Enter Stock" disabled>
                                        </div>

                                        <!-- description -->
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Enter Description" disabled></textarea>
                                        </div>

                                        <!-- buttons -->
                                        <input type="submit" name="updatestock" id="updatestock" value="Edit Details" class="btn btn-primary mr-2">
                                        <input type="submit" name="deletecolor" id="deletecolor" value="Delete Details" class="btn btn-primary mr-2">
                                        <button type="button" name="cancel" id="cancel" class="btn btn-light">Cancel</button>
                                    </form>
                            <?php
                                } else {
                                    echo "<script>alert('Any Product Details not Found, Please Add Product Details!'); location.href = 'product_view.php'</script>";
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
            location.href = "product_view.php";
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
            $('#color, #storage').change(function() {
                var product_name = $('#product_name').val();
                var color_id = $('#color').val();
                var storage_id = $('#storage').val();

                if (color_id === "" || storage_id === "") {
                    $('#price').val("");
                    $('#price').prop("disabled", true);
                    $('#stock').val("");
                    $('#stock').prop("disabled", true);
                    $('#description').val("");
                    $('#description').prop("disabled", true);
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'update_product_stock.php',
                        dataType: 'json',
                        data: {
                            color_id: color_id,
                            storage_id: storage_id,
                            product_name: product_name,
                        },
                        success: function(data) {
                            $('#price').prop("disabled", false);
                            $("#price").val(data.price);
                            // console.log(data.price);
                            $('#stock').prop("disabled", false);
                            $("#stock").val(data.stock);
                            // console.log(data.stock);
                            $('#description').prop("disabled", false);
                            $("#description").val(data.description);
                            // console.log(data.description);
                        }
                    });
                }
            });
            // });

            // validation for product form
            $('#product_form').validate({
                rules: {
                    product_brand: {
                        required: true
                    },
                    product_name: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    // image: {
                    //     required: true
                    // }
                },
                messages: {
                    product_brand: {
                        required: "Please select brand"
                    },
                    product_name: {
                        required: "Please enter product name"
                    },
                    description: {
                        required: "Please enter description"
                    },
                    // image: {
                    //     required: "Please select image"
                    // }
                }
            });

            // validation for stock form
            $('#stock_form').validate({
                rules: {
                    color: {
                        required: true
                    },
                    storage: {
                        required: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    stock: {
                        required: true,
                        number: true
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    color: {
                        required: "Please select color"
                    },
                    storage: {
                        required: "Please select storage"
                    },
                    price: {
                        required: "Please enter price",
                        number: "Please enter valid price"
                    },
                    stock: {
                        required: "Please enter stock",
                        number: "Please enter valid stock"
                    },
                    description: {
                        required: "Please enter description"
                    }
                }
            });
        });
    </script>
</body>

</html>

<?php
// update product
if (isset($_POST['updateprod'])) {
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $color = $_POST['color'];

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        // image
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        // Store image in a directory
        $targetDirectory = "uploads/";
        $image = $targetDirectory . $imageName;
        if (move_uploaded_file($imageTmpName, $image)) {
            // update product
            $update = "UPDATE tblproduct SET bid = '$product_brand', name = '$product_name', description = '$description', imageName = '$image' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update);
            if ($update_result) {
                echo "<script>alert('Product Details Updated Successfully'); location.href = 'product_view.php';</script>";
            } else {
                echo "<script>alert('Failed to Update Product');</script>";
            }
        } else {
            echo "<script>toastr.error('Failed to Upload Image')</script>";
        }
    } else {
        // update product
        $update = "UPDATE tblproduct SET bid = '$product_brand', name = '$product_name', description = '$description' WHERE id = '$id'";
        $update_result = mysqli_query($con, $update);
        if ($update_result) {
            echo "<script> alert('Product Details Updated Successfully other than Image'); location.href = 'product_view.php';</script>";
        } else {
            echo "<script> alert('Failed to Update Product');</script>>";
        }
    }
}


// edit product details
if (isset($_POST['updatestock'])) {
    $color = $_POST['color'];
    $storage = $_POST['storage'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {

        $update = "UPDATE tblproductdetail SET price = '$price', stock = '$stock', description = '$description' WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
        $update_result = mysqli_query($con, $update);
        if ($update_result) {
            // echo "<script>toastr.success('Product Stock Updated Successfully'); location.href = 'product_view.php';</script>";
            echo "<script>toastr.success('Product Stock Updated Successfully');</script>";
        } else {
            echo "<script>toastr.error('Failed to Update Product Stock');</script>";
        }
    } else {
        echo "<script>toastr.error('Product Details not Found, Please Add Product Details!');</script>";
    }
}

// delete produc details
if (isset($_POST['deletecolor'])) {
    $color = $_POST['color'];
    $storage = $_POST['storage'];

    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
    $select_result = mysqli_query($con, $select);

    if (mysqli_num_rows($select_result) > 0) {
        $delete = "DELETE FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            echo "<script>toastr.success('Product of Color Deleted Successfully');</script>";
        } else {
            echo "<script>toastr.error('Failed to Delete Color');</script>";
        }
    } else {
        echo "<script>toastr.error('Product Details not Found, Please Add Product Details!');</script>";
    }
}
?>
<?php
// delete product
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id'";
    $select_result = mysqli_query($con, $select);
    if (mysqli_num_rows($select_result) > 0) {
        // echo "<script> toastr.error('Product cannot be deleted, Product Details is in Use');</script>";
        echo "<script> alert('Product cannot be deleted, Product Details is in Use');</script>";
        echo "<script> window.location.href = 'product_view.php'</script>";
    } else {
        $delete = "DELETE FROM tblproduct WHERE id = '$id'";
        $delete_result = mysqli_query($con, $delete);
        if ($delete_result) {
            echo "<script>alert('Product Deleted Successfully'); location.href = 'product_view.php';</script>";
        } else {
            echo "<script>alert('Failed to Delete Product');</script>";
        }
    }
}
?>