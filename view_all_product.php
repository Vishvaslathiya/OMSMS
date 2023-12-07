<?php
$current_page = 'view_all_product.php';
// require './include/connection.php';
// require 'navbar.php';
require_once('includes/dbconnection.php');
?>

<?php

$page_no = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 8;
$offset = ($page_no - 1) * $limit;

$sql = "SELECT COUNT(*) FROM tblproduct";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$count = ceil($row[0] / $limit);

$sql = "SELECT * FROM tblproduct LIMIT $offset, $limit";
$result = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OMSMS</title>
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- error -->
    <style>
        .error {
            color: red;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- flowbite css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>



<body>
    <?php
    include_once("cust_navbar.php");
    ?>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">
        <!-- <div class="row">
            <?php // foreach ($result as $key => $product) { 
            ?>
                <div class="col-md-3">
                    Product
                    <?php // echo $product['name'] 
                    ?>
                </div>
            <?php // } 
            ?>
        </div> -->

        <div class="space-y-12">
            <div>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <section id="Projects" class="w-fit mx-auto grid grid-cols-3 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            $pid = $row['id'];

                            // get brand name
                            $bid = $row['bid'];
                            $get_brand_name = "SELECT * FROM tblbrand WHERE id = '$bid'";
                            $brand_name_result = mysqli_query($con, $get_brand_name);
                            $brand = mysqli_fetch_assoc($brand_name_result)['name'];
                        ?>
                            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl hover:cursor-pointer">

                                <!-- redirect to view page -->
                                <a href="view_product_details.php?pid=<?php echo $pid ?>">
                                    <!-- image -->
                                    <img src="<?php echo $row['imageName'] ?>" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                                    <!-- </a> -->

                                    <div class="px-4 py-3 w-72">
                                        <!-- brand name -->
                                        <span class="text-gray-600 font-bold mr-3 uppercase text-sm"><?php echo $brand ?></span>

                                        <!-- product name -->
                                        <p class="text-lg font-bold text-black truncate block capitalize"><?php echo $row['name'] ?></p>

                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </section>
                <?php
                }
                ?>
            </div>
            <!-- component -->
            <div class="flex w-full justify-center ">
                <ul class="flex items-center border border-[#e4e4e4]  bg-white p-4 rounded-xl">
                    <?php
                    if ($page_no != 1) {
                        echo "<li class='px-[6px]'>";
                        echo "<a href='view_all_product.php?page=" . ($page_no - 1) . "' class=' w-9 h-9 flex items-center justify-center rounded-md border border-[#EDEFF1] text-[#838995] text-base hover:bg-primary hover:border-primary hover:text-white'>
                        <span>
                            <svg width='8' height='15' viewBox='0 0 8 15' class='fill-current stroke-current'>
                                <path d='M7.12979 1.91389L7.1299 1.914L7.1344 1.90875C7.31476 1.69833 7.31528 1.36878 7.1047 1.15819C7.01062 1.06412 6.86296 1.00488 6.73613 1.00488C6.57736 1.00488 6.4537 1.07206 6.34569 1.18007L6.34564 1.18001L6.34229 1.18358L0.830207 7.06752C0.830152 7.06757 0.830098 7.06763 0.830043 7.06769C0.402311 7.52078 0.406126 8.26524 0.827473 8.73615L0.827439 8.73618L0.829982 8.73889L6.34248 14.6014L6.34243 14.6014L6.34569 14.6047C6.546 14.805 6.88221 14.8491 7.1047 14.6266C7.30447 14.4268 7.34883 14.0918 7.12833 13.8693L1.62078 8.01209C1.55579 7.93114 1.56859 7.82519 1.61408 7.7797L1.61413 7.77975L1.61729 7.77639L7.12979 1.91389Z' stroke-width='0.3'></path>
                            </svg>
                        </span>
                    </a>";
                        echo "</li>";
                    }
                    for ($i = 1; $i <= $count; $i++) {
                        if ($page_no != $i) {
                            echo "<li class='px-[6px]'>";
                            echo "<a href='view_all_product.php?page=$i' class=' w-9 h-9 flex items-center justify-center rounded-md border border-[#EDEFF1] text-[#838995] text-base hover:bg-primary hover:border-primary hover:text-white '> $i </a>";
                            echo "</li>";
                        }
                    }
                    if ($page_no != $count) {
                        echo "<li class='px-[6px]'>";
                        echo "<a href='view_all_product.php?page=" . ($page_no + 1) . "' class=' w-9 h-9 flex items-center justify-center rounded-md border border-[#EDEFF1] text-[#838995] text-base hover:bg-primary hover:border-primary hover:text-white '>
                    <span>
                        <svg width='8' height='15' viewBox='0 0 8 15' class='fill-current stroke-current'>
                            <path d='M0.870212 13.0861L0.870097 13.086L0.865602 13.0912C0.685237 13.3017 0.684716 13.6312 0.895299 13.8418C0.989374 13.9359 1.13704 13.9951 1.26387 13.9951C1.42264 13.9951 1.5463 13.9279 1.65431 13.8199L1.65436 13.82L1.65771 13.8164L7.16979 7.93248C7.16985 7.93243 7.1699 7.93237 7.16996 7.93231C7.59769 7.47923 7.59387 6.73477 7.17253 6.26385L7.17256 6.26382L7.17002 6.26111L1.65752 0.398611L1.65757 0.398563L1.65431 0.395299C1.454 0.194997 1.11779 0.150934 0.895299 0.373424C0.695526 0.573197 0.651169 0.908167 0.871667 1.13067L6.37922 6.98791C6.4442 7.06886 6.43141 7.17481 6.38592 7.2203L6.38587 7.22025L6.38271 7.22361L0.870212 13.0861Z' stroke-width='0.3'></path>
                        </svg>
                    </span>
                </a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- flowbite js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <?php
    require_once 'cust_footer.php';
    ?>
</body>

</html>