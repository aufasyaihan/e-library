<?php
    session_start();
    if(isset($_POST["submit"])){
        $nama=$_POST["name"];
        $email=$_POST["email"];
        $message=$_POST["message"];
        $con=new mysqli("localhost", "root", "", "library");
        $st=$con->prepare("INSERT into contact (name, email, message) values(?,?,?)");
        $st->execute([$nama, $email, $message]);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

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
    <section  class="mt-5 container ">
    <div class="container ">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center rounded">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters shadow-lg">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<form action="contact.php" method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input name="submit" type="submit" value="Send Message" class="btn btn-dark">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div style="background: #fa6129;" class="col-md-5 d-flex align-items-stretch rounded text-white">
								<div class="info-wrap w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">Contact us</h3>
                                    <table class="fs-6 ">
                                        <tr>
                                            <td><i class="bi bi-geo-alt-fill"></i></td>
                                            <td>Address</td>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td>Tangerang</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-telephone-fill"></i></td>
                                            <td>Phone</td>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><a class="text-white" href="https://wa.me/+62812345789">+62 812 345 789</a></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-envelope-fill"></i></td>
                                            <td>Email</td>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><a class="text-white" href="mailto:info@yoursite.com">library@gmail.com</a></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-browser-chrome"></i></td>
                                            <td>Website</td>
                                            <td>&nbsp;</td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                            <td> <a class="text-white" href="#">websitekamu.com</a></td>
                                        </tr>
                                    </table>
				        	
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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