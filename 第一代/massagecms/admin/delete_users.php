<?php
session_start();
@$admin = $_SESSION["admin"];
if (isset($admin)){
    require ("./delete_users.html");
}else{
    $url = "./admin_login.php";
    echo "<script>alert('请登录！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
?>