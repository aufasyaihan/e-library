<?php
    session_start();
        if(isset($_POST["submit"]))
        {
            //tangkap data dari method post ke variabel
            $id=$_POST["id"];
            $name=$_POST["nama"];
            $price=$_POST["price"];

            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_dir="../dist/images/".$image;
            //connection
            $con=new mysqli("localhost", "root", "", "library");
            $st=$con->prepare("INSERT into book (id, name, price, image) values(?,?,?,?)");
            $st->execute([$id,$name,$price,$image]);
            if($st){
                move_uploaded_file($image_tmp_name, $image_dir);
            }
            echo "<script>window.location='book.php';</script>";
        }
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->
    <?php include "sidepanel.php" ?>
    <!-- /#left-panel -->
    
    <!-- Left Panel -->
    
    <!-- Right Panel -->
    
    <div id="right-panel" class="right-panel">
        
        <!-- Header-->
        <?php include "header.php" ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="book.php">Books Table</a></li>
                            <li class="active">Add Book</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row justify-content-center">
                    <!--/.col-->
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <strong>Books</strong> Form
                            </div>
                            <div class="card-body card-block">
                                <form action="create_book.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="row form-group">
                                        <div class="col ">
                                            <div class="input-group">
                                                <div class="input-group-addon">&nbsp;<i class="fa fa-exclamation">&nbsp;</i></div>
                                                    <input type="text" id="input1-group1" name="id" placeholder="Book's ID" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col ">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-book">&nbsp;</i></div>
                                                    <input type="text"  name="nama" placeholder="Book's Title" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col ">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><b>Rp</b></div>
                                                        <input type="text"  name="price" placeholder="Book's Price" class="form-control">
                                                        <div class="input-group-addon">.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row form-group">
                                            <div class="col ">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="d-flex fa fa-file-image-o">&nbsp;&nbsp;</i></div>
                                                        <input type="file" name="image" placeholder="Book's Price" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="book.php" class="btn btn-danger btn-sm">
                                                <i class="fa fa-arrow-left"></i> Back
                                            </a>
                                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add">
                                        </div>
                                    </div>
                                </form>
                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
