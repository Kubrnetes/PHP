<?php
require("./DB_Interface.php");

class Use_mysql
{
    public function delete_data()
    {
        @$id = $_GET["id"];
        $link = new DB();
        $sql = "delete from comment where comment_id = $id";
        $link->Exec($sql);
        if ($link->affectRows($link) != 1) {
            echo "<script>alert('数据错误！')</script>";
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            echo "<script>alert('删除成功！')</script>";
            session_start();
            if (isset($_SESSION["admin"])){
                $url_admin = "../admin/my_admin.php";
                echo "<script>window.location.href='$url_admin'</script>";
            }
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        }
    }

    public function update_data()
    {
        @$text = $_POST["change"];
        @$id = $_POST["id"];
        $link = new DB();
        $sql = "update comment set text = '$text' where comment_id = $id";
        $link->Exec($sql);
        if ($link->affectRows($link) != 1) {
            echo "<script>alert('数据错误！')</script>";
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            echo "<script>alert('修改成功！')</script>";
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        }
    }

    public function Insert_data()
    {
        @$text = $_POST["insert"];
        @$username = $_POST["username"];
        $link = new DB();
        $sql = "insert into comment(username,text,pub_date) values('$username','$text',now())";
        $link->Exec($sql);
        if ($link->affectRows($link) != 1) {
            echo "<script>alert('数据错误！')</script>";
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            echo "<script>alert('留言成功！')</script>";
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}

$Use_mysql = new Use_mysql();
if (isset($_GET["id"])) {
    $Use_mysql->delete_data();
} elseif (isset($_POST["change"]) && $_POST["id"]) {
    $Use_mysql->update_data();
} elseif (isset($_POST["insert"]) && $_POST["username"]) {
    $Use_mysql->Insert_data();
} else {
    $url = "./update.php";
    echo "<script>alert('数据错误！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
?>