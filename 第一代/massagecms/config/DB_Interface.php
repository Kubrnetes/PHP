<?php

abstract class DB_Interface
{
    // 连接数据库
    abstract function con();

    // 查询单行数据
    abstract function get_data($sql);

    // 查询多行数据
    abstract function get_datas($sql);

    // 查询指定数据
    abstract function get_One_data($sql);

    // 执行数据库修改/删除操作
    abstract function Exec($sql);

    // 返回上一条语句的相应行数
    abstract function affectRows();
}

class DB extends DB_Interface
{

    public $link = null;

    public function __construct()
    {
        $mysql_config = require("config.php");
        $this->link = new mysqli($mysql_config["host"], $mysql_config["username"], $mysql_config["password"], $mysql_config["db"]);
        return $this->link;
    }

    public function con()
    {
        return $this->link;
    }

    public function get_data($sql)
    {
        $result = $this->link->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function get_datas($sql)
    {
        $result = $this->link->query($sql);
        $array = array();
        while ($datas = $result->fetch_assoc()) {
            array_push($array, $datas);
        }
        return $array;
    }

    public function get_One_data($sql)
    {
        $result = $this->link->query($sql);
        $data = $result->fetch_row()[0];
        return $data;
    }

    public function Exec($sql)
    {
        $result = $this->link->query($sql);
        return $result;
    }

    public function affectRows()
    {
        $result = $this->link->affected_rows;
        return $result;
    }
}
?>