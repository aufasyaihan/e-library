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
          <style>
            /* Card Styles */
            .cards{
            transition: all 0.2s ease;
            display: block;
            }
            .cards:hover{
            transform: scale(1.1);
            }
          </style>
    <!-- Page Title -->
    <title>Library</title>
    
</head>
<body class="">
    <?php include "header.php" ?>
    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <!-- / Hero Section -->
        <section class="vh-100 position-relative bg-overlay-dark ">
            <div class="container d-flex h-100 justify-content-center align-items-center position-relative z-index-10">
                <div class="d-flex justify-content-center align-items-center h-100 position-relative z-index-10 text-white">
                    <div>
                        <h1 class="display-1 fw-bold px-2 px-md-5 text-center mx-auto col-lg-8 mt-md-0"
                            data-aos="fade-up" data-aos-delay="1000">A reader lives a thousand lives before he dies</h1>
                        <div data-aos="fade-in" data-aos-delay="2000">
                            <div class="d-md-flex justify-content-center mt-4 mb-3 my-md-5">
                                <a href="category.php"
                                    class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>Buy Now
                                        <i class="ri-arrow-right-line align-middle fw-bold"></i></span></a>
                            </div>
                            <i class="ri-mouse-line d-block text-center animation-float ri-2x transition-all opacity-50-hover text-white"
                                data-pixr-scrollto data-target=".brand-section" data-aos="fade-up"
                                data-aos-delay="700"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute z-index-1 top-0 bottom-0 start-0 end-0">
                <!-- Swiper Info -->
                <div class="swiper-container overflow-hidden bg-light w-100 h-100"
                  data-swiper
                  data-options='{
                    "slidesPerView": 1,
                    "speed": 1500,
                    "loop": true,
                    "effect": "fade",
                    "autoplay": {
                      "delay": 5000
                    }
                  }'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/4.jpg);">
                      </div> 
                    </div>
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/2.jpg);"> 
                      </div>
                    </div>
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/3.jpg);"> 
                      </div>
                    </div>
                  </div> 
                
                </div>
                <!-- / Swiper Info-->            
            </div>
        </section>
        <!--/ Hero Section-->

        <!-- Staff Picks-->
        <section class="mb-9 mt-5" data-aos="fade-up">
            <div class="container">
                <div class="w-md-50 mb-5">
                    <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">Season Favourites</p>
                    <h2 class="display-5 fw-bold mb-3">Staff Picks</h2>
                    <p class="lead">We've sorted through our feed to put together a collection of our products perfect
                        for a reading outdoors.</p>
                </div>
                
                  <div class="">
                      <div class=""> 
                        <!-- Card Product-->
                        <div class="d-flex">
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
                                    <div class='cards card h-100 border m-2 rounded-3 shadow'>
                                        <img class='card-img' src='images/".$row['image']."' alt='...' />
                                        
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
        <!-- / Staff Picks-->

        <!-- Image Hotspot Banner-->
        <section class="my-10 position-relative">
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white top-0 start-0 end-0">
                <svg class="align-self-start d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="1283 0 0 0 0 53.25 1283 0"/></svg></div>
            <!-- /SVG Shape Divider-->
            
            <div class="w-100 h-100 bg-img-cover bg-pos-center-center hotspot-container py-5 py-md-7 py-lg-10" style="background-image: url(https://images.pexels.com/photos/1106468/pexels-photo-1106468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1); background-color: rgba(0,0,0,0.7);
            background-blend-mode: darken;">
                
                <div class="container py-lg-8 position-relative z-index-10 d-flex align-items-center" data-aos="fade-left">
                    <div class="py-8 d-flex justify-content-end align-items-start align-items-lg-end flex-column col-lg-4 text-lg-end">
                        <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">Extreme Performance</p>
                        <h2 class="display-5 fw-bold mb-3 text-white">Knowledge is Power</h2>
                        <p class="lead d-none d-lg-block text-white">The more you read, the more you obtain the knowledge, and with that knowledge you can use it in every way possible.</p>
                        <a class="text-decoration-none fw-bolder text-white" href="category.php">Let's buy some books &rarr;</a>
                    </div>
                </div>
            
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white bottom-0 start-0 end-0">
                <svg class="align-self-end d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="0 53.25 1283 53.25 1283 0 0 53.25"/></svg></div>
            <!-- /SVG Shape Divider-->        </section>
        <!-- / Image Hotspot Banner-->

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