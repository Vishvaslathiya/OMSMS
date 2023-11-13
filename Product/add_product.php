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
        <form method="POST" id="product_form" enctype="multipart/form-data">
            <!-- product brand -->
            <div>
                <label for="product_brand">Product Brand</label>
                <select name="product_brand" id="product_brand">
                    <option value="">-- Select Brand --</option>
                    <?php
                    $brand = "SELECT * FROM tblbrand";
                    $brand_result = mysqli_query($conn, $brand);
                    if (mysqli_num_rows($brand_result) > 0) {
                        while ($row = mysqli_fetch_assoc($brand_result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    ?>
                </select> <br> <br>
            </div>

            <!-- name -->
            <div>
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" placeholder="Product Name"> <br> <br>
            </div>

            <!-- color fetch from tblcolor in checkboxes -->
            <!-- <div>
                <label for="color">Color</label>
                <?php
                // $color = "SELECT * FROM tblcolor ORDER BY name ASC";
                // $color_result = mysqli_query($conn, $color);
                // if (mysqli_num_rows($color_result) > 0) {
                //     while ($row = mysqli_fetch_assoc($color_result)) {
                //         echo '<input type="checkbox" name="color[]" value="' . $row['id'] . '">' . $row['name'] . '  ';
                //     }
                // }
                ?> <br> <br>
            </div> -->

            <!-- storage fetch from tblstorage in checkboxes -->
            <!-- <div>
                <label for="storage">Storage</label>
                <?php
                // $storage = "SELECT * FROM tblstorage ORDER BY id ASC";
                // $storage_result = mysqli_query($conn, $storage);
                // if (mysqli_num_rows($storage_result) > 0) {
                //     while ($row = mysqli_fetch_assoc($storage_result)) {
                //         echo '<input type="checkbox" name="storage[]" value="' . $row['id'] . '">' . $row['storage'] . '  ';
                //     }
                // }
                ?> <br> <br>
            </div> -->

            <!-- description -->
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea> <br> <br>
            </div>

            <!-- price -->
            <!-- <div>
                <label for="price">Price</label>
                <input type="text" name="price" id="price" placeholder="Price"> <br> <br>
            </div>   -->

            <!-- stock -->
            <!-- <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" placeholder="Stock"> <br> <br>
            </div> -->

            <!-- image -->
            <div>
                <label for="image">Image</label>
                <input type="file" accept="image/*" name="image" id="image"> <br> <br>
            </div>

            <!-- submit -->
            <div>
                <input type="submit" name="addproduct" value="Add Product" class="cursor-pointer bg-black text-base text-white p-2">
                <a href="ap_product.php"><button type="button" id="back" class="bg-black p-2 text-white text-base">Back</button></a>
            </div>

        </form>
    </div>

    <script>
        // Validation
        $(document).ready(function() {
            $('#product_form').validate({
                rules: {
                    product_brand: {
                        required: true
                    },
                    product_name: {
                        required: true,
                        number: false
                    },
                    description: {
                        required: true
                    },
                    // price: {
                    //     required: true
                    // },
                    // stock: {
                    //     required: true
                    // },
                    //color: {
                    //    required: true
                    //},
                    storage: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                messages: {
                    product_brand: {
                        required: "Please Select a Brand"
                    },
                    product_name: {
                        required: "Please Enter a Product Name",
                        number: "Please Enter a Valid Product Name"
                    },
                    description: {
                        required: "Please Enter a Description"
                    },
                    // price: {
                    //     required: "Please Enter a Price"
                    // },
                    // stock: {
                    //     required: "Please Enter a Stock"
                    // },
                    // color: {
                    //     required: "Please Select a Color"
                    // },
                    storage: {
                        required: "Please Select a Storage"
                    },
                    image: {
                        required: "Please Select an Image"
                    }
                }
            });
        });
    </script>
</body>

</html>

<?php
if (isset($_POST['addproduct'])) {
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    // $price = $_POST['price'];
    // $stock = $_POST['stock'];
    $color = $_POST['color'];
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
                echo '<script>location.href="ap_product.php"</script>';
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