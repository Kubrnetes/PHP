<?php

class querydata
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "test";

    public function link()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    public function data()
    {
        $link = $this->link();
        $sql = "select student.id,student.name,student.age,class.className from student inner join class on student.classId = class.id;";
        $result = mysqli_query($link, $sql);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row);
        }
        return $array;
    }

    public function query_data()
    {
        $link = $this->link();
        $sql = "select * from class";
        $result = mysqli_query($link, $sql);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)){
            array_push($array,$row);
        }
        return $array;
    }
}

?>