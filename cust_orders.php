<?php
// include "includes/dbconnection.php";
// $conn = mysqli_connect("localhost", "root", "", "omsms");
$current_page = 'omsms.php';
require_once('includes/dbconnection.php');
// if (!isset($_SESSION['uid'])) {
//     // header('location: registration.php');
//     echo "<script>alert('Login to view Your Orders'); location.href='omsms.php'</script>";
// }
// $con = mysqli_connect("localhost", "root", "", "project");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- flowbite css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include_once("cust_navbar.php");
    ?>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "omsms");
                    $uid = 5;
                    // $uid = $_SESSION['uid'];
                    $query = mysqli_query($con, "select * from  tblorderaddresses  where UserId='$uid'");
                    $count = 1;
                    $num = mysqli_num_rows($query);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_array($query)) { ?>



                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $count; ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $row['Ordernumber']; ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['OrderFinalStatus']; ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['OrderTime']; ?>


                                </td>
                                <td class="px-6 py-4">
                                    <a href="cust_view_order_details.php?onumber=<?php echo $row['Ordernumber']; ?>"  title="Order Detail" itemprop="url" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Details</a>
                                </td>

                            </tr>



                        <?php
                            $count = $count + 1;
                        } ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>



<?php } else { ?>
    <h5 style="color:red">No order found</h5>
<?php } ?>
</div>



</html>
<?php
require_once 'cust_footer.php';
?>