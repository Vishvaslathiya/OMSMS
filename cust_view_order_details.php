<?php
// include "includes/dbconnection.php";
// $conn = mysqli_connect("localhost", "root", "", "omsms");
$current_page = 'cust_orders.php';
require_once('includes/dbconnection.php');
// $con = mysqli_connect("localhost", "root", "", "project");
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
    <!-- tailwind -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- flowbite css -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" /> -->
</head>

<body>
    <?php
    include_once("cust_navbar.php");
    ?>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">
        <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

            <div class="flex justify-start item-start space-y-2 flex-col">
                <h1 class="text-3xl dark:text-dark lg:text-4xl font-semibold leading-7 lg:leading-9 text-dark">Order #<?php echo $_GET['onumber'] ?></h1>
                <?php
                $onumber = $_GET['onumber'];
                $result = mysqli_query($con, "select tblorderaddresses.OrderTime from tblorderaddresses where OrderNumber = '$onumber' ");
                $r = mysqli_fetch_array($result)

                ?>
                <p class="text-2xl dark:text-dark font-medium leading-6 text-dark"><?php echo $r['OrderTime'] ?></p>

            </div>
            <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                    <div class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                        <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 ttext-white">Orders</p>


                        <?php
                        $pr =  mysqli_query($con, "select tblorders.PrdPrice from tblorders  WHERE tblorders.OrderNumber = '$onumber'");
                        $respr = mysqli_fetch_assoc($pr);
                        // $price_table = $respr['PrdPrice'];


                        $qur = "SELECT tblorders.*, tblproductdetail.*, tblorderaddresses.*
                                FROM tblorders
                                JOIN tblproductdetail ON tblproductdetail.pid = tblorders.PrdId
                                JOIN tblorderaddresses ON tblorderaddresses.Ordernumber = tblorders.OrderNumber
                                WHERE tblorders.OrderNumber = '$onumber'";

                        $count = 1;
                        $query = mysqli_query($con, $qur);
                        $num = mysqli_num_rows($query);
                        if ($num > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">

                                    <div class="pb-4 md:pb-8 w-full md:w-40">
                                        <?php
                                        $prod = "SELECT * FROM tblproductdetail WHERE pid = '$row[PrdId]'";
                                        $prodquery = mysqli_query($con, $prod);
                                        $prodrow = mysqli_fetch_array($prodquery);
                                        ?>
                                        <img class="w-[20%] hidden md:block" src="uploads/<?php echo $prodrow['imageName'] ?>" alt="<?php echo $prodrow['name'] ?>" />
                                        <img class="w-[20%] md:hidden" src="https://i.ibb.co/L039qbN/Rectangle-10.png" alt="<?php echo $prodrow['description'] ?>" />
                                    </div>

                                    <div class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                        <div class="w-full flex flex-col justify-start items-start space-y-8">
                                            <h3 class="text-xl dark:text-dark xl:text-2xl font-semibold leading-6 text-gray-800"><?php echo $row['name'] ?></h3>
                                            <div class="flex justify-start items-start flex-col space-y-2">
                                                <p class="text-sm dark:text-dark leading-none text-gray-800"><span class="dark:text-gray-400 text-gray-300">Brand : </span> <?php echo $row['name'] ?></p>
                                                <p class="text-sm dark:text-dark leading-none text-gray-800"><span class="dark:text-gray-400 text-gray-300">Size: </span> <?php echo $row['storage'] ?></p>
                                                <!-- <p class="text-sm dark:text-dark leading-none text-gray-800"><span class="dark:text-gray-400 text-gray-300">Color: </span> <?php echo $row['name'] ?></p> -->
                                            </div>
                                        </div>
                                        <div class="flex justify-between space-x-8 items-start w-full">
                                            <p class="text-base dark:text-dark xl:text-lg leading-6"><?php echo number_format($row['PrdPrice'], 2) ?></p>
                                            <p class="text-base dark:text-dark xl:text-lg leading-6 text-gray-800"><?php echo $row['PrdQty'] ?></p>
                                            <p class="text-base dark:text-dark xl:text-lg font-semibold leading-6 text-gray-800"><?php echo number_format($row['PrdPrice'] * $row['PrdQty'], 2) ?></p>
                                            <?php $total += $row['PrdPrice'] * $row['PrdQty'];    ?>

                                        </div>
                                    </div>
                                </div>

                    </div>
                    <div class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">

                <?php }
                        } else {
                            echo "<h5 style='color:red'>No order found</h5>";
                        }
                ?>
                <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                    <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
                    <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                        <div class="flex justify-between w-full">
                            <p class="text-base dark:text-white leading-4 text-gray-800">Subtotal</p>
                            <p class="text-base dark:text-gray-300 leading-4 text-gray-600"><?php echo number_format($total, 2) ?></p>
                        </div>

                        <div class="flex justify-between items-center w-full">
                            <p class="text-base dark:text-white leading-4 text-gray-800">Shipping</p>
                            <p class="text-xl dark:text-gray-300 leading-4  text-lime-500	">Free</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">Total</p>
                        <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600"><?php echo number_format($total, 2) ?></p>
                    </div>
                </div>

                    </div>
                </div>



            </div>
        </div>


    </div>



    <!-- flowbite js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>

</html>
<?php
require_once 'cust_footer.php';
?>