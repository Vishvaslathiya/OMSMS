<?php
$current_page = 'view_all_product.php';
// require './include/connection.php';
// require 'navbar.php';
require_once('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OMSMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />


  <!-- error -->
  <style>
    .error {
      color: red;
    }
  </style>

  <!-- tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- flowbite css -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
  <div class="bg-white">
    <div class="pt-6">

      <?php
      $pid = $_GET['pid'];
      // get product
      $select_prod = "SELECT * FROM tblproduct WHERE id = '$pid'";
      $prod_result = mysqli_query($con, $select_prod);
      $row = mysqli_fetch_assoc($prod_result);

      // get product details
      $select_prod_details = "SELECT * FROM tblproductdetail WHERE pid = '$pid'";
      $prod_details_result = mysqli_query($con, $select_prod_details);
      $row_details = mysqli_fetch_assoc($prod_details_result);
      ?>
      <!-- Image gallery -->
      <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 border-2 border-gray-400">
        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
          <img src="<?php echo $row['imageName'] ?>" alt="Mobile Phone Image." class="h-full w-full object-cover object-center">
        </div>

        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
          <!-- Product info -->
          <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6">
            <!-- Options -->
            <div class="px-5 sm:px-10 md:px-20">
              <form method="post" name="addtocart_form">
                <div class="space-y-4">
                  <div class="flex justify-between">
                    <!-- name -->
                    <input type="hidden" name="pid" id="pid" value="<?php echo $pid ?>">
                    <h1 class="text-3xl font-bold" name="product_name" id="product_name" value="<?php echo $pid ?>"><?php echo $row['name'] ?></h1>
                    <div class="hidden lg:block">
                      <i class="ti-close" role="button" id="close"></i>
                    </div>
                  </div>

                  <!-- brand -->
                  <?php
                  // get brand name
                  $bid = $row['bid'];
                  $get_brand_name = "SELECT * FROM tblbrand WHERE id = '$bid'";
                  $brand_name_result = mysqli_query($con, $get_brand_name);
                  $brand = mysqli_fetch_assoc($brand_name_result)['name'];
                  ?>
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold"><?php echo $brand ?></h2>
                  </div>

                  <!-- storage -->
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold">Storage</h2>
                    <div class="justify-center grid grid-cols-2 md:grid-cols-3 gap-2">
                      <?php
                      $select_prod_details1 = "SELECT distinct sid FROM tblproductdetail WHERE pid = '$pid'";
                      $prod_details_result1 = mysqli_query($con, $select_prod_details1);

                      if (mysqli_num_rows($prod_details_result1) > 0) {
                        while ($row_details1 = mysqli_fetch_assoc($prod_details_result1)) {
                          $sid = $row_details1['sid'];
                          $get_storage = "SELECT * FROM tblstorage WHERE id = '$sid'";
                          $storage_result = mysqli_query($con, $get_storage);
                          if (mysqli_num_rows($storage_result) > 0) {
                            while ($storage = mysqli_fetch_assoc($storage_result)) {
                      ?>
                              <div class="item-center border p-2">
                                <input class="cursor-pointer" type="radio" class="storage" name="storage" id="storage" value="<?php echo $storage['id'] ?>"><?php echo $storage['storage'] ?>
                              </div>
                        <?php
                            }
                          }
                        }
                      } else {
                        ?>
                        <h3 text-lg font-bold>Not Available</h3>
                      <?php
                      }
                      ?>
                    </div>
                  </div>

                  <!-- color -->
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold">Color</h2>

                    <!-- <h3 class id="color" name="color"></h3> -->
                    <div id="color" name="color" disabled>
                      Not Available
                    </div>
                  </div>

                  <!-- price -->
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold">Price</h2>
                    <!-- <h3 id="price" name="price"></h3> -->
                    <!-- <div id="price" name="price" disabled>
                      Not Available
                    </div> -->
                    <div>
                      <input class="w-100 border rounded-lg" type="number" id="price" name="price" disabled>
                    </div>
                  </div>

                  <!-- description -->
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold">Description</h2>
                    <!-- <div id="description" name="description" disabled>
                      Not Available
                    </div> -->
                    <div>
                      <!-- <textarea name="description" id="description" cols="48" rows="3" disabled></textarea> -->
                      <input class="w-100 border rounded-lg" type="text" name="description" id="description" disabled>
                    </div>
                  </div>

                  <!-- quantity -->
                  <div class="border-2 rounded-lg p-2">
                    <h2 class="text-xl font-bold">Quantity</h2>
                    <!-- <input type="number" name="quantity" id="quantity" value="1" min="1" max="10"> -->
                    <div class="relative flex items-center">
                      <button type="button" id="decrement-button" data-input-counter-decrement="quantity" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                        </svg>
                      </button>
                      <input type="text" name="quantity" id="quantity" data-input-counter data-input-counter-min="1" data-input-counter-max="10" class="flex-shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="1" min="1" max="10" disabled>
                      <button type="button" id="increment-button" data-input-counter-increment="quantity" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                      </button>
                    </div>

                  </div>

                  <div class="py-2">
                    <!-- add to cart -->
                    <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery Validation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    // cancel button
    document.getElementById("close").onclick = function() {
      location.href = "view_all_product.php";
    };

    $(document).ready(function() {

      setTimeout(function() {
        $(document).find('input[name="storage"]').eq(0).prop('checked', true);
        $(document).find('input[name="storage"]').eq(0).trigger('change');
      }, 0);

      // get color
      $('input[name="storage"]').change(function() {
        var sid = $(this).val();
        var pid = $('#product_name').attr('value');
        // console.log(sid, pid);
        if (sid == "" || pid == "") {
          $("#color").html("Select Storage for Color");
          $("#price").html("Select Storage and Color for Price");
        } else {
          $.ajax({
            url: "get_prod_data.php",
            type: "POST",
            data: {
              sid: sid,
              pid: pid
            },
            success: function(data) {
              $("#color").html(data);
              // $("#color").attr("hidden", false);
              $("#color").prop("disabled", false);
              // $("#price").html("Select Storage and Color for Price");
              // $("#price").attr("hidden", true);
              $(document).find('input[name="color"]').eq(0).prop('checked', true);
              $(document).find('input[name="color"]').eq(0).trigger('change');
            }
          });
        }
      });

      // get price
      $(document).find("#color").change(function() {
        var storageid = $(document).find('input[name="storage"]:checked').val();
        // var sid = $('storage').val();
        var productid = $(document).find('#product_name').attr('value');
        var colorid = $(document).find('input[name="color"]:checked').val();
        // var colorid = $(this).val();
        // console.log("storage", storageid, "Pid", productid, "color", colorid);
        if (storageid == "" || productid == "" || colorid == "") {
          $("#price").html("select storage and color for price");
          $("#price").attr("hidden", true);
        } else {
          $.ajax({
            url: "get_prod_data.php",
            type: "POST",
            dataType: "json",
            data: {
              storageid: storageid,
              productid: productid,
              colorid: colorid
            },
            success: function(data) {
              $("#price").val(data.price);
              // $("#price").prop("disabled", false);
              $('#description').val(data.description);
              // $('#description').prop("disabled", false);
            }
          });
        }
      });
    });
  </script>
</body>

</html>