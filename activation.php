<?php
session_start();
header('Content-type:text/html;charset=utf-8');
include_once("conn/conn.php");
if (!empty($_GET['name']) && !is_null($_GET['name'])) {
    $num = $conne->getRowsNum("select * from tb_member where name='" . $_GET['name'] . "' and password='" . $_GET['pwd'] . "'");
    if ($num > 0) {
        $upnum = $conne->uidRst("update tb_member set active=1 where name='" . $_GET['name'] . "' and password='" . $_GET['pwd'] . "'");
        if ($upnum > 0) {
            $_SESSION['name'] = $_GET['name'];
            echo "<script>alert('User active successfully!')</script>";
        }
        else{
            echo "<script>alert('You have already active!')</script>";
        }
    }else{
        echo "<script>alert('User active failed!')</script>";
    }
}
?>