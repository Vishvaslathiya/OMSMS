<?php
$current_page = 'ap_product.php';
require 'ap_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <div class="w-[90%] absolute right-0 pt-12">
        <?php
        // update product
        if (isset($_GET['eid'])) {
            $id = $_GET['eid'];
            $select = "SELECT * FROM tblproduct WHERE id = '$id'";
            $select_result = mysqli_query($conn, $select);
            if (mysqli_num_rows($select_result) > 0) {
                echo "<form method='POST' id='product_form' enctype='multipart/form-data'>";
                while ($row = mysqli_fetch_assoc($select_result)) {
                    // brand name in dropdown
                    echo "<div>";
                    echo "<label for='product_brand'>Product Brand</label>";
                    echo "<select name='product_brand' id='product_brand'>";
                    echo "<option value=''>-- Select Brand --</option>";
                    $brand = "SELECT * FROM tblbrand";
                    $brand_result = mysqli_query($conn, $brand);
                    if (mysqli_num_rows($brand_result) > 0) {
                        while ($row1 = mysqli_fetch_assoc($brand_result)) {
                            if ($row['bid'] == $row1['id']) {
                                echo '<option value="' . $row1['id'] . '" selected>' . $row1['name'] . '</option>';
                            } else {
                                echo '<option value="' . $row1['id'] . '">' . $row1['name'] . '</option>';
                            }
                        }
                    }
                    echo "</select> <br> <br>";
                    echo "</div>";

                    // product name
                    echo "<div>";
                    echo "<label for='product_name'>Product Name</label>";
                    echo "<input type='text' name='product_name' id='product_name' placeholder='Product Name' value='" . $row['name'] . "'> <br> <br>";
                    echo "</div>";

                    // color in checkboxes
                    // echo "<div>";
                    // echo "<label for='color'>Color</label>";
                    // $color = "SELECT * FROM tblcolor ORDER BY name ASC";
                    // $color_result = mysqli_query($conn, $color);
                    // if (mysqli_num_rows($color_result) > 0) {
                    //     while ($row1 = mysqli_fetch_assoc($color_result)) {
                    //         $colorid = $row1['id'];
                    //         $colorname = $row1['name'];
                    //         $colorselect = "SELECT * FROM tblproductcolor WHERE pid = '$id' AND colorid = '$colorid'";
                    //         $colorselect_result = mysqli_query($conn, $colorselect);
                    //         if (mysqli_num_rows($colorselect_result) > 0) {
                    //             echo '<input type="checkbox" name="color[]" value="' . $colorid . '" checked>' . $colorname . '  ';
                    //         } else {
                    //             echo '<input type="checkbox" name="color[]" value="' . $colorid . '">' . $colorname . '  ';
                    //         }
                    //     }
                    // }
                    // echo "</div>";

                    // description
                    echo "<div>";
                    echo "<label for='description'>Description</label>";
                    echo "<textarea name='description' id='description' cols='30' rows='10' placeholder='Description'>" . $row['description'] . "</textarea> <br> <br>";
                    echo "</div>";

                    // image
                    $image = $row['imageName'];
                    // trim image name
                    $imageName = trim($image, "uploads/");
                    echo "<div>";
                    echo "<label for='image'>Image</label>";
                    echo "<input type='file' name='image' id='image' value='" . $imageName . "'> <br> <br>";
                    echo "</div>";
                }
        ?>
                <!-- submit -->
                <div>
                    <input type="submit" name="updateprod" id="updateprod" value="Update Product" class="cursor-pointer bg-black text-base text-white p-2">
                    <a href='ap_product.php'><button type='button' class='w-fit p-2 mt-4 text-white bg-gray-500 rounded-lg hover:bg-gray-600' hover:cursor-pointer>Back</button></a>
                </div>
        <?php
                echo "</form>";
            }
        }
        ?>

        <?php
        // update stock
        if (isset($_GET['esid'])) {
            $id = $_GET['esid'];
            $select = "SELECT * FROM tblproductdetail WHERE pid = '$id'";
            $select_result = mysqli_query($conn, $select);
            if (mysqli_num_rows($select_result) > 0) {
                echo "<form method='POST' id='stock_form'>";
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $pid = $row['pid'];
                }
                $row = mysqli_fetch_assoc($select_result);
                // while ($row = mysqli_fetch_assoc($select_result)) {
                // product name
                echo "<div>";
                echo "<label for='product_name'>Product Name</label>";
                $product = "SELECT * FROM tblproduct WHERE id = '$pid'";
                $product_result = mysqli_query($conn, $product);
                if (mysqli_num_rows($product_result) > 0) {
                    $row1 = mysqli_fetch_assoc($product_result);
                    echo "<input type='text' name='product_name' id='product_name' placeholder='Product Name' value='" . $row1['name'] . "' disabled> <br> <br>";
                }
                echo "</div>";

                // color
                echo "<div>";
                echo "<label for='color'>Color</label>";
                echo "<select name='color' id='color'>";
                echo "<option value=''>-- Select Color --</option>";
                $color = "SELECT * FROM tblcolor";
                $color_result = mysqli_query($conn, $color);
                if (mysqli_num_rows($color_result) > 0) {
                    while ($row1 = mysqli_fetch_assoc($color_result)) {
                        echo '<option value="' . $row1['id'] . '">' . $row1['name'] . '</option>';
                        // $cid = $row1['id'];
                    }
                }
                echo "</select> <br> <br>";
                echo "</div>";

                // storage
                echo "<div>";
                echo "<label for='storage'>Storage</label>";
                echo "<select class='' name='storage' id='storage'>";
                echo "<option value=''>-- Select Storage --</option>";
                $storage = "SELECT * FROM tblstorage";
                $storage_result = mysqli_query($conn, $storage);
                if (mysqli_num_rows($storage_result) > 0) {
                    while ($row1 = mysqli_fetch_assoc($storage_result)) {
                        echo '<option value="' . $row1['id'] . '">' . $row1['storage'] . '</option>';
                        // $sid = $row1['id'];
                    }
                }
                echo "<select> <br> <br>";
                echo "</div>";

                // price
                echo "<div>";
                echo "<label for='price'>Price</label>";
                echo "<input class='disabled:cursor-not-allowed disabled:opacity-50' type='text' name='price' id='price' placeholder='Enter Price' disabled> <br> <br>";
                echo "</div>";

                // stock
                echo "<div>";
                echo "<label for='stock'>Stock</label>";
                echo "<input class='disabled:cursor-not-allowed disabled:opacity-50' type='text' name='stock' id='stock' placeholder='Enter Stock' disabled> <br> <br>";
                echo "</div>";

                // description
                echo "<div>";
                echo "<label for='description'>Description</label>";
                echo "<textarea class='disabled:cursor-not-allowed disabled:opacity-50' name='description' id='description' cols='30' rows='10' placeholder='Description' disabled></textarea> <br> <br>";
                echo "</div>";

                // submit
                echo "<div>";
                echo "<input type='submit' name='updatestock' id='updatestock' value='Update Details' class='cursor-pointer bg-black text-base text-white p-2'>";
                echo "<input type='submit' name='deletecolor' id='deletecolor' value='Delete Details' class='cursor-pointer bg-black text-base text-white p-2'>";
                echo "<a href='ap_product.php'><button type='button' class='w-fit p-2 mt-4 text-white bg-gray-500 rounded-lg hover:bg-gray-600' hover:cursor-pointer >Back</button></a>";
                echo "</div>";

                echo "</form>";
            } else {
                echo "<script>alert('Any Product Details not Found, Please Add Product Details!'); location.href = 'ap_product.php'</script>";
            }
        }
        // }
        ?>
    </div>

    <script>
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
                    // description: {
                    //     required: true
                    // }
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
            $update_result = mysqli_query($conn, $update);
            if ($update_result) {
                echo "<script>alert('Product Details Updated Successfully'); location.href = 'ap_product.php';</script>";
            } else {
                echo "<script>alert('Failed to Update Product');</script>";
            }
        } else {
            echo "<script>toastr.error('Failed to Upload Image')</script>";
        }
    } else {
        // update product
        $update = "UPDATE tblproduct SET bid = '$product_brand', name = '$product_name', description = '$description' WHERE id = '$id'";
        $update_result = mysqli_query($conn, $update);
        if ($update_result) {
            echo "<script> alert('Product Details Updated Successfully other than Image'); location.href = 'ap_product.php';</script>";
        } else {
            echo "<script>alert('Failed to Update Product');</script>>";
        }
    }
}


// update stock
if (isset($_POST['updatestock'])) {
    $color = $_POST['color'];
    $storage = $_POST['storage'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
    $select_result = mysqli_query($conn, $select);
    if (mysqli_num_rows($select_result) > 0) {


        $update = "UPDATE tblproductdetail SET price = '$price', stock = '$stock', description = '$description' WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
        $update_result = mysqli_query($conn, $update);
        if ($update_result) {
            // echo "<script>toastr.success('Product Stock Updated Successfully'); location.href = 'ap_product.php';</script>";
            echo "<script>alert('Product Stock Updated Successfully'); location.href = 'edit_product.php?esid=$id';</script>";
        } else {
            echo "<script>alert('Failed to Update Product Stock');</script>";
        }
    } else {
        echo "<script>alert('Product Details not Found, Please Add Product Details!'); location.href = 'edit_product.php?esid=$id';</script>";
    }
}

// delete color
if (isset($_POST['deletecolor'])) {
    $color = $_POST['color'];
    $storage = $_POST['storage'];

    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
    $select_result = mysqli_query($conn, $select);
    if (mysqli_num_rows($select_result) > 0) {


        $delete = "DELETE FROM tblproductdetail WHERE pid = '$id' AND cid = '$color' AND sid = '$storage'";
        $delete_result = mysqli_query($conn, $delete);
        if ($delete_result) {
            echo "<script>alert('Product of Color Deleted Successfully'); location.href = 'edit_product.php?esid=$id';</script>";
        } else {
            echo "<script>alert('Failed to Delete Color');</script>";
        }
    } else {
        echo "<script>alert('Product Details not Found, Please Add Product Details!'); location.href = 'edit_product.php?esid=$id';</script>";
    }
}
?>
<?php
// delete product
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $select = "SELECT * FROM tblproductdetail WHERE pid = '$id'";
    $select_result = mysqli_query($conn, $select);
    if (mysqli_num_rows($select_result) > 0) {
        // echo "<script> toastr.error('Product cannot be deleted, Product Details is in Use');</script>";
        echo "<script> alert('Product cannot be deleted, Product Details is in Use');</script>";
        echo "<script> window.location.href = 'ap_product.php'</script>";
    } else {
        $delete = "DELETE FROM tblproduct WHERE id = '$id'";
        $delete_result = mysqli_query($conn, $delete);
        if ($delete_result) {
            echo "<script>alert('Product Deleted Successfully'); location.href = 'ap_product.php';</script>";
        } else {
            echo "<script>alert('Failed to Delete Product');</script>";
        }
    }
}
?>