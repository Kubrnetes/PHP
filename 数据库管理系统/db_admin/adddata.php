<?php

class register
{
    protected $host;
    protected $user;
    protected $password;
    protected $db;

    public function __construct($host, $user, $password, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    public function register_user()
    {
        $user = trim($_POST["Username"]);   /* 去除首尾空白字符 */
        $password = trim($_POST["inputPassword1"]);  /* 去除首尾空白字符 */
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        $sql = " insert into users(username,password) values ('$user','$password')";
        mysqli_query($link, $sql);
        $rows = mysqli_affected_rows($link);
        if ($rows == 0) {
            $url = "./register.html";
            echo "<script>alert('用户注册失败！')</script>";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $url = "login.html";
            echo "<script>alert('用户注册成功！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}

class login extends register
{
    public function __construct($host, $user, $password, $db)
    {
        parent::__construct($host, $user, $password, $db);
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    public function login()
    {
        $Username = $_POST["Username"];
        $Password = $_POST["inputPassword1"];
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        $sql = "select password from users where username = '$Username'";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_assoc($result);
        if ($Password == $rows["password"]) {
            session_start();
            $_SESSION["session"] = "users";
            $url = "./show.php";
            echo "<script>window.location.href='$url'</script>";
        } else {
            $url = "./login.html";
            echo "<script>alert('用户名或密码错误！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
    }
}
class add_data{
    private $host = "localhost";
    private $db = "test";
    private $user = "root";
    private $password = "root";

    public function link()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    public function addata()
    {
        $link = $this->link();
        $username = $_POST["username"];
        $age = (int)$_POST["age"];
        $className = $_POST["className"];
        if ($className == "蜀国"){
            $className = 1;
        }elseif ($className == "吴国"){
            $className = 2;
        }elseif ($className == "魏国"){
            $className = 3;
        }else{
            echo "数据错误！";
            $url = "./add.php";
            echo "<script>window.location.href='$url'</script>";
        }
        $sql = "insert into student(name,age,classId) values ('$username',$age,$className)";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            $url = './add.php';
            echo "<script>alert('数据添加失败！')</script>";
            echo "<script>window.location.href='$url'</script>";
        }
        else{
            $url = './show.php';
            echo "<script>window.location.href='$url'</script>";
        }
        mysqli_close($link);
    }
}
@$register = $_POST["register"];
if ($register == "register_user") {
    $register = new register("localhost", "root", "root", "test");
    $register->register_user();
}
@$login = $_POST["login"];
if ($login == "login_user") {
    $login = new login("localhost", "root", "root", "test");
    $login->login();
}
@$add = $_POST["add"];
if ($add == "add_user"){
    $add = new add_data();
    $add->addata();
}
?>