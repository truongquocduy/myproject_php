<?php
    class sinhvien{
        function __construct(){

        }

        function login($mssv,$password){
            $db = new connect();
            $query = "SELECT * FROM login where massv = $mssv and password = '$password'";
            $result = $db->getInstance($query);
            return $result;
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
        function updateSinhVien($massv,$hoten,$ngaysinh,$diachi,$sdt,$email,$hinh){
            $db = new connect();
            $update = "update sinhvien set hoten = '$hoten',ngaysinh ='$ngaysinh',diachi = '$diachi',sdt=$sdt,email='$email',hinhanh='$hinh' where massv = $massv";
            $sinhvien = $db->getexec($update);
            return $sinhvien;
        }
        function updateDiem($makhoahoc,$massv,$diem,$lanthi){
            $db = new connect();
            $update = "update khoadanghoc set $lanthi = $diem,$lanthi"."_trangthai=1 WHERE massv = $massv and makhoahoc='$makhoahoc'";
            $sinhvien = $db->getexec($update);
            return $sinhvien;
        }
        function getdiem($massv){
            $db = new connect();
            $select = "select * from khoahoc kh,khoadanghoc kdh where kh.makhoahoc=kdh.makhoahoc and kdh.massv =$massv";
            $result = $db->getList($select);
            return $result;
        }
        function updateHocluc($makhoahoc,$massv,$diem,$lanthi){
            $db = new connect();
            $update = "update khoadanghoc set $lanthi = $diem,trangthai=1 WHERE massv = $massv and makhoahoc='$makhoahoc'";
            $sinhvien = $db->getexec($update);
            return $sinhvien;
        }
        

    }

?>