<?php
    $action = 'exam';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'exam':
            include './View/exam.php';
            break;
        case 'thi':
            $kdh = new khoahoc();
            $kdh->mothi($_GET['lanthi']);
            $_SESSION['lanthi'] = $_GET['lanthi'];
            include './View/exam.php';
            break;
        case 'khoa':
            $kdh = new khoahoc();
            unset($_SESSION['lanthi']);
            $kdh->khoathi($_GET['lanthi']);
            include './View/exam.php';
            break;

    }
?>