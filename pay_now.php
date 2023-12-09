

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<button id="payBtn">Pay Now</button>
<form method="post" >

    <button id="payBtn" name="submit">COD</button>
</form>
<?php


if (isset($_POST['submit'])) {

    $flat = $_POST['flatno'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['pincode'];


    $finaladdress = $flat . ' , ' . $street . ' , ' . $area . ' , ' . $landmark . ' , ';

    // generate random order id of 8 digit
    $orderid = rand(10000000, 99999999);
    $userid = '99';
    $odr = "update tblorders set OrderNumber='$orderid',IsOrderPlaced='1', payment_mode='COD' where UserId='$userid' and IsOrderPlaced is null or NULL;";

    // $address = "insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City) values('$userid','$orderno','$fnaobno','$street','$area','$landmark','$city');";
    $rodr = mysqli_query($con, $odr);

    $pp = mysqli_fetch_array($rodr);
    $qty = $pp['prdQty'];
    $ppu = $pp['prdPrice'];
    $total = $qty * $ppu;

    // id CustId OrderDate DeliveryAddress Total DeliveryStatus
    // $sql = "INSERT INTO tblorders(UserId, OrderNumber, PrdId, PrdQty, OrderDate, DeliveryAddress, Total, DeliveryStatus) VALUES ('$userid','$orderid','$qty','$ppu',now(),'$finaladdress','$total',NUll)";
    // echo "<script>alert('Order Placed of and inserted' $total);</script>";

    $sql = "INSERT INTO `tblorderaddresses`(`UserId`, `Ordernumber`, `Email`, `ContactNo`, `FlatOrBuildingNo`, `StreetName`, `Area`, `Landmark`, `State`, `City`, `Zip`) VALUES ('1','852403860','$email','$number','$flat','$street','$area','$landmark','$state','$city','$zip')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Order Placed Successfully');</script>";
    } else {
        echo "<script>alert('Order Failed');</script>";
    }
}
?>


<script>
    var options = {
        key: 'rzp_test_56KBjCtkBBuhvk', // Replace with your actual test key
        amount: 50000, // Example amount in paise (50 INR)
        currency: 'INR',
        name: 'Vishwas Enterprise',
        description: 'Testing',
        image: 'prj_img/bgg.jpg', // Optional
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

    document.getElementById('payBtn').onclick = function() {
        rzp.open();
    };
</script>