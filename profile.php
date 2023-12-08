<?php
// include "includes/dbconnection.php";
// $con = mysqli_connect("localhost", "root", "", "omsms");
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

<body>
    <?php
    include_once("cust_navbar.php");
    ?>

    <div class="py-20 flex-col space-y-5 justify-center items-center ">
        <!-- component -->
        <!-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"> -->
        <!-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"> -->

        <section class="py-1 bg-gray-50">
            <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-blueGray-700 text-xl font-bold">
                                My account
                            </h6>
                            <i class="ti-close" role="button" id="close"></i>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <?php
                        if (isset($_GET['uid'])) {
                            $eid = $_GET['uid'];
                            $select = "SELECT * FROM tbluser WHERE id = '$eid'";
                            $select_result = mysqli_query($con, $select);

                            if (mysqli_num_rows($select_result) > 0) {
                                $select_row = mysqli_fetch_assoc($select_result);
                                $name = $select_row['name'];
                                $email = $select_row['email'];
                                $contact = $select_row['contact'];
                                $gender = $select_row['gender'];
                                $cid = $select_row['cityid'];
                                $address = $select_row['address'];

                                //  fetch state id
                                $state = "SELECT sid FROM tblcity WHERE id = '$cid'";
                                $state_result = mysqli_query($con, $state);
                                $state_row = mysqli_fetch_assoc($state_result);
                                $sid = $state_row['sid'];
                        ?>
                                <form method="POST" name="profile_form">
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Full Name
                                                </label>
                                                <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="name" id="name" value="<?php echo $name ?>">
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Email address
                                                </label>
                                                <input type="email" class="cursor-not-allowed border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="email" id="email" value="<?php echo $email ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Contact Number
                                                </label>
                                                <input type="tel" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="contact" id="contact" value="<?php echo $contact ?>">
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Gender
                                                </label>
                                                <?php
                                                if ($gender == "male") {
                                                ?>
                                                    <div class="flex py-4 space-x-5">
                                                        <div class="flex items-center mb-4">
                                                            <input checked id="default-radio-1" type="radio" name="gender" id="gender" value="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Male</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Female</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="other" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Other</label>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else if ($gender == "female") {
                                                ?>
                                                    <div class="flex py-4 space-x-5">
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Male</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input checked id="default-radio-1" name="gender" id="gender" type="radio" value="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Female</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="other" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Other</label>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="flex py-4 space-x-5">
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Male</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input id="default-radio-1" type="radio" name="gender" id="gender" value="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Female</label>
                                                        </div>
                                                        <div class="flex items-center mb-4">
                                                            <input checked id="default-radio-1" type="radio" name="gender" id="gender" value="other" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-blueGray-600">Other</label>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-1/2 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    State
                                                </label>
                                                <!-- <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="United States"> -->
                                                <select class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="state" id="state">
                                                    <option value="">Select State</option>
                                                    <?php
                                                    $state = "SELECT * FROM tblstate";
                                                    $state_result = mysqli_query($con, $state);
                                                    if (mysqli_num_rows($state_result) > 0) {
                                                        while ($state_row = mysqli_fetch_assoc($state_result)) {
                                                            $state_id = $state_row['id'];
                                                            $state_name = $state_row['name'];
                                                            if ($state_id == $sid) {
                                                                echo "<option value='$state_id' selected>$state_name</option>";
                                                            } else {
                                                                echo "<option value='$state_id'>$state_name</option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-1/2 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    City
                                                </label>
                                                <!-- <input type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="New York"> -->
                                                <select class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="city" id="city">
                                                    <?php
                                                    $city = "SELECT * FROM tblcity WHERE sid = '$sid'";
                                                    $city_result = mysqli_query($con, $city);
                                                    if (mysqli_num_rows($city_result) > 0) {
                                                        while ($city_row = mysqli_fetch_assoc($city_result)) {
                                                            $city_id = $city_row['id'];
                                                            $city_name = $city_row['name'];
                                                            if ($city_id == $cid) {
                                                                echo "<option value='$city_id' selected>$city_name</option>";
                                                            } else {
                                                                echo "<option value='$city_id'>$city_name</option>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<option value=''>No City Found</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-12/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Address
                                                </label>
                                                <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" id="address" name="address" value="<?php echo $address ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end px-4 space-x-4">
                                        <a class="self-center text-blue-600 hover:text-blue-800" href="change_password.php">Change Password?</a>
                                        <button name="updateuser" id="updateuser" type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                    </div>
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <script>
        // cancel button
        document.getElementById("close").onclick = function() {
            location.href = "omsms.php";
        };

        // City Selection
        $("#state").change(function() {
            var stateId = $(this).val();
            if (stateId == "" || stateId == null) {
                // $("#city").prop("disabled", true);
                $("#city").html("<option value=''>Select City</option>");
            }
            $.ajax({
                type: "POST",
                url: "city_state.php",
                data: {
                    sid: stateId
                },
                success: function(response) {
                    // $("#city").prop("disabled", false);
                    $("#city").html(response);
                },
            });
        });

        // Jquery Validation
        $("#profile_form").validate({
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                },
                'contact': {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                'gender': {
                    required: true,
                },
                'state': {
                    required: true,
                },
                'city': {
                    required: true,
                },
                'address': {
                    required: true,
                },
            },
            messeges: {
                'name': {
                    required: "Please Enter Name",
                },
                'email': {
                    required: "Please Enter Email",
                    email: "Please Enter Valid Email",
                },
                'contact': {
                    required: "Please Enter Contact Number",
                    number: "Please Enter Valid Contact Number",
                    minlength: "Please Enter 10 Digit Contact Number",
                    maxlength: "Please Enter 10 Digit Contact Number",
                },
                'gender': {
                    required: "Please Select Geneder",
                },
                'state': {
                    required: "Please Select State",
                },
                'city': {
                    required: "Please Select City",
                },
                'address': {
                    required: "Please Enter Address",
                },
            }
        })
    </script>
</body>

</html>
<?php
require_once 'cust_footer.php';
?>

<?php
// update user
if (isset($_POST['updateuser'])) {
    $name = $_POST['name'];
    // $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $update = "UPDATE tbluser SET name = '$name', contact = $contact, gender = '$gender', cityid = $city, address = '$address' WHERE id = $eid";
    $update_result = mysqli_query($con, $update);
    if ($update_result) {
        // $update = "UPDATE tblcustomer SET address = '$address' WHERE uid = $eid";
        // $update_result = mysqli_query($con, $update);
        // if ($update_result) {
        echo "<script>alert('Profile Updated Successfully'); location.href = 'omsms.php';</script>";
        // } else {
        //     echo "<script> alert('Failed to Update Profile');</script>";
        // }
    } else {
        echo "<script>alert('Failed to Update Profile');</script>";
    }
}
?>