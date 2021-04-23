<?php
session_start();
@$session = $_SESSION["admin"];
if (isset($session)){
    $url = "./my_admin.php";
    echo "<script>window.location.href='$url'</script>";
}else{
    require ("./login.html");
}
?>