<?php
    class blog{
        function __construct(){

        }
        function getBlogAdmin(){
            $db = new connect();
            if(func_num_args() > 0){
                switch(func_get_arg(0)){
                    case 'moinhat':
                        $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv order by blog.ngaydang desc";
                        break;
                    case 'cunhat':
                        $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv order by blog.ngaydang asc";
                        break;
                    case 'soluotlike':
                        $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv order by blog.ngaydang asc";
                        break;  
                    case 'tacgia':
                        $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv order by blog.massv desc";
                        break;
                    case 'macdinh':
                        $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv";
                        break;
                }
            }
            else{
                $query = "SELECT blog.*,sinhvien.hoten FROM blog,sinhvien where blog.massv=sinhvien.massv";
            }
            $result = $db->getList($query);
            return $result;
        }
        function getAllBlog($pagenumber){
            $db = new connect();
            $start = $pagenumber*4-4;
            $end = 4;//mỗi trang hiển 4 blog
            $query = "SELECT bl.*,sv.hoten FROM blog bl, sinhvien sv where bl.massv = sv.massv order by mabl desc LIMIT $start,$end";
            $result = $db->getList($query);
            return $result;
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
        function luotthichmotblog($id){
            $db = new connect();
            $query = "SELECT COUNT(bl.mabl) as soluong,yt.mabl FROM blog bl, yeuthichblog yt where bl.mabl = yt.mabl and bl.mabl=$id GROUP BY yt.mabl";
            $result = $db->getInstance($query);
            return $result;
            
        }

    }

?>