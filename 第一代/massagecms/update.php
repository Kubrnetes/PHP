<?php
session_start();
if (isset($_SESSION["users"])) {
    require ("./Template/update.html");
} else {
    $url = "./message.php";
    echo "<script>alert('当前为游客模式，无法进行留言！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
?>