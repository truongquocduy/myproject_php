<?php
    $action = 'student';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'student':
            include './View/student.php';
            break;
        case 'create':
            include './View/addstudent.php';
            break;
        case 'create_action':
           
            //---------------
            $sv = new sinhvien();
            $pass = md5($_POST['pass']);
            try {
                
                $result = $sv->create($_POST['mssv'],$_POST['hoten'],$_POST['lop'],$_POST['phai'],$_POST['ngaysinh'],$_POST['diachi'],$_POST['sdt'],$_POST['email'],$pass);
                echo "<script>window.onload = ()=>{thongbao('Tạo tài khoản thành công','Xin hãy đăng nhập','success')}</script>";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home">';

                } catch (PDOException $e) {
                // echo $e->getMessage();
                echo "<script>window.onload = ()=>{thongbao('Tạo tài khoản thất bại','Mã số sinh viên có thể đã trùng','warning')}</script>";
                }
            // echo $_POST['mssv'];
            break;
        case 'khoadiem':
            $sv = new sinhvien();
            $sv->khoadiem();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home">';
            break;
        case 'del':
            $sv = new sinhvien();
            $result = $sv->delete($_GET['id']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home">';
            break;
        case 'update':
            $sv = new sinhvien();
            $sv->updateSinhVien($_POST['mssv'],$_POST['hoten'],$_POST['lop'],$_POST['phai'],$_POST['ngaysinh'],$_POST['diachi'],$_POST['sdt'],$_POST['email'],$_POST['check_matkhau'],$_POST['pass']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=student">';
            break;
    }
?>