<?php
    class binhluan{
        function __construct(){

        }

        function getTongBinhluan(){
            $db = new connect();
            $query = "select count(mabl) from binhluan";
            $result = $db->getInstance($query);
            return $result[0];
        }
        function getTongBinhluanID($mabl){
            $db = new connect();
            $query = "select count(bl.mabl) from binhluan bl,blog blg where bl.mabl=blg.mabl and bl.mabl=$mabl";
            $result = $db->getInstance($query);
            return $result[0];
        }

    }

    

?>