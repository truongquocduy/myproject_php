<?php
    class sinhvien{
        function __construct(){

        }

        function getList(){
            $db = new connect();
            $query = "SELECT * FROM sinhvien";
            $result = $db->getList($query);
            return $result;
        }
        function count(){
            $db = new connect();
            $query = "SELECT count(massv) FROM sinhvien";
            $result = $db->getInstance($query);
            return $result[0];
        }
        function getDetail($mssv){
            $db = new connect();
            $query = "SELECT * FROM sinhvien where massv = $mssv";
            $result = $db->getInstance($query);
            return $result;
        }
        function create($mssv,$hoten,$lop,$phai,$ngaysinh,$diachi,$sdt,$email,$pass){
            $db = new connect();
            $query = "insert into sinhvien(massv,hoten,lop,phai,hinhanh,ngaysinh,diachi,sdt,email) values($mssv,'$hoten','$lop','$phai','nam.png','$ngaysinh','$diachi',$sdt,'$email')";
            $sinhvien = $db->getexec($query);
            $query = "insert into login(id,massv,password) values(null,$mssv,'$pass')";
            $sinhvien = $db->getexec($query);
            return $sinhvien;
        }
        
        function filter($dieukien1,$dieukien2){
            $db = new connect();
            if($dieukien2 == 'Nam' || $dieukien2 == 'Nu')
                $query = "SELECT * FROM sinhvien where phai='$dieukien2'";
            if($dieukien2 == 'CD20CT12' || $dieukien2 == 'CD20CT13')
                $query = "SELECT * FROM sinhvien where lop='$dieukien2'";
            if($dieukien1=='macdinh')
                $query = "SELECT * FROM sinhvien";


            $result = $db->getList($query);
            return $result;
        }
        function getdiem($massv){
            $db = new connect();
            $select = "select * from khoahoc kh,khoadanghoc kdh where kh.makhoahoc=kdh.makhoahoc and kdh.massv =$massv";
            $result = $db->getList($select);
            return $result;
        }
        function gethocluc(){
            $db = new connect();
            $select = "select COUNT(massv) from sinhvien WHERE hocluc = 'Giỏi'";
            $gioi = $db->getInstance($select)[0];
            $select = "select COUNT(massv) from sinhvien WHERE hocluc = 'Yếu'";
            $yeu = $db->getInstance($select)[0];
            $select = "select COUNT(massv) from sinhvien WHERE hocluc = 'Xuất sắc'";
            $xuatsac = $db->getInstance($select)[0];
            $select = "select COUNT(massv) from sinhvien WHERE hocluc = 'Trung bình'";
            $trungbinh = $db->getInstance($select)[0];
            $select = "select COUNT(massv) from sinhvien WHERE hocluc = 'Khá'";
            $kha = $db->getInstance($select)[0];
            return ['Gioi'=>$gioi,'Yeu'=>$yeu,'Xuatsac'=>$xuatsac,'Trungbinh'=>$trungbinh,'Kha'=>$kha];
        }
        function khoadiem(){
            $db = new connect();
            $select = "select massv from sinhvien";
            $slsv = $db->getList($select);
            while($setms = $slsv->fetch()){
                $diemtb = 0;
                $updatehocluc = $db->getList("select * from khoadanghoc where massv = ".$setms['massv']."");
                while($set = $updatehocluc->fetch()){
                    $diemtb += ($set['thi1'] + $set['thi2'] + $set['hocphan']);
                }
                $diemtb /=12;
                if($diemtb>9)
                    $hocluc = 'Xuất sắc';
                if($diemtb<9 && $diemtb >=8)
                    $hocluc = 'Giỏi';
                if($diemtb<8 && $diemtb >=6.5)
                    $hocluc = 'Khá';
                if($diemtb<6.5 && $diemtb >=5)
                    $hocluc = 'Trung Bình';
                if($diemtb<5)
                    $hocluc = 'Yếu';
                $update = "update sinhvien set hocluc = '$hocluc',diemtb=$diemtb WHERE massv = ".$setms['massv']."";
                $sinhvien = $db->getexec($update);
            }
        }
        function delete($massv){
            $db = new connect();
            $database_table = ['binhluan','khoadanghoc','login','yeuthichblog','sinhvien'];
            foreach($database_table as $value){
                $query = "delete from $value where massv =$massv";
                $result = $db->getexec($query);

            }
            return $database_table;
        }
        function getTop3(){
            $db = new connect();
            $select = "SELECT * from sinhvien ORDER by diemtb DESC limit 3";
            $result = $db->getList($select);
            return $result;
        }
        function updateSinhVien($massv,$hoten,$lop,$phai,$ngaysinh,$diachi,$sdt,$email,$checkmk,$matkhau){
            $db = new connect();
            if($checkmk==true){
                $mk = md5($matkhau);
                $update = "update sinhvien sv,login lg set sv.massv = $massv,lg.massv = $massv,sv.hoten = '$hoten',sv.lop='$lop',sv.phai='$phai',sv.ngaysinh ='$ngaysinh',sv.diachi = '$diachi',sv.sdt=$sdt,sv.email='$email', lg.password = '$mk' where sv.massv = lg.massv and sv.massv = $massv";
            }
            else{
                $update = "update sinhvien sv,login lg set sv.massv = $massv,lg.massv = $massv,sv.hoten = '$hoten',sv.lop='$lop',sv.phai='$phai',sv.ngaysinh ='$ngaysinh',sv.diachi = '$diachi',sv.sdt=$sdt,sv.email='$email' where sv.massv=lg.massv and sv.massv = $massv";
            }
            $sinhvien = $db->getexec($update);
            return $sinhvien;
        }

    }

?>