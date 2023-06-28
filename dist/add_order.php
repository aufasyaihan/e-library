<?php
session_start();

    //add_bill
    $con=new mysqli("localhost", "root", "", "library");
    $st_bill=$con->prepare("insert into bill(email) values(?)");
    $st_bill->bind_param("s", $_SESSION["user"]);
    $st_bill->execute();
    //get_bill_no
    $st_billno=$con->prepare("select max(bill_no) as billno from bill where email=?");
    $st_billno->bind_param("s", $_SESSION["user"]);
    $st_billno->execute();
    $rs_billno=$st_billno->get_result();
    $row_billno=$rs_billno->fetch_assoc();
    $bno=$row_billno["billno"];
    //add bill detail
    $st_temp=$con->prepare("select * from temp_order where email=?");
    $st_temp->bind_param("s", $_SESSION["user"]);
    $st_temp->execute();
    $rs_temp=$st_temp->get_result();
    while($row_temp=$rs_temp->fetch_assoc())
    {
        $st_billdet=$con->prepare("insert into bill_detail values(?,?,?)");
        $st_billdet->bind_param("iii", $bno, $row_temp["itemid"], $row_temp["qty"]);
        $st_billdet->execute();
    }
    //delete temp order
    $st_del=$con->prepare("delete from temp_order where email=?");
    $st_del->bind_param("s", $_SESSION["user"]);
    $st_del->execute();
    echo "<script>window.location='checkout.php?bno=".$bno."';</script>";
    
?>