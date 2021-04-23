<?php
require ("../config/DB_Interface.php");
class Use_DB{
    public function login(){
        $username = $_POST["Username"];
        $password = md5($_POST["inputPassword"]);
        $link = new DB();
        $sql = "select admin_password from admin where admin_username = '$username'";
        $data = $link->get_One_data($sql);
        if ($password == $data){
            session_start();
            $_SESSION["admin"] = $username;
            $url = "./my_admin.php";
            echo "<script>window.location.href='$url'</script>";
        }else{
            $url = "./admin_login.php";
            echo "<script>alert('账户或密码错误！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }

    }
}
$Use_DB = new Use_db();
$Use_DB->login();
?>