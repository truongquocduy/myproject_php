<?php
    class khoahoc{
        function __construct(){

        }

        function getallkhoahoc(){
            $db = new connect();
            $query = "SELECT * FROM khoahoc";
            $result = $db->getList($query);
            return $result;
        }
        function mothi($lanthi){
            $db = new connect();
            $query = "update khoadanghoc set ".$lanthi."_trangthai = 0";
            $result = $db->getexec($query);
            return $result;
        }
        function khoathi($lanthi){
            $db = new connect();
            $query = "update khoadanghoc set ".$lanthi."_trangthai = 1";
            $result = $db->getexec($query);
            return $result;
        }
        function getdoanhthu(){
            $db = new connect();
            $query = "select kdh.ngaythanhtoan, sum(kh.hocphi) as hocphi from khoahoc kh, khoadanghoc kdh where kh.makhoahoc=kdh.makhoahoc GROUP by kdh.ngaythanhtoan";
            $result = $db->getList($query);
            return $result;
        }
        function gettongdoanhthu(){
            $db = new connect();
            $query = "select sum(kh.hocphi) as hocphi from khoahoc kh, khoadanghoc kdh where kh.makhoahoc=kdh.makhoahoc ";
            $result = $db->getInstance($query);
            return $result[0];
        }

    }

?>