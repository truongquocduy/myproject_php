<?php
    class binhluan{
        function __construct(){

        }

        function getAllBinhluan($mabl){
            $db = new connect();
            $query = "select binhluan.*,sinhvien.hoten from binhluan,sinhvien where mabl = $mabl and sinhvien.massv = binhluan.massv";
            $result = $db->getList($query);
            return $result;
        }
        function addBinhluan($mabl,$massv,$noidung){
            $db = new connect();
            $query = "insert into binhluan(id,mabl,massv,noidung) values(null,$mabl,$massv,'$noidung')";
            $result = $db->getexec($query);
            return $result;
        }
        function getTongBinhluan($mabl){
            $db = new connect();
            $query = "select count(mabl) from binhluan where mabl = $mabl";
            $result = $db->getInstance($query);
            return $result[0];
        }

    }

    

?>