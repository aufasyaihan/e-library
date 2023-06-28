<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <style>
      .modal-confirm {		
        color: #636363;
        width: 325px;
        font-size: 14px;
      }
      .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
      }
      .modal-confirm .modal-header {
        border-bottom: none;   
        position: relative;
      }
      .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
      }
      .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px; 
      }
      .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
      }	
      .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
      }	
      .modal-confirm .icon-box {
        color: #fff;		
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
      }
      .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
      }
      .modal-confirm.modal-dialog {
        margin-top: 80px;
      }
      .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
      }
      .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
      }
      .modal-fade{
        animation: fadeIn 1s;
      }
      .trigger-btn {
        display: inline-block;
        margin: 100px auto;
      }
    </style>
    <title>Success</title>
</head>
<body>
    <?php include "header.php" ?>
    <!-- Main Section-->
    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->
        <div class="modal-dialog modal-confirm modal-fade shadow-lg">
            <div class="modal-content">
                <div class="modal-header mt-5">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>				
                    <h4 class="modal-title w-100">Congratulations!</h4>	
                </div>
                <div class="modal-body">
                    <p class="text-center">You have completed your order. Thank you!</p>
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-success btn-block">OK</a>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>
</html>