<?php
    $action = 'giohang';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'giohang':
            if(!isset($_SESSION['mssv'])){
                echo "<script>window.onload = ()=>{thongbao('Vui lòng đăng nhập','Đăng nhập để xem giỏ hàng','warning')}</script>";
                include './View/login.php';
                
            }
            else{
                
                include './View/giohang.php';
            }
            break;
        case 'add':
           if(isset($_SESSION['mssv'])){
                array_push($_SESSION['giohang'],$_GET['makh']);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khoahoc&act=chitiet&makh='.$_GET['makh'].'">';
            }
            else{
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';
                echo "<script>alert('Đăng nhập để mua khóa học!!!')</script>";
            }
        break;
        case 'del':
            $_SESSION['giohang']=array();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang">';

         break;
        case 'thanhtoan':
            $kh = new khoahoc();
            foreach($_SESSION['giohang'] as $item){
                $kh->setKhoaDangHoc($_SESSION['mssv'],$item);
            }
            $_SESSION['giohang']=array();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';
            
        break;
    }
?>