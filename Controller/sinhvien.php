<?php
    $action = 'sinhvien';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'sinhvien':
            if(isset($_SESSION['mssv'])){
                include './View/sinhvien.php';
                break;
            }
            include './View/login.php';
            break;
        case 'login':
            if(isset($_SESSION['mssv'])){
                include './View/sinhvien.php';
                break;
            }
            $sinhvien = new sinhvien();
            if(isset($_POST['mssv']) && isset($_POST['pass'])){
                try {
                    $mssv = $_POST['mssv'];
                    $pass = md5($_POST['pass']);
                    $kq = $sinhvien->login($mssv,$pass);
    
                    if(!$kq){
                        echo "<script>window.onload = ()=>{thongbao('Đăng nhập thất bại','Mã số sinh viên và mật khẩu không hợp lệ','warning')}</script>";
                        
                        include './View/login.php';
                    }
                    else{// trường hợp đăng nhập đúng
                        $_SESSION['mssv'] = $kq['massv'];
                        if(!isset($_SESSION['giohang'])){
                            $_SESSION['giohang'] = array();
                        }
                        // echo "<script>window.onload = ()=>{thongbao('Đăng nhập thành công','Mã số sinh viên và mật khẩu trùng khớp','success')}</script>";
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';

                    }

    
                  } catch (PDOException $e) {
                    // echo $e->getMessage();
                    echo "<script>window.onload = ()=>{thongbao('Tạo tài khoản thất bại','Mã số sinh viên có thể đã trùng','warning')}</script>";
                    include './View/login.php';


                  }
                
            }
            else{
                include './View/login.php';
            }
            break;
        case 'logout':
            // session_destroy();
            unset($_SESSION['mssv']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';
            break;
        case 'create':
            include './View/taotaikhoan.php';
            break;
        case 'create_action':
            $sv = new sinhvien();
            $pass = md5($_POST['pass']);
            try {
                
                $result = $sv->create($_POST['mssv'],$_POST['hoten'],$_POST['lop'],$_POST['phai'],$_POST['ngaysinh'],$_POST['diachi'],$_POST['sdt'],$_POST['email'],$pass);
                echo "<script>window.onload = ()=>{thongbao('Tạo tài khoản thành công','Xin hãy đăng nhập','success')}</script>";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';

              } catch (PDOException $e) {
                // echo $e->getMessage();
                echo "<script>window.onload = ()=>{thongbao('Tạo tài khoản thất bại','Mã số sinh viên có thể đã trùng','warning')}</script>";
              }
            include './View/taotaikhoan.php';
            // echo $_POST['mssv'];
            break;
        case 'update':
             //phần upfile
             
             $target_dir="./Public/img/";
             $target_file=$target_dir.basename($_FILES["hinh"]["name"]);
             $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
             $uploadimage = true;
             if(isset($_POST['submit'])){
                 $check = getimagesize($_FILES['hinh']['tmp_name']);
                 if($check)
                     $uploadimage = true;
                 else
                     $uploadimage = false;
                 
             }
             if(file_exists($target_file))
                 $uploadimage=false;
             if($_FILES['hinh']['size']>500000)
                 $uploadimage = false;
             if($imageFileType!='jpg' && $imageFileType!='jpeg' &&$imageFileType!='png' &&$imageFileType!='gif')
                 $uploadimage = false;
             if($uploadimage){
                 if(move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file));
             }
            if(isset($_POST['hinhan']) && $_POST['hinhan'] != ''){
                $_FILES["hinh"]["name"] = $_POST['hinhan'];
            }
            $sv = new sinhvien();
            $sv->updateSinhVien($_SESSION['mssv'],$_POST['hoten'],$_POST['ngaysinh'],$_POST['diachi'],$_POST['sdt'],$_POST['email'],$_FILES["hinh"]["name"]);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';
            break;
        case 'baithi':
            if(isset($_POST['cau1']) && isset($_POST['cau2'])){
                $tyle = 10/2;
                $socaudung=0;
                if($_POST['cau1'] == 1) $socaudung++;
                if($_POST['cau2'] == 2) $socaudung++;
                $diem = $socaudung*$tyle;
                
            }
            else{
                $diem = 0;
            }
            $sv = new sinhvien();
            $sv->updateDiem($_GET['makh'],$_SESSION['mssv'],$diem,$_SESSION['lanthi']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien">';
            break;
        case 'chat':
            if($_FILES["hinhgui"]["name"]!=''){
                $target_dir="./Public/img/";
                $target_file=$target_dir.basename($_FILES["hinhgui"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $uploadimage = true;
                if(isset($_POST['submit'])){
                    $check = getimagesize($_FILES['hinhgui']['tmp_name']);
                    if($check)
                        $uploadimage = true;
                    else
                        $uploadimage = false;
                    
                }
                if(file_exists($target_file))
                    $uploadimage=false;
                if($_FILES['hinhgui']['size']>500000)
                    $uploadimage = false;
                if($imageFileType!='jpg' && $imageFileType!='jpeg' &&$imageFileType!='png' &&$imageFileType!='gif')
                    $uploadimage = false;
                if($uploadimage){
                    if(move_uploaded_file($_FILES['hinhgui']['tmp_name'],$target_file));
                }
            }
            $myFile = fopen("./Public/chat.txt","a") or die("Không thể viết file");
            if($_FILES["hinhgui"]["name"]!=''){
                fwrite($myFile,"img?".$_SESSION['mssv']."-".$_POST['tn']."\n");
            }
            else{
                fwrite($myFile,$_SESSION['mssv']."-".$_POST['tn']."\n");
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sinhvien&show">';
            break;
    }
?>