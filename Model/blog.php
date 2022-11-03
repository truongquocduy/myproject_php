<?php
    class blog{
        function __construct(){

        }

        function getAllBlog($pagenumber){
            $db = new connect();
            $start = $pagenumber*4-4;
            $end = 4;//mỗi trang hiển 4 blog
            $query = "SELECT bl.*,sv.hoten FROM blog bl, sinhvien sv where bl.massv = sv.massv order by mabl desc LIMIT $start,$end";
            $result = $db->getList($query);
            return $result;
        }
        function findAllBlog($find){
            $db = new connect();
            $query = "SELECT * FROM blog where tieude like '%$find%'";
            $result = $db->getList($query);
            return $result;
        }
        function getDetails($mabl){
            $db = new connect();
            $query = "SELECT bl.tieude,sv.hoten,ct.noidung FROM chitietblog ct,sinhvien sv, blog bl where ct.mabl = bl.mabl and bl.massv = sv.massv and ct.mabl = $mabl";
            $result = $db->getList($query);
            return $result;
        }
        function addblog($massv,$tieude,$hinhanh,$ngaydang){
            $db = new connect();
            $query = "insert into blog(mabl,massv,tieude,hinhanh,ngaydang) values(null,$massv,'$tieude','$hinhanh','$ngaydang')";
            $blog = $db->getexec($query);
            $select = 'select * from blog order by mabl desc limit 1';
            $blog = $db->getInstance($select);
            return $blog;
        }
        function addBlogDetail($mabl,$noidung,$mota){
            $db = new connect();
            $query = "insert into chitietblog(id,mabl,noidung) values(null,$mabl,'$noidung')";
            $blog = $db->getexec($query);
            $update = "update blog set noidung = '$mota' where mabl = $mabl";
            $blog = $db->getexec($update);

            return $blog;
        }
        function getPageNumber(){
            $db = new connect();
            $query = "select count(mabl) from blog";
            $result = $db->getInstance($query);//0
            $trangle = $result[0]%4;//0%4=4
            if($trangle!=0 || (int)($result[0]/4) == 0){
                $result=(int)($result[0]/4)+1;
            }
            else{
                $result=(int)($result[0]/4);
            }
            return $result;//1
        }
        function likeblog($mabl,$massv){
            $db = new connect();
            $query = "insert into yeuthichblog(id,mabl,massv,trangthai) values(null,$mabl,$massv,1)";
            $blog = $db->getexec($query);
            return $blog;
        }
        function checklike($mabl,$massv){
            $db = new connect();
            $query = "select * from yeuthichblog where mabl = $mabl and massv = $massv";
            $blog = $db->getInstance($query);
            return $blog;
        }

    }

?>