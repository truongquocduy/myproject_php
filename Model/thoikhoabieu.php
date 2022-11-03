<?php
    class thoikhoabieu{
        function __construct(){

        }

        function getDetail($lop){
            $db = new connect();
            $query = "SELECT * FROM thoikhoabieu where lop = '$lop'";
            $result = $db->getList($query);
            return $result;
        }

    }

?>