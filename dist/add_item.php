<?php
session_start();
    if (!isset($_SESSION['user'])) {
        echo '<script>alert("Login Required!"); window.location="login.php";</script>';
    }else {
        $con=new mysqli("localhost", "root", "", "library");
        $st_check=$con->prepare("select * from temp_order where email=? and itemid=?");
        $st_check->bind_param("si", $_SESSION["user"], $_GET["id"]);
        $st_check->execute();
        $rs=$st_check->get_result();
        if($rs->num_rows==0){
            $con=new mysqli("localhost", "root", "", "library");
            $st=$con->prepare("insert into temp_order(email,itemid) values(?,?)");
            $st->bind_param("si", $_SESSION["user"], $_GET["id"]);
            $st->execute();
        } else {
            $con=new mysqli("localhost", "root", "", "library");
            $st=$con->prepare("update temp_order set qty=qty+1 where email=? and itemid=?");
            $st->bind_param("si", $_SESSION["user"], $_GET["id"]);
            $st->execute();
        }
        echo "<script>window.location='cart.php';</script>";
    }
?>