<?php
require("./DB_Interface.php");

class DB_decide
{
    public function con()
    {
        $link = new DB();
        $username = $_POST["Username"];
        $password = $_POST["inputPassword"];
        $sql = "select * from users where user_name = '$username'";
        $result = $link->get_data($sql);
        if (md5($password) == $result["user_pass"]) {
            session_start();
            $_SESSION["users"] = $username;
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $url = "../login.php";
            echo "<script>alert('用户名或密码错误！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}

$Use_mysql = new DB_decide();
$Use_mysql->con();

?>