<?php
session_start();
@$session = $_SESSION["res_pass"];
if (isset($session)){
    require ("./rest_pass.html");
}else{
    $url = "./find_pass.php";
    echo "<script>alert('错误！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
?>