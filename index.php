<?php
    include './Model/connect.php';
    include './Model/sinhvien.php';
    include './Model/khoahoc.php';
    include './Model/blog.php';
    include './Model/binhluan.php';
    include './Model/thoikhoabieu.php';
    include './Model/lotrinh.php';

    session_start();
    // session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="./Public/main.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        showAll = () =>{
        const collapse = document.getElementsByClassName('collapse baihoc');
        const nut = document.getElementById('nutmorong');
        switch(nut.innerText){
            case 'Mở rộng tất cả':
                for(let x of collapse){
                    x.classList += ' show';
                }
                nut.innerText = 'Thu gọn tất cả';
                break;
            case 'Thu gọn tất cả':
                for(let x of collapse){
                    x.classList = 'collapse baihoc';
                }
                nut.innerText = 'Mở rộng tất cả';
                break;
        }
        
        // document.getElementById('nutmorong').innerText = 'Thu gọn tất cả';

        thongbao = (title,noidung,loai) =>{
            Swal.fire({
                title: title,
                text: noidung,
                icon: loai

            })
        }

    }
    </script>
    <title>Document</title>
    <style>
         
        .frm_blog textarea::placeholder {
            font-size: 20px;
            /* font-weight: 500; */
        }
        .frm_blog input::placeholder {
            font-size: 40px;
            /* font-weight: 500; */
        }
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .inputfile + label {
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: black;
            display: inline-block;
            cursor: pointer;
        }

        .inputfile:focus + label,
        .inputfile + label:hover {
            background-color: red;
        }
        .mon__ul {list-style-type: none;}
        .month {
            padding: 40px 25px;
            width: 100%;
            background: #f05123;
            text-align: center;
        }

        .month ul {
            margin: 0;
            padding: 0;
        }

        .month ul li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .month .prev {
        float: left;
        padding-top: 10px;
        }

        .month .next {
        float: right;
        padding-top: 10px;
        }

        .weekdays {
            margin: 0;
            padding: 10px 0;
            background-color: #ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 12%;
            color: #666;
            text-align: center;
            font-size:14px;
        }

        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
        list-style-type: none;
        display: inline-block;
        width: 12%;
        text-align: center;
        margin-bottom: 5px;
        font-size:12px;
        color: #777;
        }
        .modal-backdrop {
            z-index: 1;
        }

        .days li.active{
        padding: 5px;
        background-color: #f05123;
        border-radius:4px;
        color: white !important
        }
        /* Add media queries for smaller screens */
        @media screen and (max-width:720px) {
        .weekdays li, .days li {width: 13.1%;}
        }

        @media screen and (max-width: 420px) {
        .weekdays li, .days li {width: 12.5%;}
        .days li .active {padding: 2px;}
        }

        @media screen and (max-width: 290px) {
        .weekdays li, .days li {width: 12.2%;}
        }
        #chatapp{
            transition:bottom linear 0s,right linear 0s,width linear 0.3s, height linear 0.3s;
        }
        #noidung-hienthi{
            width: 100%;
            height: 360px;
            float: left;
            padding-top: 10px;
            /* overflow-y: scroll; */
        }
        .tn-nguoitraloi{
            min-height: 40px;
            background-color: #ebe5e7f8;
            padding: 10px 30px;
            float: left;
            margin-right: 10px;
            border-radius: 10px;
            max-width: 75%;
        }
        .tn-nguoigui{
            background-color: #287BFF;
            padding: 10px 30px;
            float: right;
            margin-left: 10px;
            border-radius: 10px;
            color: white;
            max-width: 75%;
        }
        .progress-title {
            font-size: 18px;
            font-weight: 700;
            color: #1c2647;
            margin: 0 0 10px;
        }

        .progress {
            height: 30px;
            background: #fff;
            border-top: 5px solid #1c2647;
            border-bottom: 5px solid #1c2647;
            border-radius: 0;
            margin-bottom: 25px;
            overflow: visible;
            position: relative;
        }

        .progress:before,
        .progress:after {
            content: "";
            width: 5px;
            background: #1c2647;
            position: absolute;
            top: 0;
            left: -5px;
            bottom: 0;
        }

        .progress:after {
            left: auto;
            right: -5px;
        }

        .progress .progress-bar {
            border: none;
            box-shadow: none;
            -webkit-animation: 2s linear 0s normal none infinite running progress-bar-stripes, animate-positive 1s;
            animation: 2s linear 0s normal none infinite running progress-bar-stripes, animate-positive 1s;
        }

        @-webkit-keyframes animate-positive {
            0% {
                width: 0;
            }
        }

        @keyframes animate-positive {
            0% {
                width: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="padding: 0;overflow: hidden;">
        <?php
            if(isset($_SESSION['mssv'])):
        ?>
        <div class="chatbtn bg-primary" style="height: 60px;width: 60px;position: fixed;z-index: 10;bottom: 10px;right: 10px;border-radius: 60px;cursor:pointer" onclick="openappchat()">
            <img src="./Public/img/messegericon.png" alt="" width="50px" height="50px" class="mx-auto d-block mt-2">
            
        </div>
        <?php endif;?>
        <div id="chatapp" class="bg-light row shadow" style="height: 50px;width: 50px;position: fixed;z-index: 10;bottom: 10px;right: 10px;border-radius: 10px;z-index: 9;opacity: 0;overflow: hidden;">
            <div class="col-lg-7 bg-warning" style="padding:0">
                <div class="w-100 ps-3">
                    <h5 class="text-light" style="margin-top: 20px;"><strong><ion-icon name="school-outline" style="font-size: 30px;"></ion-icon> Liên hệ hỗ trợ</strong></h5>
                </div>
            </div>
            <div class="col-lg-5 pt-2 bg-warning" style="padding:0">
                <!-- <div class="w-100">
                    <button class="btn btn-outline-primary me-2">
                    <ion-icon name="alert-circle-outline" style="font-size: 24px;display: flex;"></ion-icon>
                </button>
                <button class="btn btn-outline-primary me-2">
                    <ion-icon name="trash-outline" style="font-size: 24px;display: flex;"></ion-icon>
                </button>

                </div> -->
            </div>
            <hr>

            
            <div class="col-lg-12">
                <div class="text-dark" id="noidung-hienthi" style="overflow-y: scroll;">
                    <!-- nội dung nhập hiển thị ở đây -->
                    <?php
                        $myFile = fopen("./Public/chat.txt","r") or die("Không thể mở file");
                        while(!feof($myFile)){
                            $str = fgets($myFile);
                            if(substr($str,0,9)==$_SESSION['mssv']){
                                echo '<div class="tn-nguoigui">'.substr($str,10).'</div><br><br>';
                            }
                            if(substr($str,0,3)=='img' && substr($str,4,9)==$_SESSION['mssv']){
                                echo '<img src="./Public/img/'.substr($str,14).'" alt=""  style="height:160px;margin-top:6px;border-radius:10px;float: right;"><br><br><br><br><br><br><br>';
                            }
                            if(substr($str,0,5)=='admin' && substr($str,6,9)==$_SESSION['mssv']){
                                echo ' <div class="tn-nguoitraloi text-dark mt-1">'.substr($str,16).'</div><br><br>';
                            }
                            if(substr($str,4,5)=='admin' && substr($str,10,9)==$_SESSION['mssv']){
                                echo '<img src="./Public/img/'.substr($str,20).'" alt=""  style="height:160px;margin-top:6px;border-radius:10px;float: left;"><br><br><br><br><br><br><br><br>';
                                // echo '<div class="tn-nguoitraloi text-light">'.substr($str,20).'</div><br><br>';
                            }
                    
                        }
                        fclose($myFile);
                    
                    ?>
                </div>
            </div>
            <script>
                var objDiv = document.getElementById("noidung-hienthi");
                objDiv.scrollTop = objDiv.scrollHeight;
            </script>
            <div class="col-lg-12">
                <form action="index.php?action=sinhvien&act=chat" id="tn-form" method="POST"  enctype="multipart/form-data">
                    <button class="btn text-success btn-outline-success" type="button" style="height:40px">
                        <label for="fileup" style="display: inline-block;cursor: pointer;">
                            <ion-icon name="image-outline" style="display: flex;font-size: 24px;"></ion-icon>
                        </label>
                    </button>
                    <input id="duy" type="text" autocomplete="off" name="tn" placeholder="  Nhập tin nhắn"
                        style="border-radius: 10px;border: unset;background-color: rgba(180, 169, 169, 0.247);height: 40px;margin-top: 8px;outline: unset;width: 60%;" required>
                    <input type="file"  name="hinhgui" style="height: 40px;margin-top: 8px;display: none;" id="fileup" onchange="guihinh(this)">
                    
                    <button class="btn text-light" type="submit" style="background-color: #287BFF;height: 40px;">
                        <ion-icon name="send-outline" style="display: flex;font-size: 24px;"></ion-icon>
                    </button>
                </form>
            </div>
            <script>
                function guihinh(ele){
                    document.getElementById('duy').value = ele.files[0].name
                }
            </script>
        </div>
        <?php
            if(isset($_GET['show'])):
        ?>
        <script>
            var appchat = document.getElementById('chatapp')
                appchat.style.width = '350px'
                appchat.style.height = '500px'
                appchat.style.bottom = '90px'
                appchat.style.right = '90px'
                appchat.style.opacity = '1'
        </script>
        <?php endif;?>
        <script>
            let bool = true
            var appchat = document.getElementById('chatapp')
            function openappchat() {
                if (bool == true) {
                    appchat.style.width = '350px'
                    appchat.style.height = '500px'
                    appchat.style.bottom = '90px'
                    appchat.style.right = '90px'
                    appchat.style.opacity = '1'
                    bool = false
                }
                else {
                    appchat.style.width = '50px'
                    appchat.style.height = '50px'
                    appchat.style.bottom = '10px'
                    appchat.style.right = '10px'
                    appchat.style.opacity = '0'
                    appchat.style.transition = 'linear 0.3s'
                    bool = true
                }
            }
        </script>
    <?php
        include './View/header.php';
        $ctrl = 'home';
        if(isset($_GET['action'])){
            $ctrl = $_GET['action'];
        }
        include './Controller/'.$ctrl.'.php';
        if($ctrl != 'sinhvien'){

            include './View/footer.php';
        }

    ?>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="./Public/main.js"></script>
<script>
    var khungtimkiem = document.getElementById('khungtimkiem');

    //I'm using "click" but it works with any event
    document.addEventListener('click', function(event) {
    var isClickInside = khungtimkiem.contains(event.target);

    if (!isClickInside) {
        document.getElementById('khungtimkiem').style.display = 'none';

    }
    });
</script>
</html>
