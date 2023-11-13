<?php
$current_page = 'ap_product.php';
require 'ap_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
        .dataTables_length select {
            width: 3.5rem;
        }
    </style>
</head>

<body>
    <div class="w-[90%] absolute right-0 px-2 pt-14">
        <div>
            <button id="addproduct" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">+ Add Product</button>
            <button id="addstock" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">+ Add Product Details</button>
        </div>

        <!-- fetching product in table -->
        <div class="relative flex flex-col w-full min-w-0 mb-0 mt-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table id="tableData" class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-400 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400">Product</th>
                                <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-400 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400">Brand</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-400 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400">Description</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-400 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400">Status</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-400 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product = "SELECT * FROM tblproduct";
                            $product_result = mysqli_query($conn, $product);
                            if (mysqli_num_rows($product_result) > 0) {
                                while ($row = mysqli_fetch_assoc($product_result)) {
                                    echo "<tr>";
                                    echo "<td class='p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent'>";
                                    echo "<div class='flex px-2 py-1 justify-center'>";
                                    echo "<div class='flex flex-col justify-center text-center'>";
                                    echo "<h6 class='mb-0 leading-normal text-base'>" . $row["name"] . "</h6>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    $brand = "SELECT * FROM tblbrand WHERE id =" . $row["bid"] . "";
                                    $brand_result = mysqli_query($conn, $brand);
                                    $brand_row = mysqli_fetch_assoc($brand_result);
                                    echo "<td class='p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent'>";
                                    echo "<div class='flex px-2 py-1 justify-center'>";
                                    echo "<div class='flex flex-col justify-center text-center'>";
                                    echo "<h6 class='mb-0 leading-normal text-base'>" . $brand_row["name"] . "</h6>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td class='p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent'>";
                                    echo "<div class='flex px-2 py-1 justify-center'>";
                                    echo "<div class='flex flex-col justify-center text-center'>";
                                    echo "<h6 class='mb-0 leading-normal text-base'>" . $row["description"] . "</h6>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td class='p-2 leading-normal text-center align-middle bg-transparent border-b text-base whitespace-nowrap shadow-transparent'>";
                                    $status = $row["status"];
                                    if ($status == 0) {
                                        $status = "Inactive";
                                        echo "<a id='inactive' href='ap_product.php?iaid=" . $row['id'] . "' class='bg-gradient-to-tl from-red-600 to-rose-800 hover:from-emerald-500 hover:to-teal-400 px-3 text-sm rounded-md py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:cursor-pointer'>" . $status . "</a>";
                                    } else {
                                        $status = "Active";
                                        echo "<a id='active' href='ap_product.php?aid=" . $row['id'] . "' class='bg-gradient-to-tl from-emerald-500 to-teal-400 hover:from-red-600 hover:to-rose-800 px-3 text-sm rounded-md py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:cursor-pointer'>" . $status . "</a>";
                                    }
                                    echo "</td>";
                                    echo "<td class='p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent space-x-1'>";
                                    echo "<a href='edit_product.php?eid=" . $row["id"] . "' class='font-semibold leading-tight text-sm text-white px-2 py-2 rounded-md bg-stone-500 hover:bg-stone-700'> Edit </a>";
                                    echo "<a href='edit_product.php?esid=" . $row["id"] . "' class='font-semibold leading-tight text-sm text-white px-2 py-2 rounded-md bg-stone-500 hover:bg-stone-700'> Edit Details </a>";
                                    echo "<a href='edit_product.php?did=" . $row["id"] . "' class='font-semibold leading-tight text-sm text-white px-2 py-2 rounded-md bg-red-500 hover:bg-red-600'> Delete </a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='5' class='p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent'>";
                                echo "<div class='flex px-2 py-1 justify-center'>";
                                echo "<div class='flex flex-col justify-center text-center'>";
                                echo "<h6 class='mb-0 leading-normal text-base'>No Data</h6>";
                                echo "</div>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("addproduct").onclick = function() {
            location.href = "add_product.php";
        };

        document.getElementById("addstock").onclick = function() {
            location.href = "add_detail.php";
        };

        // pagination
        $(document).ready(function() {
            // Initialize DataTable on your table
            var dataTable = $('#tableData').DataTable({
                "pagingType": "full_numbers",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                language: {
                    searchPlaceholder: "Search Brand Customer",
                },
                "ordering": true,
                "info": true,
                responsive: true,
                "autoWidth": false,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        });
    </script>
</body>

</html>

<?php
// Ative and Inactive
if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $sql = "UPDATE tblproduct SET status = 0 WHERE id = $aid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "<script> alert('Product is now Inactive'); </script>";
        echo "<script>toastr.success('Product is now Inactive')</script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    }
}

if (isset($_GET['iaid'])) {
    $iaid = $_GET['iaid'];
    $sql = "UPDATE tblproduct SET status = 1 WHERE id = $iaid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "<script> alert('Product is now Active'); </script>";
        echo "<script>toastr.success('Product is now Active')</script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    } else {
        echo "<script> alert('Error'); </script>";
        echo "<script> window.location.href = 'ap_product.php'; </script>";
    }
}

?>