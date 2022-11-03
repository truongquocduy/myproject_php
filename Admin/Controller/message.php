<?php
    $action = 'message';
    if(isset($_GET['act'])){
        $action = $_GET['act'];
    }
    switch($action){
        case 'message':
            include './View/message.php';
            break;
        case 'chat':
            if($_FILES["hinhup"]["name"]!=''){
                $target_dir="../Public/img/";
                $target_file=$target_dir.basename($_FILES["hinhup"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $uploadimage = true;
                if(isset($_POST['submit'])){
                    $check = getimagesize($_FILES['hinhup']['tmp_name']);
                    if($check)
                        $uploadimage = true;
                    else
                        $uploadimage = false;
                    
                }
                if(file_exists($target_file))
                    $uploadimage=false;
                if($_FILES['hinhup']['size']>500000)
                    $uploadimage = false;
                if($imageFileType!='jpg' && $imageFileType!='jpeg' &&$imageFileType!='png' &&$imageFileType!='gif')
                    $uploadimage = false;
                if($uploadimage){
                    if(move_uploaded_file($_FILES['hinhup']['tmp_name'],$target_file));
                }
                
            }
            //-----------------
            $myFile = fopen("../Public/chat.txt","a") or die("Không thể viết file");
            if($_FILES["hinhup"]["name"]!=''){
                fwrite($myFile,"img?admin?".$_GET['id']."-".$_POST['tn']."\n");
            }
            else{
                fwrite($myFile,"admin?".$_GET['id']."-".$_POST['tn']."\n");
            }
            fclose($myFile);

            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=message&id='.$_GET['id'].'">';
            break;
        case 'chitiet':
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=message&id='.$_GET['id'].'">';
            

            break;
    }
?>