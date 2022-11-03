<div class="row" style="margin-top: 90px;">
    <?php
        include './View/menu.php';
    ?>
    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-8 mr-5 pr-5 pb-5" style="border-right: 1px solid #ece5e5;">
                <div class="row">
                    <div class="col-lg-12 pl-4">
                        <h2 class="khoahoc-title">Lộ trình cho người mới</h2>
                    </div>
                    <div class="col-lg-12 mt-2 ml-2" style="color: #888484;">
                        Cho dù bạn là người mới bắt đầu hay một lập trình viên đã có kinh nghiệm đang tìm kiếm
                        các khóa học để nâng cao kỹ năng bản thân và đạt đến mức độ cao hơn trong lập trình, lộ
                        trình học tập này sẽ giúp bạn đạt được mục tiêu của mình.
                    </div>
                </div>
                <div class="row mt-3 ml-2 justify-content">
                    <div class="col-lg-12 p-3 mb-3" style="border: 1px solid #ece5e5;border-radius: 10px;">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="./Public/img/batdau.png" class="w-100" alt="">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="khoahoc-title" style="font-size: 22px;">Fullstack</h2>
                                <p style="color: #888484;">
                                    Trước tiên, chúng ta sẽ tìm hiểu về phương pháp học lập trình, kỹ năng đặt
                                    mục tiêu và các khái niệm kỹ thuật như: domain, client, server.
                                </p>
                                <button class="btn text-light" style="background-color: #f05123;border-radius: 30px;min-width: 100px;;">      
                                    <a <?php if(isset($_SESSION['mssv'])):?>href="index.php?action=lotrinh&act=tientrinh"<?php endif;?> class="text-light" style="text-decoration:none">
                                        Chi tiết
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 mb-3" style="border: 1px solid #ece5e5;border-radius: 10px;">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="./Public/img/frontend.png" class="w-100" alt="">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="khoahoc-title" style="font-size: 22px;">Front-end</h2>
                                <p style="color: #888484;">
                                    Lập trình viên Front-end là người xây dựng ra giao diện websites. Trong phần này F8
                                    sẽ chia sẻ cho bạn lộ trình để trở thành lập trình viên Front-end nhé.
                                </p>
                                <button class="btn text-light"
                                    style="background-color: #f05123;border-radius: 30px;min-width: 100px;;">Chi
                                    tiết</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 mb-3" style="border: 1px solid #ece5e5;border-radius: 10px;">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="./Public/img/backend.png" class="w-100" alt="">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="khoahoc-title" style="font-size: 22px;">Back-end</h2>
                                <p style="color: #888484;">
                                    Trái với Front-end thì lập trình viên Back-end là người làm việc với dữ liệu, công
                                    việc thường nặng tính logic hơn. Chúng ta sẽ cùng tìm hiểu thêm về lộ trình học
                                </p>
                                <button class="btn text-light"
                                    style="background-color: #f05123;border-radius: 30px;min-width: 100px;;">Chi
                                    tiết</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-3 pt-4" style="position: fixed;right: 100px;">
                <h6 style="font-weight: 700;color: #848688;">CÁC CHỦ ĐỀ ĐƯỢC ĐỀ XUẤT</h6>
                <button class="btn text-dark mt-2 ml-2" style="background-color: #f2f2f2;border-radius: 30px;">Front-end
                    / Mobile App</button>
                <button class="btn text-dark mt-2 ml-2" style="background-color: #f2f2f2;border-radius: 30px;">Back-end
                    / Devops</button>
                <button class="btn text-dark mt-2 ml-2" style="background-color: #f2f2f2;border-radius: 30px;">UI / UX /
                    Design</button>
                <button class="btn text-dark mt-2 ml-2"
                    style="background-color: #f2f2f2;border-radius: 30px;">Other</button>
            </div>
        </div>
    </div>
</div>