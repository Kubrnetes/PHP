<?php
require("../config/DB_Interface.php");

class delete_users
{
    public function delte()
    {
        $link = new DB();
        $id = $_GET["id"];
        $sql = "delete from users where user_id = $id";
        $link->Exec($sql);
        if ($link->affectRows($link) != 1) {
            echo "<script>alert('数据错误！')</script>";
            $url = "./delete_users.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $user = $_GET["user"];
            $sql = "delete from comment where username = '$user'";
            $link->Exec($sql);
            $url = "./my_admin.php";
            echo "<script>alert('删除成功！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}

$delete_users = new delete_users();
$delete_users->delte();
?>