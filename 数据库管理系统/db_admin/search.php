<?php

class search
{
    private $host = "localhost";
    private $db = "test";
    private $user = "root";
    private $password = "root";

    public function link()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    public function search_data()
    {
        $data = $_GET["search_name"];
        $link = $this->link();
        $sql = "select student.id,student.name,student.age,class.className from student inner join class on student.classId = class.id and name like '%$data%'";
        $result = mysqli_query($link,$sql);
        $array=array();
        while ($rows = mysqli_fetch_assoc($result)){
            array_push($array,$rows);
        }
        return $array;
    }
}
//$search = new search();
//foreach ($search->search_data() as $key => $value) {
//    echo $value["id"]."<br>";
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库测试</title>
    <script type="text/javascript" src="../bootstrap/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-theme.min.css">
</head>
<body>

<div class="row">
    <!--    栅格系统-->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!--        搜索框-->
        <br><br>
        <form class="navbar-form navbar-right" action="search.php" method="get" onsubmit="return search()">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="名称" id="search_name" name="search_name">
            </div>
            <button type="submit" class="btn btn-default">查询</button>
        </form>
        <!--        导航条-->
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#" style="font-size: 25px ">数据库总数据</a></li>
            <li role="presentation"><a href="show.php" style="font-size: 20px ">返回</a></li>
        </ul>
        <br><br>
        <table class="table table-striped">
            <!--            行-->
            <tr>
                <!--                列-->
                <td>ID</td>
                <td>用户名</td>
                <td>年龄</td>
                <td>国家</td>
                <td>操作</td>
            </tr>
            <?php
            $search = new search();
            foreach ($search->search_data() as $key => $value){
            ?>
            <tr>
                <td><?php echo $value["id"]?></td>
                <td><?php echo $value["name"]?></td>
                <td><?php echo $value["age"]?></td>
                <td><?php echo $value["className"]?></td>
                <td><a href="./change.php?id=<?php echo $value["id"]?>" target="_blank">修改</a> | <a href="./delete.php?id=<?php echo $value["id"]?>">删除</a></td>
            </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
<script type="text/javascript">
    function search() {
        var search_name = document.getElementById("search_name");
        if (search_name.value === "" || search_name.value === null) {
            return false;
        }
    }
</script>
</body>
</html>