<?php
session_start();
if (isset($_SESSION["users"])){
    unset($_SESSION["users"]);
    $url = "./login.php";
    echo "<script>alert('退出成功！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
if (isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
    $url = "./admin/admin_login.php";
    echo "<script>alert('退出成功！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
?>