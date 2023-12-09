<?php
// include "includes/dbconnection.php";
// $conn = mysqli_connect("localhost", "root", "", "omsms");
$current_page = 'omsms.php';
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
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- flowbite css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-800">
    <?php
    include_once("cust_navbar.php");
    ?>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">
    </div>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">
        <section>
            <div class="bg-black text-white py-20">
                <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                    <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                        <h1 class="text-3xl md:text-5xl p-2 text-yellow-300 tracking-loose">Finding New Phone...?</h1>
                        <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">Right Place
                        </h2>
                        <p class="text-sm md:text-base text-gray-50 mb-4">Buy your favourite brand's mobiles and
                            register now to stay tuned for moblie phones news.</p>
                        <a href="view_all_product.php" class="bg-transparent hover:bg-yellow-300 text-yellow-300 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent">
                            Buy Now</a>
                    </div>
                    <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                        <div class="h-[45vh] flex flex-wrap content-center">

                            <div>
                                <img class="inline-block mt-24 md:mt-0 p-8 md:p-0" src="uploads/iphone-13-pro.png">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h1 class="text-center text-white text-4xl font-bold py-2">Featured Products</h1>

        <section>

            <div class="mx-auto grid w-full max-w-7xl items-center space-y-4 px-2 py-10 md:grid-cols-2 md:gap-6 md:space-y-0 lg:grid-cols-4">
                <div class="relative aspect-[16/9]  w-auto rounded-md md:aspect-auto md:h-[400px]">
                    <img src="prj_img/iphone-13.jpg" alt="AirMax Pro" class="z-0 h-full w-full rounded-md object-cover" />
                    <div class="absolute inset-0 rounded-md bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-left">
                        <h1 class="text-lg font-semibold text-white">iphone-13</h1>
                        <p class="mt-2 text-sm text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi,
                            debitis?
                        </p>
                        <a href= 'view_all_product.php?page=3'> <button class="mt-2 inline-flex cursor-pointer items-center text-sm font-semibold text-white">
                             Shop Now →
                        </button> </a>
                    </div>
                </div>
                <div class="relative aspect-[16/9]  w-auto rounded-md md:aspect-auto md:h-[400px]">
                    <img src="prj_img/iphone-13.jpg" alt="AirMax Pro" class="z-0 h-full w-full rounded-md object-cover" />
                    <div class="absolute inset-0 rounded-md bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-left">
                        <h1 class="text-lg font-semibold text-white">iphone-13</h1>
                        <p class="mt-2 text-sm text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi,
                            debitis?
                        </p>
                        <a href= 'view_all_product.php?page=7'> <button class="mt-2 inline-flex cursor-pointer items-center text-sm font-semibold text-white">
                             Shop Now →
                        </button> </a>
                    </div>
                </div>
                <div class="relative aspect-[16/9]  w-auto rounded-md md:aspect-auto md:h-[400px]">
                    <img src="prj_img/iphone-13.jpg" alt="AirMax Pro" class="z-0 h-full w-full rounded-md object-cover" />
                    <div class="absolute inset-0 rounded-md bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-left">
                        <h1 class="text-lg font-semibold text-white">iphone-13</h1>
                        <p class="mt-2 text-sm text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi,
                            debitis?
                        </p>
                        <a href= 'view_all_product.php?page=8'> <button class="mt-2 inline-flex cursor-pointer items-center text-sm font-semibold text-white">
                             Shop Now →
                        </button> </a>
                    </div>
                </div>
                <div class="relative aspect-[16/9]  w-auto rounded-md md:aspect-auto md:h-[400px]">
                    <img src="prj_img/iphone-13.jpg" alt="AirMax Pro" class="z-0 h-full w-full rounded-md object-cover" />
                    <div class="absolute inset-0 rounded-md bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-left">
                        <h1 class="text-lg font-semibold text-white">iphone-13</h1>
                        <p class="mt-2 text-sm text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi,
                            debitis?
                        </p>
                        <a href= 'view_all_product.php?page=10'> <button class="mt-2 inline-flex cursor-pointer items-center text-sm font-semibold text-white">
                             Shop Now →
                        </button> </a>
                    </div>
                </div>
            </div>


        </section>



        <div class="w-full p-4 text-center bg-[#000] border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-bold text-white-900 dark:text-white">Buy Our Products from anywhere</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="https://apps.apple.com/us/app/amazon-shopping/id297606951" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                    </svg>
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Download on the</div>
                        <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
                    </div>
                </a>
                <a href="https://play.google.com/store/apps/details?id=com.freemobilephoneshoppingapp.mobilephoneonlineshoppingapp" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path>
                    </svg>
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Get in on</div>
                        <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="bg-gray-900 py-16 sm:py-24 lg:py-32">
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 lg:grid-cols-12 lg:gap-8 lg:px-8">
                <div class="max-w-xl text-3xl font-bold tracking-tight text-white sm:text-4xl lg:col-span-7">
                    <h2 class="inline sm:block lg:inline xl:block">Want product news and updates?</h2>
                    <p class="inline sm:block lg:inline xl:block">Sign up for our newsletter.</p>
                </div>
                <form class="w-full max-w-md lg:col-span-5 lg:pt-2">
                    <div class="flex gap-x-4">
                        <label for="email-address" class="sr-only">Email address</label><input id="email-address" name="email" type="email" autocomplete="email" required="" class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter your email"><button type="submit" class="flex rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-gray-300">We care about your data. Read our <a href="https://www.swellai.com/privacy" class="font-semibold text-white">privacy&nbsp;policy</a>.</p>
                </form>
            </div>
        </div>



    </div>




    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>

    <script>
        $(document).ready(function() {
            // login button
            $("#login").click(function() {
                location.href = "login.php";
            });

            // logout button
            $("#logout").click(function() {
                let conf = confirm("Are you sure you want to logout?");
                if (conf) {
                    location.href = "logout.php";
                }
            });
        });
    </script>
    <!-- flowbite js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>

</html>
<?php
require_once 'cust_footer.php';
?>