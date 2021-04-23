<?php
session_start();
@$session = $_SESSION["users"];
if (isset($session)){
    require ("./Template/my_data.html");
}else{
    echo "<script>alert('请先登录！')</script>";
    $url = "./login.php";
    echo "<script>window.location.href='$url'</script>";
}