<?php
// session_start();
require_once('includes/dbconnection.php');
// include_once("mail_config.php");
include_once("preloader.php");


if (isset($_POST['cod'])) {


    $flat = $_POST['flatno'];
    $street = $_POST['streetname'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['pincode'];
    $time = date('Y/m/d H:i:s');


    $orderid = rand(10000000, 999999999);
    $userid = '5';
    $city_state = $city . ',' . $state;
    $odr = "update tblorders set OrderNumber='$orderid',IsOrderPlaced='1', payment_mode='COD' where UserId='$userid' and IsOrderPlaced is null or NULL;";
    $rodr = mysqli_query($con, $odr);

    $sql = "INSERT INTO tblorderaddresses(UserId, Ordernumber, Flatnobuldngno, StreetName, Area, Landmark, City, OrderTime, OrderFinalStatus)
        VALUES ('$userid', '$orderid', '$flat', '$street', '$area', '$landmark', '$city', '$time', null)";


    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Order Placed Successfully',$orderid);</script>";
    } else {
        echo "<script>alert('Order Failed');</script>";
    }
}


// if (isset($_POST['online'])) {


//     $flat = $_POST['flatno'];
//     $street = $_POST['streetname'];
//     $area = $_POST['area'];
//     $landmark = $_POST['landmark'];
//     $state = $_POST['state'];
//     $city = $_POST['city'];
//     $zip = $_POST['pincode'];
//     $time = date('Y/m/d H:i:s');


//     $orderid = rand(10000000, 999999999);
//     $userid = '5';
//     $city_state = $city . ',' . $state;
//     $odr = "update tblorders set OrderNumber='$orderid',IsOrderPlaced='17', payment_mode='Online' where UserId='$userid' and IsOrderPlaced is null or NULL;";
//     $rodr = mysqli_query($con, $odr);

//     $sql = "INSERT INTO tblorderaddresses(UserId, Ordernumber, Flatnobuldngno, StreetName, Area, Landmark, City, OrderTime, OrderFinalStatus)
//         VALUES ('$userid', '$orderid', '$flat', '$street', '$area', '$landmark', '$city', '$time', null)";


//     $result = mysqli_query($con, $sql);
//     if ($result) {
//         echo "<script>alert('Order Placed Successfully',$orderid);</script>";
//     } else {
//         echo "<script>alert('Order Failed');</script>";
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>


    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- error -->
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include_once("cust_navbar.php");
    ?>
    <div class="mt-20">
        <h1 class="flex items-center justify-center font-bold text-blue-600 text-md lg:text-3xl">Checkout
        </h1>
    </div>
    <div class="container p-12 mx-auto">
        <div class="flex flex-col px-0 mx-auto md:flex-row">
            <div class="flex flex-col md: w-[80%] mr-8">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Shipping Address
                </h2>
                <form class="justify-center w-full mx-auto" method="post" id="Checkout" ">
                    <div class="">

                        <div class=" mt-4">
                    <div class="w-full">
                        <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                        <input name="email" type="email" placeholder="Email" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                    </div>
            </div>

            <div class="space-x-0 lg:flex lg:space-x-4">
                <div class="mt-4 w-full lg:w-1/2">
                    <label for="flatno" class="block mb-3 text-sm font-semibold text-gray-500">Flat or Bulding Number</label>
                    <input name="flatno" type="text" placeholder="eg. B-202" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
                <div class="mt-4 w-full lg:w-1/2 ">
                    <label for="streetname" class="block mb-3 text-sm font-semibold text-gray-500">Street Name</label>
                    <input name="streetname" type="text" placeholder="eg. abc Residency" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
            </div>
            <div class="space-x-0 lg:flex lg:space-x-4">
                <div class="mt-4 mb-4 w-full lg:w-1/2">
                    <label for="area" class="block mb-3 text-sm font-semibold text-gray-500">Area</label>
                    <input name="area" type="text" placeholder="eg. New Delhi" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
                <div class="mt-4 mb-4 w-full lg:w-1/2 ">
                    <label for="landmark" class="block mb-3 text-sm font-semibold text-gray-500">Landmark</label>
                    <input name="landmark" type="text" placeholder="eg. near ABC School" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
            </div>
            <div class="space-x-0 lg:flex lg:space-x-4">
                <div class="w-full lg:w-1/2">
                    <label for="city" class="block mb-3 text-sm font-semibold text-gray-500">City</label>

                    <input name="city" type="text" placeholder="City" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="state" class="block mb-3 text-sm font-semibold text-gray-500">State</label>
                    <input name="state" type="text" placeholder="State" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                        Postcode</label>
                    <input name="pincode" type="text" pattern="\d{6}" title="Please enter a 6-digit number" placeholder="Post Code" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" required="true" maxlength="6">
                </div>


            </div>

            <div class="relative pt-3 xl:pt-6"><label for="note" class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                    (Optional)</label><textarea name="note" class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600" rows="4" placeholder="Notes for delivery"></textarea>
            </div>


            <div class="space-x-0 mt-4 lg:flex lg:space-x-4">
            <label for="cod" >COD</label>
                    <input name="cod" type="radio" placeholder="" checked='true'>
                    <label for="online" >Online</label>
                    <input name="online" type="radio" placeholder="eg. near ABC School" >

            </div>

            <div class="flex mt-2 mb-4">

                <input id="payBtn" class="flex-1 mt-4 ml-2 w-60 px-6 py-2 rounded-[20px] text-white bg-blue-600 hover:bg-blue-900" name="online" value="Pay Now" onclick="paynow()" type="submit">

            </div>


        </div>
        </form>
    </div>



    <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
        <div class="pt-12 md:pt-0 2xl:ps-4">
            <h2 class="text-xl font-bold">Order Summary
            </h2>
            <div class="mt-8">
                <div class="flex flex-col space-y-4">

                    <?php
                    $userid = '5';

                    // Connect to the database
                    if (mysqli_connect_errno()) {
                        echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
                    }


                    $query = mysqli_query($con, "SELECT o.ID as frid, p.imageName as Image, p.name as prdName, pd.price as prdPrice, o.PrdQty as PrdQty  FROM tblorders o JOIN tblproduct p ON o.PrdId = p.id JOIN tblproductdetail pd ON p.id = pd.pid WHERE o.UserId = '5' AND (o.IsOrderPlaced IS NULL OR o.IsOrderPlaced = 0)");

                    $num = mysqli_num_rows($query);

                    $subtotal = 0;

                    if ($num > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                            <div class="flex space-x-4 mb-3" data-product-id="<?php echo $row['frid']; ?>">
                                <div>
                                    <img src="<?php echo "uploads/" . $row['Image']; ?>" alt="<?php echo $row['prdName']; ?>" class="w-60">
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold"><?php echo $row['prdName']; ?></h2>
                                    <p class="text-sm">Quantity : <?php echo $row['PrdQty']; ?></p>
                                    <p class="text-sm">Price : $<?php echo number_format($row['prdPrice'], 2); ?></p>
                                    <br>
                                    <hr style="border: 1px solid #333;">
                                    <?php echo '$' . $row['PrdQty'] * $row['prdPrice']; ?>
                                </div>
                                <div class="delete-product">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                    <?php
                            // Calculate subtotal for each item
                            $subtotal += $row['prdPrice'] * $row['PrdQty'];
                        }
                    } else {
                        echo "<script>alert('Your Cart is Empty');</script>";
                    }
                    ?>



                    <!-- Display the total section -->
                    <div class="flex flex-col space-y-4">
                        <div class="flex p-4 mt-4">
                            <h2 class="text-xl font-bold">Payment Amount</h2>
                        </div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Subtotal<span class="ml-2">$<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Shipping Tax<span class="ml-2">$0</span>
                        </div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Total<span class="ml-2">$<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js">
        </script>
        <script>
            $(document).ready(function() {
                $(".delete-product").on("click", function() {
                    // Get the product ID from the data attribute
                    var productId = $(this).closest(".flex").data("product-id");

                    // Make an AJAX request to delete the product
                    $.ajax({
                        type: "POST",
                        url: "delete_prd_cart.php", // Replace with the actual URL handling the deletion
                        data: {
                            productId: productId
                        },
                        success: function(response) {
                            // Handle the success response, maybe refresh the page or update the UI
                            console.log("Product deleted successfully");
                        },
                        error: function(error) {
                            console.error("Error deleting product", error);
                        }
                    });
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <script>
            $(document).ready(function() {
                $("#Checkout").validate({
                    rules: {
                        'flatno': {
                            required: true,
                        },
                        'streetname': {
                            required: true,
                        },
                        'email': {
                            required: true,
                            email: true,
                        },
                        // ... more rules ...
                        'postcode': {
                            required: true,
                            pattern: /\d{6}/,
                            title: "Please enter a 6-digit number",
                            maxlength: 6,
                        },
                    },
                    messages: {
                        'flatno': {
                            required: "Please enter your Flat Number",
                        },
                        'streetname': {
                            required: "Please enter your Street Name",
                        },
                        // ... more messages ...
                        'postcode': {
                            required: "Please enter your Postcode",
                            pattern: "Please enter a valid 6-digit number",
                            title: "Please enter a 6-digit number",
                            maxlength: "Please enter a valid 6-digit number",
                        },
                    }
                });
            });
        </script>


        <script>
            window.paynow = function() {
                var options = {
                    key: 'rzp_test_56KBjCtkBBuhvk', // Replace with your actual test key
                    amount: 50000, // Amount in paise (50 INR)
                    currency: 'INR',
                    name: 'Mobile Shop',
                    description: 'Testing',
                    image: 'images/', // Optional
                    handler: function(response) {
                        alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);



                    },
                    prefill: {
                        name: 'John Doe',
                        email: 'john@example.com',
                        contact: '9876543210'
                    },
                    notes: {
                        address: 'Hello World'
                    },
                    theme: {
                        color: '#F37254'
                    }
                };

                var rzp = new Razorpay(options);
                rzp.open();

                document.getElementById('payBtn').onclick = function() {
                    var email = document.getElementById('email').value;
                    var flatno = document.getElementById('flatno').value;
                    var streetname = document.getElementById('streetname').value;
                    var area = document.getElementById('area').value;
                    var landmark = document.getElementById('landmark').value;
                    var city = document.getElementById('city').value;
                    var state = document.getElementById('state').value;
                    var pincode = document.getElementById('pincode').value;
                    // var total = document.getElementById('total').value;

                    if (email == "" || flatno == "" || streetname == "" || area == "" || landmark == "" || city == "" || state == "" || pincode == "") {
                        alert("Please fill all the fields");
                    } else {

                        <?php
                        $flat = $_POST['flatno'];
                        $street = $_POST['streetname'];
                        $area = $_POST['area'];
                        $landmark = $_POST['landmark'];
                        $state = $_POST['state'];
                        $city = $_POST['city'];
                        $zip = $_POST['pincode'];
                        $time = date('Y/m/d H:i:s');


                        $orderid = rand(10000000, 999999999);
                        $userid = '5';
                        $city_state = $city . ',' . $state;
                        $odr = "update tblorders set OrderNumber='$orderid',IsOrderPlaced='1', payment_mode='Online' where UserId='$userid' and IsOrderPlaced is null or NULL;";
                        $rodr = mysqli_query($con, $odr);

                        $sql = "INSERT INTO tblorderaddresses(UserId, Ordernumber, Flatnobuldngno, StreetName, Area, Landmark, City, OrderTime, OrderFinalStatus)
                         VALUES ('$userid', '$orderid', '$flat', '$street', '$area', '$landmark', '$city', '$time', null)";


                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            echo "<script>alert('Order Placed Successfully',$orderid);</script>";
                        } else {
                            echo "<script>alert('Order Failed');</script>";
                        }
                        ?>
                        // rzp.open();
                    }
                };
            }
        </script>
    </div>
    </div>
    </div>
    <?php
    include_once("cust_footer.php");
    ?>

</body>

</html>