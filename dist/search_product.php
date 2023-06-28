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
    <title>Library | Product</title>
    
</head>
<body class="">
<?php include "header.php"?>
    
    <!-- Main Section-->
    <section class="mt-0 ">

        <!-- Category Top Banner -->
        <div class="py-6 bg-img-cover bg-dark bg-overlay-gradient-dark position-relative overflow-hidden mb-4 bg-pos-center-center"
            style="background-image: url(./assets/images/banners/1.jpeg);">
            <div class="container position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item breadcrumb-light"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item breadcrumb-light"><a href="category.php">Products</a></li>
                      <li class="breadcrumb-item active breadcrumb-light" aria-current="page">Searched Product</li>
                    </ol>
                </nav>                
                <h1 class="fw-bold display-6 mb-4 text-white">Latest Arrivals</h1>
                <div class="col-12 col-md-6">
                    <p class="lead text-white mb-0">
                        Read, learn, and open up to our latest release. We've got you covered from adventure to romantic genre, from light to heavy reading. Discover our latest range of intersting books.
                    </p>
                </div>
            </div>
        </div>
        <!-- Category Top Banner -->

        <div class="container">

            <div class="row">

                <!-- Category Aside/Sidebar -->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="id" id="searchForm" placeholder="Search by books id...">  
                            <div class="input-group-btn">
                                <input class="btn btn-dark" name="submit" type="submit" value="Search">
                            </div>
                        </div>
                    </form>

                <!-- Category Products-->
                <div class="col-12 col-lg-12">

                    <!-- Top Toolbar-->
                    <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center flex-grow-1 mb-4 mb-md-0">
                            <!-- <small class="d-inline-block fw-bolder">Filtered by:</small> -->
                            <!-- <ul class="list-unstyled d-inline-block mb-0 ms-2">
                                <li class="bg-light py-1 fw-bolder px-2 cursor-pointer d-inline-block me-1 small">Type: Slip On <i
                                        class="ri-close-circle-line align-bottom ms-1"></i></li>
                            </ul> -->
                            <!-- <span
                                class="fw-bolder text-muted-hover text-decoration-underline ms-2 cursor-pointer small">Clear
                                All</span> -->
                        </div>
                    </div>
                    <!-- Products-->
                    <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
                    
                   
                    </div>
                    <?php
                        if(isset($_POST["submit"]))
                        {
                            //tangkap data dari method post ke variabel
                            $id=$_POST["id"];
                            

                            //connection
                            $con=new mysqli("localhost", "root", "", "library");
                            $st=$con->prepare("select * from book where id=?");
                            $st->bind_param("i", $id);
                            $st->execute();
                            $rs=$st->get_result();
                            $row=$rs->fetch_assoc();
                            echo "
                            <div class='container d-flex justify-content-center'>
                                    <div class='w-25 card ms-me-2 mt-3 mb-5 shadow-lg rounded-3'>
                                            <div class='card-img-top text-center mt-2'>
                                                <img src='images/". $row['image'] ."' height='250px'>
                                            </div>
                                            <div class='card-title text-center mt-2'>
                                                ". $row['name'] ."
                                            </div>
                                            <div class='card-text text-center mb-3'>
                                                Rp ". $row['price'] ."
                                            </div>
                                            <a style='text-decoration:none; background: #fa6129;' href='product.php?id=".$row['id']."' class='tombol btn text-center text-white tw-bold rounded-bottom'>Buy Now</a>
                                    </div>
                                </div> 
                            ";
                        }
                    ?>
                                                <!-- <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                                    <img class="w-100 img-fluid" title="" src="./assets/images/products/product-1b.jpg" alt="">
                                                </picture> -->
                                            <!-- <div class="card-actions">
                                                <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick Add</span>
                                                <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                                    <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                                    <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                                    <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="card-body px-0 text-center">
                                            <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                                <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 90%">
                                            <!-- <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i> -->
                                        </div>
                                        <div class="stars">
                                            <!-- <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i> -->
                                        </div>
                                    </div> 
                                    <!-- <span class="small fw-bolder ms-2 text-muted"> 4.7 (456)</span> -->
                                            
                                    </div>
                                    
                    </div>
                    <!-- / Products-->
                </div>
                <!-- / Category Products-->

            </div>
        </div>

    </section>
    <!-- / Main Section-->

    <?php include "footer.php"?>

    
    <!-- Review Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasReview">
      <div class="offcanvas-header d-flex align-items-center">
        <h5 class="offcanvas-title" id="offcanvasReviewLabel">Leave A Review</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <!-- Review Form -->
        <form>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewName">Your Name</label>
            <input type="text" class="form-control" id="formReviewName" placeholder="Your Name">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewEmail">Your Email</label>
            <input type="text" class="form-control" id="formReviewEmail" placeholder="Your Email">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewTitle">Your Review Title</label>
            <input type="text" class="form-control" id="formReviewTitle" placeholder="Review Title">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewReview">Your Review</label>
            <textarea class="form-control" name="formReviewReview" id="formReviewReview" cols="30" rows="5"
              placeholder="Your Review"></textarea>
          </div>
          <button type="submit" class="btn btn-dark hover-lift hover-boxshadow">Submit Review</button>
        </form>
        <!-- / Review Form-->
      </div>
    </div>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>