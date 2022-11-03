<?php
    $action = 'blog';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'blog':
            include './View/blog.php';
            break;
        case 'detail':
            include './View/chitietblog.php';
            break;
        case 'binhluan':
            $binhluan = new binhluan();
            $binhluan->addBinhluan($_GET['mabl'],$_SESSION['mssv'],$_POST['comment']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=blog&act=detail&mabl='.$_GET['mabl'].'&show">';
            break;
        case 'themblog':
            include './View/themblog.php';
            break;
        case 'themblog_action':
            $bl = new blog();
            $ngaydang = date('Y-m-d');
            $mabl = $bl->addblog($_SESSION['mssv'],$_POST['title'],$_POST['file'],$ngaydang);
            $num = 1;
            for($i =1;$i<=$_POST['sochitiet'];$i++){
                $bl->addBlogDetail($mabl[0],$_POST[$i],$_POST[1]);
                
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=blog">';
            break;
        case 'like':
            if(isset($_SESSION['mssv'])){
                $bl = new blog();
                if($bl->checklike($_GET['id'],$_SESSION['mssv'])==false){
                    $bl->likeblog($_GET['id'],$_SESSION['mssv']);
                }
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=blog&act=detail&mabl='.$_GET['id'].'">';
            }
            else{
                include 'View/login.php';
            }

            break;
    }
?>