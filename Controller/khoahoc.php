<?php
    $action = 'khoahoc';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'khoahoc':
            include './View/khoahoc.php';
            break;
        case 'chitiet':
            include './View/chitietkhoahoc.php';
            break;
        case 'danghoc':
            include './View/danghoc.php';
            break;
    }
?>