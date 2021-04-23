<?php

require("DB_Interface.php");
session_start();

class DB_Information
{
    public function update_data()
    {
        $DB_Use = new DB();
        $user_email = $_POST["inputEmail3"];
        $user_pass = md5($_POST["inputPassword1"]);
        $user_name = $_SESSION["users"];
        $sql = "update users set user_email = '$user_email' ,user_pass = '$user_pass' where user_name = '$user_name'";
        $DB_Use->Exec($sql);
        if ($DB_Use->affectRows($DB_Use) == 1) {
            $url = "../my_data.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $url = "../My_Information.php";
            echo "<script>alert('该邮箱已被使用！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }

    public function upload_file()
    {
        $file = $_FILES['exampleInputFile'];
        $url_file = "../My_Information.php";

        // 检测文件是否上传成功
        if (($file['error'] == 1) && ($file["size"] == 0)) {
            echo '<script>alert("请重新上传文件！")</script>';
            echo "<script>window.location.href='$url_file'</script>";
            exit();
        }
        // 检测文件大小
        if ($file['size'] > 1000000) {
            echo '<script>alert("文件大于1M，请重新上传")</script>';
            echo "<script>window.location.href='$url_file'</script>";
        }

        // 检测文件类型
        $allowMime = array('image/jpeg', 'image/png', 'image/gif');
        if (!in_array($file['type'], $allowMime)) {
            echo '<script>alert("该文件类型不允许上传！")</script>';
            echo "<script>window.location.href='$url_file'</script>";
        }

        // 检测图片是否为真实的图片
        if (!@getimagesize($file['tmp_name'])) {
            echo '<script>alert("不是真实的图片！")</script>';
            echo "<script>window.location.href='$url_file'</script>";
        }

        date_default_timezone_set('PRC');   // 设置为中国时区
        $time = date('Y-m-d h-i-s', time()) . ".png";   // 格式化时间戳

        $uploadpath = '../images/';
        //$new_file_name = trim($uploadpath) . trim($file['name']);   // 去除尾部的空字符
        $new_file_name = trim($uploadpath) . trim($time);   // 去除尾部的空字符
        // 去除尾部的原因是因为不去掉上传不上去
        $uploadpath = iconv('utf-8', 'gbk', $uploadpath);

        if (!file_exists($uploadpath)) { // 检测该目录是否存在
            $result = mkdir($uploadpath);    // 不存在就创建一个目录
        }

        if (move_uploaded_file($file['tmp_name'], $new_file_name)) {
            echo '<script>alert("修改成功！")</script>';
            $user_pic = preg_replace("/^\./", "", $new_file_name);    // 利用正则匹配点
            $user_name = $_SESSION["users"];
            $DB_Use = new DB();
            $sql = "update users set user_pic = '$user_pic' where user_name = '$user_name'";
            $DB_Use->Exec($sql);
            if ($DB_Use->affectRows($DB_Use) == 1) {
                $url = "../my_data.php";
                echo "<script>window.location.href='$url'</script>";
            } else {
                $url = "../My_Information.php";
                echo "<script>alert('该邮箱已被使用或')/script>";
                echo "<script>window.location.href='$url'</script>";
            }
        }
    }
}

$DB_Use = new DB_Information();

// 检测文件是否存在
@$file = $_FILES['exampleInputFile'];

//foreach ($file as $key => $value) {
//    echo $key . "：" . $value . "<br>";
//}

if (($file['error'] == 0) && ($file["size"] != 0)) {
    $DB_Use->upload_file();
} elseif (($file['error'] == 1) && ($file["size"] == 0)) {
    $DB_Use->upload_file();
} else {
    $DB_Use->update_data();
}
?>