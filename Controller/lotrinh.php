<?php
    $action = 'lotrinh';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'lotrinh':
            include './View/lotrinh.php';
            break;
        case 'tientrinh':
            include './View/tientrinh.php';
            break;
        case 'up':
            $lt = new lotrinh();
            $lt->settientrinh($_SESSION['mssv'],$_GET['makh']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khoahoc&act=danghoc&makh='.$_GET['makh'].'">';
            break;
    }
?>