<?php
require("DB_Interface.php");

class DB_search
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function search()
    {
        $link = new DB();
        $data = $this->data;
        $sql = "select * from comment where text like '%$data%'";
        $data = $link->Exec($sql);
        $array = array();
        foreach ($data as $key => $value) {
            array_push($array, $value);
        }
        return $array;
    }
}

?>