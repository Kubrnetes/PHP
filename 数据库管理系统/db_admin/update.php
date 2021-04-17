<?php

class update
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "test";

    public function update_db()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        $id = $_GET["id"];
        $sql = "select * from student where id = $id";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_affected_rows($link);
        if ($rows == 0) {
            echo "数据错误！";
            $url = "./show.php";
            echo "<script>window.location.href='$url'</script>";
        }
        $rows = mysqli_fetch_assoc($result);
        return $rows;
    }
}

class change
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "test";

    public function change_data($id)
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        $username = $_POST["username"];
        $age = $_POST["age"];
        $className = $_POST["className"];
        if ($className == "蜀国") {
            $className = 1;
        } elseif ($className == "吴国") {
            $className = 2;
        } elseif ($className == "魏国") {
            $className = 3;
        } else {
            echo "数据错误！";
            $url = "./change.php";
            echo "<script>window.location.href='$url'</script>";
        }
        $sql_name = "update student set name = '$username' where $id";
        $sql_age = "update student set age = $age where $id";
        $sql_className = "update student set className = $className where $id";
        mysqli_query($link, $sql_name);
        mysqli_query($link, $sql_age);
        mysqli_query($link, $sql_className);
        $rows = mysqli_affected_rows($link);
        if ($rows == 0) {
            $url = "./change.php";
            echo "<script>alert('数据修改失败！')</script>";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $url = "./show.php";
            echo "<script>alert('数据修改成功！')</script>";
//            echo "<script>window.location.href='$url'</script>";
        }
    }
}
@$id = $_POST["id"];
if ($id){
    $change = new change();
    $change->change_data($id);
}
?>