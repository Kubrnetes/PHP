<?php
@$sign = $_GET["sign"];
if ($sign == "tourist") {
    echo "<script>alert('请先登录后再进行查看留言！')</script>";
    $url = "./message.php";
    echo "<script>window.location.href='$url'</script>";
} else {
    require("./Template/message.html");
}
?>