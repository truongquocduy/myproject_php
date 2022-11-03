<div class="row justify-content-center ps-4 pe-4" style="margin-top: 80px;">
    <div class="col-lg-12 mb-2">
        <button class="btn btn-outline-primary" style="min-width: 200px;">Tất cả tin nhắn <span class="badge bg-danger">4</span></button>
        <button class="btn btn-outline-primary" style="min-width: 200px;">Message <span class="badge bg-danger">2</span></button>
        <button class="btn btn-outline-primary" style="min-width: 200px;">Bình Luận</button>
        <button class="btn btn-outline-primary" style="min-width: 200px;">Plugin chat</button>
    </div>
    <div class="col-lg-3">
        <div class="mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Tìm kiếm">
        </div>
        <?php
             $myFile = fopen("../Public/chat.txt","r") or die("Không thể mở file");
             $str = substr(fgets($myFile),0,9);
             $mangsv = [$str];
             while(!feof($myFile)){
                 $tungdong_chat = fgets($myFile);
                 $str_ss09= substr($tungdong_chat,0,9);
                 $str_ss05= substr($tungdong_chat,0,5);
                 $str_ss03= substr($tungdong_chat,0,3);
                 if($str_ss09!=$str && $str_ss05 !='admin' && $str_ss03 !='img'){
                     array_push($mangsv,$str_ss09);
                    $str=$str_ss09;
                 }
         
             }
             fclose($myFile);
        ?>
            
        <?php
        $mangsv = array_values(array_unique($mangsv));
            foreach ($mangsv as $key => $value):
                $sv = new sinhvien();
                $setsv = $sv->getDetail((int)$value);
                if($setsv != false){
        ?>
        <div class="w-100 p-2 hover_chat hover_active" style="height: 86px;border-bottom: 1px solid #ced4da;">
                <a href="index.php?action=message&act=chitiet&id=<?php echo $setsv['massv'];?>">
                    <img src="../Public/img/<?php echo $setsv['hinhanh'];?>" alt=""  style="height:60px;float: left;margin-right: 10px;">
                    <h6 class="text-dark"><?php echo $setsv['hoten'];?></h6>
                    <h6 style="color:#a8b0b6;font-size: 14px;margin-bottom: 10px;">Em muốn được hỗ trợ . . .</h6>
                    <img src="../img/messegericon.png" alt="" width="32px" style="position: relative; top: -10px;left: -36px;">
                </a>
            </div>
        <?php
                }
            endforeach;
        ?>
        
    </div>
    <div class="col-lg-9 pt-3">
        <?php if(!isset($_GET['id'])):?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> Chọn để hiện thị tin nhắn.
            </div>
        <?php endif;?>
        <?php if(isset($_GET['id'])){?>
        <div class="row" style="border-bottom: 1px solid #ced4da">
            <div class="col-lg-7">
                <div class="w-100 p-2" style="height: 86px;">
                    <img src="../Public/img/nam.png" alt=""  style="height:60px;float: left;margin-right: 10px;">
                    <h5 class="text-dark" style="margin-top: 20px;"><strong>Trương Quốc Duy</strong></h5>
                </div>
            </div>
            <div class="col-lg-5 pt-4">
                <button class="btn btn-outline-primary me-2"><ion-icon name="alert-circle-outline" style="font-size: 24px;display: flex;"></ion-icon></button>
                <button class="btn btn-outline-primary me-2"><ion-icon name="trash-outline" style="font-size: 24px;display: flex;"></ion-icon></button>
                <button class="btn btn-outline-primary me-2"><ion-icon name="star-outline" style="font-size: 24px;display: flex;"></ion-icon></button>
                <button class="btn btn-outline-primary me-2"><ion-icon name="mail-open-outline" style="font-size: 24px;display: flex;"></ion-icon></button>
                <button class="btn btn-outline-primary me-2"><ion-icon name="checkmark-outline" style="font-size: 24px;display: flex;"></ion-icon></button>
            </div>
        </div>
        <div class="text-dark" id="noidung-hienthi" style="overflow-y: scroll;">
            <!-- nội dung nhập hiển thị ở đây -->
            <?php
                $myFile = fopen("../Public/chat.txt","r") or die("Không thể mở file");
                while(!feof($myFile)){
                    $str = fgets($myFile);
                    if(substr($str,0,9)==$_GET['id']){
                        echo ' <div class="tn-nguoigui  mt-1">'.substr($str,10).'</div><br><br>';
                    }
                    if(substr($str,0,5)=='admin' && substr($str,6,9)==$_GET['id']){
                        echo '<div class="tn-nguoitraloi text-light">'.substr($str,16).'</div><br><br>';
                        // echo '<script>alert("'.substr($str,-3).'")</script>';
                    }
                    if(substr($str,4,5)=='admin' && substr($str,10,9)==$_GET['id']){
                        echo '<img src="../Public/img/'.substr($str,20).'" alt=""  style="height:200px;border-radius:10px;float: right;"><br><br><br><br><br><br><br><br><br>';
                        // echo '<div class="tn-nguoitraloi text-light">'.substr($str,20).'</div><br><br>';
                    }
                    if(substr($str,0,3)=='img' && substr($str,4,9)==$_GET['id']){
                        echo '<img src="../Public/img/'.substr($str,14).'" alt=""  style="height:160px;margin-top:6px;border-radius:10px;float: left;"><br><br><br><br><br><br><br>';
                    }
                    // if(=='img'){
                    
            
                }
                fclose($myFile);
            
            ?>
        </div>
        <script>
                var objDiv = document.getElementById("noidung-hienthi");
                objDiv.scrollTop = objDiv.scrollHeight;
            </script>
        <form action="index.php?action=message&act=chat&id=<?php echo $_GET['id'];?>" id="tn-form" enctype="multipart/form-data" method="POST">
            <button class="btn text-success btn-outline-success" type="button" style="height:40px">
                <label for="fileup" style="display: inline-block;cursor: pointer;">
                    <ion-icon name="image-outline" style="display: flex;font-size: 24px;"></ion-icon>
                </label>
            </button>
            <input id="duy" type="text" autocomplete="off" name="tn" placeholder="  Nhập tin nhắn" style="border-radius: 10px;border: unset;background-color: rgba(180, 169, 169, 0.247);height: 40px;margin-top: 8px;outline: unset;width: 80%;" autofocus required>
            <input type="file"  name="hinhup" style="height: 40px;margin-top: 8px;display: none;" id="fileup" onchange="lenhinh(this)">
            <button class="btn text-light" type="submit" style="background-color: #287BFF;height: 40px;">
                <ion-icon name="send-outline" style="display: flex;font-size: 24px;"></ion-icon>
            </button>
        </form>
        <?php }?>
            <script>
                function lenhinh(ele){
                    document.getElementById('duy').value = ele.files[0].name
                }
            </script>
    </div>
</div>