<?php
    $action = 'dashboard';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'dashboard':
            include './View/dashboard.php';
            break;
        case 'blog':
            echo '<meta http-equiv="refresh" content="0;url=../index.php?action=blog&act=detail&mabl='.$_GET['id'].'">';
            break;
        case 'student':
            include './View/student.php';
            break;
    }
?>