<?php
        if(isset($_GET["id"]))
        {
            //tangkap data dari method get ke variabel
            $id=$_GET["id"];
            //connection
            $con=new mysqli("localhost", "root", "", "library");
            $st=$con->prepare("delete from book where id='$id'");
            $st->execute();
            echo "<script>window.location='book.php';</script>";
        }
?>
    