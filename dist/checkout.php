<?php
    session_start();
    if(isset($_POST["submit"]))
    {
        $namadpn=$_POST["namadpn"];
        $namablkg=$_POST["namablkg"];
        $mobile=$_POST["mobile"];
        $alamat=$_POST["alamat"];
        $kota=$_POST["kota"];
        $provinsi=$_POST["provinsi"];
        $kdpos=$_POST["kdpos"];
        $bayar=$_POST["bayar"];
        $tf=$_POST["tf"];

        $con=new mysqli("localhost", "root", "", "library");
        $st=$con->prepare("INSERT into checkout (name, mobile, alamat, kota, provinsi, kode_pos, bayar, tf) values(?,?,?,?,?,?,?,?)");
        $st->execute([$namadpn . " " . $namablkg, $mobile, $alamat, $kota, $provinsi, $kdpos, $bayar, $tf]);
    }            
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
    <title>Library | Checkout</title>
    
</head>
<body class="">
<?php include "header.php"?>
    <!-- Main Section-->
    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->

        <h1 class="mb-4 display-5 fw-bold text-center">Checkout Securely</h1>
        <form action="success.php" method="post" data-toggle="modal">

          <div class="row g-md-8 mt-4">
              <!-- Checkout Panel Left -->
              <div class="col-12 col-lg-6 col-xl-7">
                    <!-- Checkout Shipping Address -->
                  <div class="checkout-panel">
                    <h5 class="title-checkout">Alamat Pengiriman</h5>
                    <div class="row">
                      <!-- First Name-->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="firstName" class="form-label">Nama Depan</label>
                          <input type="text" class="form-control" name="namadpn" id="firstName" placeholder="Udin" value="" required>
                        </div>
                      </div>
                  
                      <!-- Last Name-->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="lastName" class="form-label">Nama Belakang</label>
                          <input type="text" class="form-control" name="namablkg" id="lastName" placeholder="Petot" value="" required>
                        </div>
                      </div>
                  
                      <!-- Mobile -->
                      <div class="col-12">
                        <div class="form-group">
                          <label for="address" class="form-label">No Telp</label>
                          <input type="text" class="form-control" name="mobile" id="address" placeholder="0812 3456 7890" required>
                        </div>
                      </div>

                      <!-- Address-->
                      <div class="col-12">
                        <div class="form-group">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="address" placeholder="123 Some Street Somewhere" required>
                        </div>
                      </div>
                  
                      <!-- Country-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="country" class="form-label">Kota</label>
                          <input type="text" name="kota" id="kota" class="form-control" placeholder="Kota Kamu" required>
                        </div>
                      </div>
                  
                      <!-- State-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="state" class="form-label">Provinsi</label>
                          <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Provinsi Kamu" required>
                        </div>
                      </div>
                  
                      <!-- Post Code-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="zip" class="form-label">Kode Pos</label>
                          <input type="text" class="form-control" name="kdpos" id="zip" placeholder="123456" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Checkout Shipping Address -->   
                  <!-- Checkout Payment Method-->
                  <div class="checkout-panel">
                    <h5 class="title-checkout">Payment Information</h5>
                  
                    <div class="row">
                      <!-- Payment Option-->
                      <div class="col-12">
                        <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                          <input class="form-check-input" type="radio" name="bayar" id="checkoutPaymentStripe" checked value="Transfer Bank">
                          <label class="form-check-label" for="checkoutPaymentStripe">
                            <span class="d-flex justify-content-between align-items-start">
                              <span>
                                <span class="mb-0 fw-bolder d-block">Transfer Bank</span>
                              </span>
                              <i class="ri-bank-card-line"></i>
                            </span>
                          </label>
                        </div>
                      </div>
                    
                      <!-- Payment Option-->
                      <div class="col-12">
                        <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                          <input class="form-check-input" type="radio" name="bayar" id="checkoutPaymentPaypal" value="COD">
                          <label class="form-check-label" for="checkoutPaymentPaypal">
                            <span class="d-flex justify-content-between align-items-start">
                              <span>
                                <span class="mb-0 fw-bolder d-block">COD</span>
                                <small>Cash On Delivery</small>
                              </span>
                              <i class="bi bi-cash"></i>                              
                            </span>
                          </label>
                        </div>
                      </div>
                    
                    </div>
                    
                    <!-- Payment Details-->
                    <div class="card-details">
                      <div class="row pt-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="cc-name" class="form-label">Nama Kartu</label>
                            <select class="form-select" name="tf" id="cc-name">
                              <option value="">Please Select...</option>
                              <option>BCA</option>
                              <option>Mandiri</option>
                              <option>BNI</option>
                              <option>BRI</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / Payment Details-->
                    
                    <!-- Paypal Info-->
                    <div class="paypal-details bg-light p-4 d-none mt-3 fw-bolder">
                      Lanjutkan selesaikan pesanan, pembayaran akan dilakukan saat barang telah sampai tujuan.
                    </div>
                    <!-- /Paypal Info-->
                  </div>
                  <!-- /Checkout Payment Method-->                </div>
              <!-- / Checkout Panel Left -->

              <!-- Checkout Panel Summary -->
              <div class="col-12 col-lg-6 col-xl-5">
                  <div class="bg-light p-4 sticky-md-top top-5">
                      <div class="border-bottom pb-3">
                          <!-- Cart Item-->
                              <?php 
                              $con=new mysqli("localhost", "root", "", "library");
                              $st_bill=$con->prepare("select * from bill where bill_no=?");
                              $st_bill->bind_param("i", $_GET["bno"]);
                              $st_bill->execute();
                              $rs_bill=$st_bill->get_result();
                              $row_bill=$rs_bill->fetch_assoc();
                              echo '
                              <div class="d-none d-md-flex justify-content-between align-items-start py-2">
                                    <div class="d-flex flex-grow-1 justify-content-start align-items-start">
                                        <div>
                                            <p class="mb-1 fs-6 fw-bolder">Bill No : '.$row_bill['bill_no'].'</p>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 fw-bolder">
                                        <span>Date : '. $row_bill['bill_date'].'</span>
                                    </div>
                                </div>
                              </div>';

                              $st_det=$con->prepare("SELECT name, price, itemqty, image from book 
                              inner join bill_detail on book.id=bill_detail.itemid where bill_no=?");
                              $st_det->bind_param("i", $_GET["bno"]);
                              $st_det->execute();
                              $rs_det=$st_det->get_result();
                              echo '<table>';
                              $total=0;
                              while($row_det=$rs_det->fetch_assoc())
                              {
                                echo '
                                <div class="d-none d-md-flex justify-content-between align-items-start py-3">
                                    <div class="d-flex flex-grow-1 justify-content-start align-items-start">
                                        <div class="position-relative f-w-20 border p-2 me-4">
                                            <span class="checkout-item-qty">'.$row_det['itemqty'].'</span>
                                            <img src="images/'. $row_det['image'] .'" alt="" class="rounded img-fluid">
                                        </div>
                                        <div>
                                            <p class="mb-1 fs-6 fw-bolder">'.$row_det['name'].'</p>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 fw-bolder">
                                        <span>'.$row_det['price']*$row_det['itemqty'].'</span>
                                    </div>
                                </div>
                              </div>
                                ';
                                  echo '<td></td>';
                                  echo '</tr>';
                                  $total=$total + ($row_det['price']*$row_det['itemqty']);
                              }
                              echo '</table>';
                              echo '
                              <div class="py-3 border-bottom">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div>
                                          <p class="m-0 fw-bold fs-5">Grand Total</p>
                                      </div>
                                      <p class="m-0 fs-5 fw-bold">Rp '.$total.'</p>
                                  </div>
                              </div>';  
                              ?>
                        <!-- / Cart Item-->
                      <div class="py-3 border-bottom">
                      </div> 
                  <!-- Accept Terms Checkbox-->
                    <input class="btn btn-dark w-100" name="submit" type="submit" value="Complete Order">

                  </div>               
                </div>
              <!-- /Checkout Panel Summary -->
          </div>
          <!-- Popup HTML -->
        </form>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <?php include "footer.php"?>

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>