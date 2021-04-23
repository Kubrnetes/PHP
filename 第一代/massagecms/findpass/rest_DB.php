<?php
require ("../config/DB_Interface.php");
session_start();
class rest_DB{
    public function update_pass(){
        @$session = $_SESSION["res_pass"];
        @$password = md5($_POST["inputPassword1"]);
        if (isset($session)){
            $link = new DB();
            $sql = "update users set user_pass = '$password' where user_name = '$session'";
            $link->Exec($sql);
            if ($link->affectRows($link) == 1){
                $url = "../login.php";
                echo "<script>alert('修改成功！')</script>";
                echo "<script>window.location.href='$url'</script>";
            }else{
                $url = "./find_pass.php";
                echo "<script>alert('修改失败！')</script>";
                echo "<script>window.location.href='$url'</script>";
            }
        }
    }
}
$rest_DB = new rest_DB();
$rest_DB->update_pass();
?>