<div class="row" style="margin-top: 90px;">
    <?php
        include './View/menu.php';
    ?>
    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-8 mr-5 pr-5 pb-5" style="border-right: 1px solid #ece5e5;">
                <div class="row">
                    <div class="col-lg-12 pl-4">
                        <?php
                            $kh = new khoahoc();
                            $result = $kh->getmotkhoahoc($_GET['makh']);
                        ?>
                        <h2 class="khoahoc-title"><?php echo $result['tenkhoahoc'];?></h2>
                    </div>
                </div>
                <div class="row mt-3 ml-2 justify-content">
                    <div class="jumbotron w-100" style="height: 400px; padding-top: 18%;">
                        <h1 class="text-center" style="font-size: 100px;" id="donghonguoc"><strong></strong></h1>
                    </div>
                    <button class="btn btn-primary w-75 mx-auto" id="nutketiep" style="display: none;">
                        <a href="index.php?action=lotrinh&act=up&makh=<?php echo $_GET['makh'];?>" class="text-light" style="text-decoration:none">Kế tiếp</a>
                    </button>
                </div>
                <script>
                    var number_donghotam = 5;
                    var dongho = setInterval(() => {
                        document.getElementById('donghonguoc').innerText=number_donghotam;
                        if(number_donghotam==0){
                            document.getElementById('nutketiep').style.display='block'
                            clearInterval(dongho);
                        }
                        number_donghotam--;
                    }, 1000);
                </script>
            </div>
            <div class="col-lg-3 pt-4" style="position: fixed;right: 100px;">
                <h6 style="font-weight: 700;color: #848688;">CÁC CHỦ ĐỀ ĐƯỢC ĐỀ XUẤT</h6>
                <button class="btn text-dark mt-2 ml-2"
                    style="background-color: #f2f2f2;border-radius: 30px;">Front-end / Mobile App</button>
                <button class="btn text-dark mt-2 ml-2"
                    style="background-color: #f2f2f2;border-radius: 30px;">Back-end / Devops</button>
                <button class="btn text-dark mt-2 ml-2"
                    style="background-color: #f2f2f2;border-radius: 30px;">UI / UX / Design</button>
                <button class="btn text-dark mt-2 ml-2"
                    style="background-color: #f2f2f2;border-radius: 30px;">Other</button>
            </div>
            <!-- footer -->
            <div class="col-lg-12 mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <h5 style="font-size: 1.2rem;font-weight: 700;color: #333333;">
                            <img src="../img/logo.jfif" class="mr-2" alt="" height="40px">
                            Học lập trình để đi làm
                        </h5>
                        <p class="mt-3 mb-0" style="font-size: 15px;color: rgb(117, 116, 116);">Email:
                            quocduy13579113@gmail.com</p>
                        <p class="mt-2" style="font-size: 15px;color: rgb(117, 116, 116);">
                            Địa chỉ: 3010 Trần Phú, Thành Phố Bạc Liêu, Bạc Liêu
                        </p>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="mt-2" style="font-size: 1.2rem;font-weight: 700;color: #333333;">
                            Hỗ trợ
                        </h5>
                        <ul
                            style="padding: 0; list-style: none; font-size: 15px;color: rgb(117, 116, 116);line-height: 26px;">
                            <li>Liên hệ</li>
                            <li>Bảo mật</li>
                            <li>Điều khoản</li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="mt-2" style="font-size: 1.2rem;font-weight: 700;color: #333333;">
                            Về F8
                        </h5>
                        <ul
                            style="padding: 0; list-style: none; font-size: 15px;color: rgb(117, 116, 116);line-height: 26px;">
                            <li>Giới thiệu</li>
                            <li>Cơ hội việc làm</li>
                            <li>Đối tác</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="mt-2" style="font-size: 1.2rem;font-weight: 700;color: #333333;">
                            Đơn vị chủ quán
                        </h5>
                        <ul
                            style="padding: 0; list-style: none; font-size: 15px;color: rgb(117, 116, 116);line-height: 26px;">
                            <li>Người đại diện: Trương Quốc Duy - Sinh viên</li>
                            <li>Mã số sinh viên: 501200534</li>
                            <li>Ngày thành lập: 24/12/2021</li>
                            <li>Nơi cấp: Trường Cao đẳng CNTT TP.HCM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>