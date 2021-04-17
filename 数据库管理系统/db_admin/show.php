<?php session_start();
@$session = $_SESSION["session"];
if (!isset($session)){
    $url = "./login.html";
    echo "<script>alert('请先登录！')</script>";
    echo "<script>window.location.href='$url'</script>";
}
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
            <li role="presentation"><a href="add.php" target="_blank" style="font-size: 20px ">添加</a></li>
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
            <tr>
                <?php
                include("querydata.php");
                $sql = new querydata();
                foreach ($sql->data() as $key => $value){
                ?>
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