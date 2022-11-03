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
        function findAllkhoahoc($find){
            $db = new connect();
            $query = "SELECT * FROM khoahoc where tenkhoahoc like '%$find%'";
            $result = $db->getList($query);
            return $result;
        }
        function getmotkhoahoc($makh){
            $db = new connect();
            $query = "SELECT * FROM khoahoc where makhoahoc = '$makh'";
            $result = $db->getInstance($query);
            return $result;
        }
        function getDetails($makh,$baihoc){
            $db = new connect();
            $query = "SELECT * FROM chitietkhoahoc where makhoahoc='$makh' and baihoc = '$baihoc'";
            $result = $db->getList($query);
            return $result;
        }
        function getTieuDe($makh){
            $db = new connect();
            $query = "SELECT DISTINCT baihoc,tieude  FROM `chitietkhoahoc` where makhoahoc = '$makh'";
            $result = $db->getList($query);
            return $result;
        }

        function getKhoaDangHoc($massv){
            $db = new connect();
            $query = "SELECT *  FROM khoadanghoc kdh,khoahoc kh where kdh.massv = $massv and kdh.makhoahoc=kh.makhoahoc";
            $result = $db->getList($query);
            return $result;
        }
        function setKhoaDangHoc($massv,$makhoahoc){
            $db = new connect();
            $query = "insert into khoadanghoc(id,makhoahoc,massv,ngaythanhtoan) values(null,'$makhoahoc',$massv,month(now()))";
            $result = $db->getexec($query);
            return $result;
        }
        //check xem xin viên đó đã đăng kí khóa học đó chưa;
        function checkKhoaHoc($massv,$makhoahoc){
            $db = new connect();
            $query = "select * from khoadanghoc where massv=$massv and makhoahoc = '$makhoahoc'";
            $result = $db->getInstance($query);
            return $result;
        }

    }

?>