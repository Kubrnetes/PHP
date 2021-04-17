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
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#" style="font-size: 25px">添加操作</a></li>
            <li role="presentation"><a href="show.php" style="font-size: 20px">返回</a></li>
        </ul>
        <br><br>
        <form class="form-horizontal" action="adddata.php" method="post" onsubmit="return login_user()">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" placeholder="用户名" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">年龄</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="age" placeholder="年龄" name="age">
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-sm-2 control-label">国家</label>
                <div class="col-sm-6">
                    <div class="dropdown">
                        <select class="form-control" name="className">
                            <?php include("querydata.php");
                            $sql = new querydata();
                            foreach ($sql->query_data() as $key => $value) {
                                ?>
                                <option value="<?php echo $value["className"] ?>" name="className"><?php echo $value["className"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" value="add_user" name="add">添加</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
<script type="text/javascript">
    function login_user() {
        var username = document.getElementById("username");
        var age = document.getElementById("age");
        if (username.value === "" || username.value === null) {
            alert("请输入用户名");
            return false;
        }
        if (age.value === "" || age.value === null) {
            alert("请输入年龄！");
            return false;
        }
    }
</script>
</html>