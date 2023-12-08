<?php
// session_start();
require_once("includes/dbconnection.php");
include_once("preloader.php");
?>

<nav class="bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-600">
    <div class="max-w-screen flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="omsms.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/favicon.png" class="h-8" alt="Mobile Shop" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Mobile Shop</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="images/user-circle.svg" alt="user photo">
            </button>
            <?php
            if (isset($_SESSION['uid'])) {
            ?>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none divide-y  rounded-lg shadow bg-gray-700 divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <?php
                        $select  = "SELECT * FROM tbluser WHERE id = '$_SESSION[uid]'";
                        $run = mysqli_query($con, $select);
                        $row = mysqli_fetch_array($run);
                        ?>
                        <span class="block text-sm text-white"> <?php echo $row['name'] ?></span>
                        <span class="block text-sm truncate text-gray-400"> <?php echo $_SESSION['user_email'] ?> </span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="profile.php?uid=<?php echo $_SESSION['uid'] ?>" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="logout.php" id="signout" class="block px-4 py-2 text-sm hover:cursor-pointer hover:bg-gray-600 text-gray-200 hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none divide-y  rounded-lg shadow bg-gray-700 divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-white">Welcome to Mobile Shop</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="registration.php" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Sign up</a>
                        </li>
                        <li>
                            <a href="login.php" class="block px-4 py-2 text-sm hover:cursor-pointer hover:bg-gray-600 text-gray-200 hover:text-white">Sign in</a>
                        </li>
                    </ul>
                </div>
            <?php
            }
            ?>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-900 border-gray-700">
                <li>
                    <a href="omsms.php" class="<?php echo ($current_page === "omsms.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0 md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Home</a>
                </li>
                <li>
                    <a href="view_all_product.php" class="<?php echo ($current_page === "view_all_product.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0  md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Products</a>
                </li>
                <li>
                    <a href="checkout.php" class="<?php echo ($current_page === "cart.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0  md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Cart</a>
                </li>
                <li>
                    <a href="#" class="<?php echo ($current_page === "orders.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0  md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Orders</a>
                </li>
                <li>
                    <a href="cust_aboutus.php" class="<?php echo ($current_page === "cust_aboutus.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0 md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">About Us</a>
                </li>
                <li>
                    <a href="cust_contactus.php" class="<?php echo ($current_page === "cust_contactus.php" ? 'text-blue-500' : 'text-white') ?> block py-2 px-3 rounded md:p-0 md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>