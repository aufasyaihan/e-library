<?php
    session_start();

    $id = $_GET['id'];
    $sql = "select * from book where id = '$id'";
    $con=new mysqli("localhost", "root", "", "library");
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
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
    <title>Library | Product Details</title>
    
</head>
<body class="">
<?php include "header.php"?>

    <!-- Main Section-->
    <section class="mt-5 ">
        <!-- Page Content Goes Here -->

        <!-- Product Top-->
        <section class="container">

            <!-- Breadcrumbs-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="category.php">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                </ol>
            </nav>            <!-- /Breadcrumbs-->

            <div class="row g-5">

                <!-- Images Section-->
                <div class="col-12 col-lg-7">
                    <div class="row g-1">
                          <div class="swiper-container gallery-top-vertical col-10">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide bg-white h-auto">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="images/<?php echo $row['image'] ?>" alt="...">
                                    </picture>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
                <!-- /Images Section-->

                <!-- Product Info Section-->
                <div class="col-12 col-lg-5">
                    <div class="pb-3">
                    
                        <!-- Product Name, Review, Brand, Price-->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1"></p>
                            <div class="d-flex justify-content-start align-items-center">
                                
                            </div>
                        </div>
                        <h1 class="mb-2 fs-2 fw-bold">
                            <?php echo $row['name']; ?>
                        </h1>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-3 lh-1 me-2">Rp <?php echo $row['price'] ?></p>
                        </div>
                        <!-- /Product Name, Review, Brand, Price-->
                    
                        <!-- Product Views-->
                        <div class="d-flex justify-content-start mt-3">
                            <div class="alert bg-light rounded py-1 px-2 d-table m-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <!-- <i class="ri-fire-fill lh-1 text-orange"></i> -->
                                    <div class="ms-2">
                                        <!-- <small class="opacity-75 fw-bolder lh-1"></small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Views-->
                    
                        <!-- Product Options-->
                        <div class="border-top mt-4 mb-3">
                            <div class="product-option mb-4 mt-4">
                                <small class="text-uppercase d-block fw-bolder mb-2">
                                    <!-- Colour : <span class="selected-option fw-bold">Crimson Blue</span> -->
                                </small>
                                <div class="d-flex justify-content-start">
                                    <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom">
                                        <!-- <input type="radio" class="form-check-color-input" id="option-colour-1" name="option-colour"
                                            value="Dark Black">
                                        <label class="form-check-label" for="option-colour-1"></label> -->
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                                        <!-- <input type="radio" class="form-check-color-input" id="option-colour-2" name="option-colour"
                                            value="Sun Yellow">
                                        <label class="form-check-label" for="option-colour-2"></label> -->
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                                        <!-- <input type="radio" class="form-check-color-input" id="option-colour-3" name="option-colour"
                                            value="Crimson Blue" checked>
                                        <label class="form-check-label" for="option-colour-3"></label> -->
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                                        <!-- <input type="radio" class="form-check-color-input" id="option-colour-4" name="option-colour"
                                            value="Cherry Red">
                                        <label class="form-check-label" for="option-colour-4"></label> -->
                                    </div>
                                </div>
                            </div>
                            <div class="product-option">
                                <small class="text-uppercase d-block fw-bolder mb-2">
                                    <!-- Size (UK) : <span class="selected-option fw-bold"></span> -->
                                </small>
                                <div class="form-group">
                                    <!-- <select name="selectSize" class="form-control" data-choices>
                                        <option value="">Please Select Size</option>
                                        <option value="Extra Small">XS</option>
                                        <option value="Medium">M</option>
                                        <option value="Large">L</option>
                                        <option value="Extra Large">XL</option>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <!-- /Product Options-->
                    
                        <!-- Add To Cart-->
                        <div class="d-flex justify-content-between mt-3">
                            <a  href="add_item.php?id=<?php echo $row['id']?>" class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white">Add To Cart</a>
                            <!-- <button class="btn btn-orange btn-orange-chunky"><i class="ri-heart-line"></i></button> -->
                        </div>
                        <!-- /Add To Cart-->
                    
                        <!-- Socials-->
                        <div class="my-4">
                            <div class="d-flex justify-content-start align-items-center">
                                <p class="fw-bolder lh-1 mb-0 me-3">Share</p>
                                <ul class="list-unstyled p-0 m-0 d-flex justify-content-start lh-1 align-items-center mt-1">
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i class="ri-facebook-box-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i class="ri-instagram-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i class="ri-pinterest-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i class="ri-twitter-fill"></i></a></li>
                                </ul>
                            </div>    </div>
                        <!-- Socials-->
                    
                    
                    </div>                </div>
                <!-- / Product Info Section-->
            </div>
        </section>
        <!-- / Product Top-->

        <section>

        <!-- </section> -->

        <!-- Related Products-->
        <div class="container my-8">
            <h3 class="fs-4 fw-bold mb-5 text-center">You May Also Like</h3>
            </div>
                  <div class="">
                      <div class=""> 
                        <!-- Card Product-->
                        <div class="d-flex ms-5 me-5">
                        <?php
                            //connection
                            $con=new mysqli("localhost", "root", "", "library");
                                $st=$con->prepare("select * from book");
                                $st->execute();
                                $rs=$st->get_result();
                                for ($i=0; $i < 4; $i++) { 
                                    $row=$rs->fetch_assoc();
                                    echo "
                                    <div class='col mb-5'>
                                    <div class='card h-100 m-2 border shadow'>
                                        <img class='card-img-top' src='images/".$row['image']."' alt='...' />
                                        
                                        <div class='card-body p-4'>
                                            <div class='text-center'>
                                                <!-- Product name-->
                                                <h5 class='fw-bolder'>" .$row['name']. "</h5>
                                                <!-- Product price-->
                                                Rp ".$row['price']."
                                            </div>
                                        </div>
                                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                            <div class='text-center'>
                                            <a class='btn btn-outline-dark mt-auto' 
                                            href='product.php?id=".$row['id']."' >Buy Now</a></div>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                        ?>
                        </div>
                    <div class="swiper-slide d-flex h-auto justify-content-center align-items-center mt-5">
                      <a href="./category.php" class="d-flex text-decoration-none flex-column justify-content-center align-items-center">
                        <span class="btn btn-dark btn-icon mb-3"><i class="ri-arrow-right-line ri-lg lh-1"></i></span>
                        <span class="lead fw-bolder">See All</span>
                      </a>
                    </div>
                  </div>
                <!-- / Swiper Latest-->            
            </div>
        </section>
        <!-- /Page Content -->
    <!-- / Main Section-->

    <?php include "footer.php"?>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>