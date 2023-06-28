<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff"> -->
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
          /**
          * Reinstate scrolling for non-JS clients
          */
          .simplebar-content-wrapper {
            overflow: auto;
          }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>Library | Cart</title>
    
</head>
<body class="">
<?php include "header.php"?>
    <!-- Main Section-->
    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->

        <h1 class="mb-6 display-5 fw-bold text-center">Your Cart</h1>

        <div class="row g-4 g-md-8">
            <!-- Cart Items -->
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell"></th>
                                <th class="ps-sm-3">Title</th>
                                <th>Qty</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $con=new mysqli("localhost", "root", "", "library");
                        $st=$con->prepare("select book.id, qty, name, price, image from book inner join temp_order 
                        on book.id=temp_order.itemid where email=?");
                        $st->bind_param("s", $_SESSION["user"]);
                        $st->execute();
                        $rs=$st->get_result();
                        $total=0;
                        while($row=$rs->fetch_assoc()){
                            echo '<tr>';
                            echo '
                                <td class="d-none d-sm-table-cell">
                                    <picture class="d-block bg-light f-w-30">
                                        <img class="img-fluid" src="images/'. $row['image'] .'" alt="">
                                    </picture>
                                </td>
                            ';
                            echo '
                                <td>
                                    <div class="ps-sm-3">
                                        <h6 class="mb-2 fw-bolder">
                                            '.$row["name"].'
                                        </h6>
                                    </div>
                                </td>
                            ';
                            echo '
                                <td>
                                    <div class="px-3">
                                        <span class="small text-muted mt-1">'.$row["qty"].' @ '.$row["price"].'</span>
                                    </div>
                                    </td>
                            ';
                            echo '
                                <td class="f-h-0">
                                    <div class="d-flex justify-content-between flex-column align-items-end h-100">
                                        <a style="text-decoration:none;" href="delete_item.php?id='.$row["id"].'" class="ri-close-circle-line ri-lg"></a>
                                        <p class="fw-bolder mt-3 m-sm-0">Rp '.$row["price"]*$row["qty"].'</p>
                                    </div>
                                </td>
                            ';
                            echo '</tr>';
                            $total = $total + ($row["price"]*$row["qty"]);
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-dark" href="category.php">add more</a>
                </div>
            </div>
            <!-- /Cart Items -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="bg-dark p-4 p-md-5 text-white">
                    <h3 class="fs-3 fw-bold m-0 text-center">Order Summary</h3>
                    <div class="py-3 border-bottom-white-opacity">
                    </div>
                    <div class="py-3 border-bottom-white-opacity">
                        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row">
                            <div>
                                <p class="m-0 fs-5 fw-bold">Grand Total</p>
                            </div>
                            <p class="mt-3 m-sm-0 fs-5 fw-bold">Rp <?php echo $total ?></p>
                        </div>
                    </div>
                
                    <!-- Checkout Button-->
                    <form action="add_order.php" method="post">
                        <input type="submit" value="Proceed to checkout" class="btn btn-white w-100 text-center mt-3" />
                    </form>
                    
                    <!-- Checkout Button-->
                </div>
                
                <!-- Payment Icons-->
                <ul class="list-unstyled d-flex justify-content-center mt-3">
                    <li class="mx-1 border d-flex align-items-center p-2"><i class="pi pi-paypal"></i></li>
                    <li class="mx-1 border d-flex align-items-center p-2"><i class="pi pi-mastercard"></i></li>
                    <li class="mx-1 border d-flex align-items-center p-2"><i class="pi pi-american-express"></i></li>
                    <li class="mx-1 border d-flex align-items-center p-2"><i class="pi pi-visa"></i></li>
                </ul>
                <!-- / Payment Icons-->            </div>
            <!-- Cart Summary -->

            <!-- /Cart Summary -->
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
    <?php include "footer.php"?>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>