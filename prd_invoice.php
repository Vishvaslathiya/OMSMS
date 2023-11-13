<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6 d-flex">
                                <img src="images/logo.svg" width=250px>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #550</p>
                                <p class="text-muted">Due to: 4 Dec, 2019</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Client Information</p>
                                <p class="mb-1">John Doe, Mrs Emma Downson</p>
                                <p>Acme Inc</p>
                                <p class="mb-1">Berlin, Germany</p>
                                <p class="mb-1">6781 45P</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>LTS Versions</td>
                                            <td>21</td>
                                            <td>$321</td>
                                            <td>$3452</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>Support</td>
                                            <td>234</td>
                                            <td>$6356</td>
                                            <td>$23423</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>Sofware Collection</td>
                                            <td>4534</td>
                                            <td>$354</td>
                                            <td>$23434</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="d-flex justify-content-end bg-dark text-white p-4">
                            
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-light">$32,432</div>
                            </div>
                           
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">$234,234</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php
            include_once("includes/Footer.php");
       ?>

    </div>




</body>

</html>