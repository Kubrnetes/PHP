<?php
class delete{
    private $host = "localhost";
    private $db = "test";
    private $user = "root";
    private $password = "root";

    public function link()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    public function deletedata()
    {
        $link = $this->link();
        $id = $_GET["id"];
        $sql = "delete from student where id = $id";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_affected_rows($link);    // sql语句执行后相应的行数
        if ($rows == 0) {
            echo "<script>alert('该行数据已被删除！')</script>";
        }else{
            $url = './show.php';
            echo "<script>window.location.href='$url'</script>";
            mysqli_close($link);
        }
    }
}
$delete = new delete();
$delete->deletedata();
?>