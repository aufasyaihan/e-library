<?php
    session_start();
    if(isset($_POST["login"]))
    {
            $con=new mysqli("localhost", "root", "", "library");
            $st_check=$con->prepare("select * from users where email=? and password=?");
            $st_check->bind_param("ss", $_POST["email"],$_POST["password"]);
            $st_check->execute();
            $rs=$st_check->get_result();
            $row=$rs->fetch_assoc();
            if($rs->num_rows==0)
                echo "<script>alert('Login fail'); window.location='login.php';</script>";
            else 
                $_SESSION["user"]=$_POST["email"];
                $_SESSION['image']=$row['password'];
                $_SESSION['name']=$row['name'];
                $_SESSION['mobile']=$row['mobile'];
                $_SESSION['address']=$row['address'];
                echo "<script>window.location='index.php';</script>";
    }
    if(isset($_POST["reg"]))
    {
            $con=new mysqli("localhost", "root", "", "library");

            $st_check=$con->prepare("select * from users where email=?");
            $st_check->bind_param("s", $_POST["regemail"]);
            $st_check->execute();
            $rs=$st_check->get_result();
            if($rs->num_rows>0)
                echo "<script>alert('E-mail already used');</script>";
            else {
                $st=$con->prepare("insert into users(email, password, name, mobile, address) 
                values(?,?,?,?,?)");
                $st->bind_param("sssss", $_POST["regemail"],$_POST["regpass"],$_POST["name"],
                $_POST["mobile"],$_POST["address"]);
                $st->execute();
                $_SESSION["user"]=$_POST["regemail"];
                echo "<script>window.location='login.php';</script>";
            }        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
        .row{
            margin-top: -45px;
        }
        body{
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            font-size: 15px;
            line-height: 1.7;
            color: #c4c3ca;
            background-color: #1f2029;
            overflow: hidden;
        }
        a {
            cursor: pointer;
        transition: all 200ms linear;
        }
        a:hover {
            text-decoration: none;
        }
        .link {
        color: #c4c3ca;
        }
        .link:hover {
        color: #fa6129;
        }
        p {
        font-weight: 500;
        font-size: 14px;
        line-height: 1.7;
        }
        h4 {
        font-weight: 600;
        }
        h6 span{
        padding: 0 20px;
        text-transform: uppercase;
        font-weight: 700;
        }
        .section{
        position: relative;
        width: 100%;
        display: block;
        }
        .full-height{
        min-height: 100vh;
        }
        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked){
        position: absolute;
        left: -9999px;
        }
        .checkbox:checked + label,
        .checkbox:not(:checked) + label{
        position: relative;
        display: block;
        text-align: center;
        width: 60px;
        height: 16px;
        border-radius: 8px;
        padding: 0;
        margin: 10px auto;
        cursor: pointer;
        background-color: #ffeba7;
        }
        .checkbox:checked + label:before,
        .checkbox:not(:checked) + label:before{
        position: absolute;
        display: block;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        color: #ffeba7;
        background-color: #fa6129;
        font-family: 'unicons';
        /* ini buat logo checkbox: ; */
        content: '';
        /* ================ */
        z-index: 20;
        top: -10px;
        left: -10px;
        line-height: 36px;
        text-align: center;
        font-size: 24px;
        transition: all 0.5s ease;
        }
        .checkbox:checked + label:before {
        transform: translateX(44px) rotate(-270deg);
        }
        .card-3d-wrap {
        position: relative;
        width: 440px;
        max-width: 100%;
        height: 400px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        perspective: 800px;
        margin-top: 60px;
        }
        .card-3d-wrapper {
        width: 100%;
        height: 100%;
        position:absolute;    
        top: 0;
        left: 0;  
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        transition: all 600ms ease-out; 
        }
        .card-front, .card-back {
        width: 100%;
        height: 130%;
        background-color: #2a2b38;
        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
        background-position: bottom center;
        background-size: 300%;
        background-repeat: no-repeat;
        position: absolute;
        border-radius: 6px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
        }
        .card-back {
        transform: rotateY(180deg);
        }
        .checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
        transform: rotateY(180deg);
        }
        .center-wrap{
        position: absolute;
        width: 100%;
        padding: 0 35px;
        top: 50%;
        left: 0;
        transform: translate3d(0, -50%, 35px) perspective(100px);
        z-index: 20;
        display: block;
        }


        .form-group{ 
        position: relative;
        display: block;
            margin: 0;
            padding: 0;
        }
        .form-style {
        padding: 13px 20px;
        padding-left: 55px;
        height: 48px;
        width: 100%;
        font-weight: 500;
        border-radius: 4px;
        font-size: 14px;
        line-height: 22px;
        letter-spacing: 0.5px;
        outline: none;
        color: #c4c3ca;
        background-color: #1f2029;
        border: none;
        -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
        box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
        }
        .form-text {
        padding: 13px 20px;
        padding-left: 55px;
        height: 100px;
        width: 100%;
        font-weight: 500;
        border-radius: 4px;
        font-size: 14px;
        line-height: 22px;
        letter-spacing: 0.5px;
        outline: none;
        color: #c4c3ca;
        background-color: #1f2029;
        border: none;
        -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
        box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
        }
        .form-style:focus,
        .form-style:active {
        border: none;
        outline: none;
        box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
        }
        .form-text:focus,
        .form-text:active {
        border: none;
        outline: none;
        box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
        }
        .input-icon {
        position: absolute;
        top: 0;
        left: 18px;
        height: 48px;
        font-size: 24px;
        line-height: 48px;
        text-align: left;
        color: #fa6129;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .text-icon {
        position: absolute;
        top: 0;
        left: 18px;
        height: 48px;
        font-size: 24px;
        line-height: 100px;
        text-align: left;
        color: #fa6129;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .form-group input:-ms-input-placeholder  {
        color: #c4c3ca;
        opacity: 0.7;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input::-moz-placeholder  {
        color: #c4c3ca;
        opacity: 0.7;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input:-moz-placeholder  {
        color: #c4c3ca;
        opacity: 0.7;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input::-webkit-input-placeholder  {
        color: #c4c3ca;
        opacity: 0.7;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input:focus:-ms-input-placeholder  {
        opacity: 0;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input:focus::-moz-placeholder  {
        opacity: 0;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input:focus:-moz-placeholder  {
        opacity: 0;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }
        .form-group input:focus::-webkit-input-placeholder  {
        opacity: 0;
        -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        .btn{  
        border-radius: 4px;
        height: 44px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        -webkit-transition : all 200ms linear;
        transition: all 200ms linear;
        padding: 0 30px;
        letter-spacing: 1px;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-align-items: center;
        -moz-align-items: center;
        -ms-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        -moz-justify-content: center;
        -ms-justify-content: center;
        justify-content: center;
        -ms-flex-pack: center;
        text-align: center;
        border: none;
        background-color: #fa6129;
        color: black;
        box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);
        }
        .btn:active,
        .btn:focus{  
        background-color: #20242c;
        color: #ffeba7;
        box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
        }
        .btn:hover{  
        background-color: #20242c;
        color: #ffeba7;
        box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
        }
    </style>
    <title>Library | Login</title>
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox " type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front shadow-lg">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
                                            <form name="formlog" action="login.php" method="post">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Your Email" id="email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <input class="btn mt-4" type="submit" name="login" id="login" value="Login">
                                            </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="container card-back shadow">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-1">Sign Up</h4>
                                            <form name="formreg" action="login.php" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-style" placeholder="Your Full Name" id="name" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="text" name="mobile" class="form-style" placeholder="Your Phone Number" id="mobile" autocomplete="off">
                                                    <i class="input-icon uil uil-mobile-android"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="email" name="regemail" class="form-style" placeholder="Your Email" id="regemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" name="regpass" class="form-style" placeholder="Your Password" id="regpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-1">
                                                    <textarea class="form-text" name="address" id="address" cols="30" rows="10" autocomplete="off" placeholder="                                                                      Your Home Address"></textarea>
                                                    <i class="text-icon uil uil-mobile-android"></i>
                                                </div>	
                                                <input class="btn mt-1" name="reg" type="submit" value="Register">
                                            </form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>