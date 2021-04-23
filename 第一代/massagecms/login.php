<?php
session_start();
@$session = $_SESSION["users"];
if (isset($session)) {
    $url = "./my_data.php";
    echo "<script>window.location.href='$url'</script>";
} else {
    require("./Template/login.html");
}
?>