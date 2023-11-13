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
    <link rel="icon" href="images/logo.jpg">
</head>

<body>
    <div class="w-[90%] absolute right-0 pt-12">
        <form method="POST" id="product_form">
            <!-- brand name -->
            <div>
                <label for="brand_name">Brand Name</label>
                <select name="brand_name" id="brand_name">
                    <option value="">-- Select Brand --</option>
                    <?php
                    $brand = "SELECT * FROM tblbrand";
                    $brand_result = mysqli_query($conn, $brand);
                    if (mysqli_num_rows($brand_result) > 0) {
                        while ($row = mysqli_fetch_assoc($brand_result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    // $brandid = $_POST['bid'];
                    ?>
                </select> <br> <br>
            </div>

            <!-- product fetch based on brand name -->
            <div>
                <label for="product_name">Product Name</label>
                <select class="disabled:cursor-not-allowed disabled:opacity-50" name="product_name" id="product_name" disabled>
                    <option value="">-- Select Brand First --</option>
                    <?php
                    // $prodid = $_POST['pid'];
                    ?>
                </select> <br> <br>
            </div>

            <!-- color fetch from tblproductcolor based on product-->
            <div>
                <label for="color">Color</label>
                <select class="disabled:cursor-not-allowed disabled:opacity-50" name="color" id="color" disabled>
                    <option value="">-- Select Product First --</option>
                    <?php
                    // $colorid = $_POST['colorid'];
                    ?>
                </select> <br> <br>
            </div>

            <!-- storage -->
            <div>
                <label for="storage">Storage</label>
                <select class="disabled:cursor-not-allowed disabled:opacity-50" name="storage" id="storage" disabled>
                    <option value="">-- Select Color Fisrt --</option>
                </select> <br> <br>
            </div>

            <!-- price -->
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" placeholder="Enter Price"> <br> <br>
            </div>

            <!-- stock -->
            <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" placeholder="Enter Stock"> <br> <br>
            </div>

            <!-- description -->
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter Description"></textarea> <br> <br>
            </div>

            <!-- submit -->
            <div>
                <input type="submit" name="adddetail" id="adddetail" value="Add Detail" class="cursor-pointer bg-black text-base text-white p-2">
                <a href="ap_product.php"><button type="button" id="back" class="bg-black p-2 text-white text-base">Back</button></a>
            </div>
        </form>
        <script>
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
    $select_result = mysqli_query($conn, $select);
    if (mysqli_num_rows($select_result) > 0) {
        echo "<script>toastr.error('Product Details Already Added')</script>";
    } else {
        $sql = "INSERT INTO tblproductdetail (pid, cid, sid, price, stock, description) VALUES ($product_id, $color, $storage, $price, $stock, '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>toastr.success('Product Details Added Successfully')</script>";
        } else {
            echo "<script>toastr.error('Product Details Not Added')</script>";
        }
    }
}
?>