<?php
require("./DB_Interface.php");
class DB_register{
    public function register(){
        $username = $_POST["Username"];
        $Email = $_POST["exampleInputEmail1"];
        $password = md5($_POST["inputPassword1"]);
        $link = new DB();
        $sql = "insert into users(user_name,user_email,user_pass,user_pic,join_date) values('$username','$Email','$password','./images/1.jpg',now())";
        $link->Exec($sql);
        if ($link->affectRows($link) != 1){
            $url = "../register.php";
            echo "<script>alert('用户名或邮箱已被注册！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }else{
            $url = "../login.php";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}
$Use_register = new DB_register();
$Use_register->register();
?>