<?php
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> OMSMS </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <form class="forms-sample" id="registration_form" method="POST" enctype="multipart/form-data">

        <div class="mt-20">
            <h1 class="flex items-center justify-center font-bold text-blue-600 text-md lg:text-3xl">Checkout
            </h1>
        </div>
        <div class="container p-12 mx-auto">
            <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
                <div class="flex flex-col md:w-full">
                    <h2 class="mb-4 font-bold md:text-xl text-heading ">Shipping Address
                    </h2>
                    <form class="justify-center w-full mx-auto" method="post" action>
                        <div class="">
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">First
                                        Name</label>
                                    <input name="firstName" type="text" placeholder="First Name" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                        Name</label>
                                    <input name="Last Name" type="text" placeholder="Last Name" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                    <input name="Last Name" type="email" placeholder="Email" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true'>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Address" class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                    <textarea class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" name="Address" cols="20" rows="4" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="state" class="block mb-3 text-sm font-semibold text-gray-500">State</label>
                                    <select class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true' id="state" name="state">
                                        <option value="">Select State</option>
                                        <?php
                                        $state = "SELECT * FROM tblstate";
                                        $state_result = mysqli_query($con, $state);
                                        if (mysqli_num_rows($state_result) > 0) {
                                            while ($row_state = mysqli_fetch_assoc($state_result)) {
                                        ?>
                                                <option value="<?php echo $row_state['id'] ?>"><?php echo $row_state['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="w-full lg:w-1/2">
                                    <label for="state" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                    <select class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 " required='true' id="city" name="city" disabled>
                                        <option value="">Select State First</option>
                                    </select>

                                </div>
                                <div class="w-full lg:w-1/2">
                                    <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Postcode</label>
                                    <input name="postcode" type="text" pattern="\d{6}" title="Please enter a 6-digit number" placeholder="Post Code" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" required="true" maxlength="6">
                                </div>


                            </div>

                            <div class="relative pt-3 xl:pt-6"><label for="note" class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                                    (Optional)</label><textarea name="note" class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600" rows="4" placeholder="Notes for delivery"></textarea>
                            </div>
                            <div class="flex mt-2">
                                <input class="flex-1 mt-4 ml-2 w-60 px-6 py-2 rounded-[20px] text-white bg-blue-600 hover:bg-blue-900" value="Continue to Payment" type="submit">
                                <button class="flex-1 mt-4 ml-2 w-60 px-6 py-2 text-blue-200 hover:text-white bg-blue-600 hover:bg-blue-900 relative">
                                    <span class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('includes/pay-mthd-img.jpg');"></span>
                                    <span class="relative z-10"></span>
                                </button>

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
                                <div class="flex space-x-4">
                                    <div>
                                        <img src="https://source.unsplash.com/user/erondu/1600x900" alt="image" class="w-60">
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold">Title</h2>
                                        <p class="text-sm">Lorem ipsum dolor sit amet, tet</p>
                                        <span class="text-red-600">Price</span> $20
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <div>
                                        <img src="https://source.unsplash.com/collection/190727/1600x900" alt="image" class="w-60">
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold">Title</h2>
                                        <p class="text-sm">Lorem ipsum dolor sit amet, tet</p>
                                        <span class="text-red-600">Price</span> $20
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex p-4 mt-4">
                            <h2 class="text-xl font-bold">ITEMS 2</h2>
                        </div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Subtotal<span class="ml-2">$40.00</span></div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Shipping Tax<span class="ml-2">$10</span></div>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Total<span class="ml-2">$50.00</span></div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script src="vendors/js/vendor.bundle.base.js"></script>

    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        toastr.options = {
            "positionClass": "toast-top-center",
            "timeOut": 2000, // 2 seconds
            "extendedTimeOut": 1000, // 1 second extended time on hover
            "closeButton": true,
            "progressBar": true,
            "debug": false,
            "showDuration": 300,
            "hideDuration": 1000,
        };
        // toastr.success("Success.....!")
    </script>

    <script>
        // cancel button
        document.getElementById("close").onclick = function() {
            location.href = "omsms.php";
        };

        // City Selection
        $("#state").change(function() {
            var stateId = $(this).val();
            // console.log(stateId);
            if (stateId === "") {
                $("#city").html("<option value=''>Select State First</option>");
                $("#city").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "registration.php",
                    data: {
                        sid: stateId
                    },
                    success: function(response) {
                        $("#city").prop("disabled", false);
                        $("#city").html(response);
                    },
                });
            }
        });

        // Form Validation
        $("#registration_form").validate({
            rules: {
                'role': {
                    required: true,
                },
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                },
                'password': {
                    required: true,
                },
                'confpassword': {
                    required: true,
                    equalTo: "#password",
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
            },
            messeges: {
                'role': {
                    required: "Please Select Role",
                },
                'name': {
                    required: "Please Enter Name",
                },
                'email': {
                    required: "Please Enter Email",
                },
                'password': {
                    required: "Please Enter Password",
                },
                'confpassword': {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password not match",
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
            }
        })
    </script>
</body>

</html>


<?php
// City Selection
if (isset($_POST['sid'])) {
    $stateId = $_POST['sid'];
    $sql = "SELECT * FROM tblcity WHERE sid = $stateId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value=''>-- Select a City --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Cities Found --</option>";
    }
}
?>
