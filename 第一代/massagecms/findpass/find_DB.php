<?php
require ("../config/DB_Interface.php");
class Use_DB{
    public function pass(){
        $link = new DB();
        $username = $_POST["Username"];
        $Email = $_POST["exampleInputEmail1"];
        $sql = "select * from users where user_name = '$username'";
        $data = $link->get_data($sql);
        if ($link->affectRows($link) == 1){
            if ($Email == $data["user_email"]){
                session_start();
                $_SESSION["res_pass"] = $username;
                $url = './rest_pass.php';
                echo "<script>window.location.href='$url'</script>";
            }else{
                $url = './find_pass.php';
                echo "<script>alert('请输入正确的邮箱！')</script>";
                echo "<script>window.location.href='$url'</script>";
            }
        }else{
            $url = './find_pass.php';
            echo "<script>alert('请输入正确的邮箱！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}
$Use_DB = new Use_DB();
$Use_DB->pass();
?>