<div class="row" style="margin-top: 90px;">
    <?php 
        include './View/menu.php';
        $kh = new khoahoc();
        $khoahocchinh = $kh->getmotkhoahoc($_GET['makh']);
    ?>

    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-9 mr-5 pr-5 pb-5 mt-3" style="border-right: 1px solid #ece5e5;">
                <div class="row">
                    <div class="col-lg-12 pl-4">
                        <h2 class="khoahoc-title"><?php echo $khoahocchinh['tenkhoahoc'];?></h2>
                    </div>
                    <div class="col-lg-12 mt-2 ml-2" style="color: #888484;">
                        <?php echo $khoahocchinh['congviec'];?>
                    </div>
                    <div class="col-lg-12 pl-4 mt-3">
                        <h5 style="font-weight: bold;">Bạn sẽ được học gì</h5>
                    </div>
                    <div class="col-lg-6 pl-4 mt-3">
                        <ul class="list-khoahoc">
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách xây dựng giao diện web
                                với HTML, CSS</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách đặt tên class CSS theo
                                chuẩn BEM</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Làm chủ Flexbox khi dựng bố cục
                                website</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách tự tạo động lực cho bản
                                thân</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pl-4 mt-3">
                        <ul class="list-khoahoc">
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách phân tích giao diện
                                website</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách làm giao diện web
                                responsive</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Sở hữu 2 giao diện web khi học xong
                                khóa học</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Biết cách tự học những kiến thức
                                mới</li>
                        </ul>
                    </div>


                    <div class="col-lg-12 pl-4 mt-2">
                        <h5 style="font-weight: bold;">Nội dung khóa học</h5>
                    </div>
                    <div class="col-lg-9 mt-2 pl-4" style="color: #888484;">
                        13 phân . 113 bài học . Thời lượng 27 giờ 21 phút
                    </div>
                    <div class="col-lg-3 mt-2">
                        <button class="btn" style="color: #f05123;"><strong id="nutmorong" onclick="showAll()">Mở rộng tất
                                cả</strong></button>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div id="accordion">
                            <?php
                                $result = $kh->getTieuDe($_GET['makh']);
                                $number = 1;
                                $number_baihoc = 1;

                                while($set = $result->fetch()):
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#<?php echo $set['baihoc'];?>" style="text-decoration:none;">
                                            <strong> <?php echo $number;?>.<?php echo $set['tieude'];?></strong>
                                        </a>
                                    </div>
                                    <div id="<?php echo $set['baihoc'];?>" class="collapse baihoc<?php if($number==1) echo ' show';?>" data-parent="#accordion">
                                        <div class="card-body pt-0 pb-0">
                                            <?php
                                                $chitiet = $kh->getDetails($_GET['makh'],$set['baihoc']);
                                                while($chitiet_set = $chitiet->fetch()):
                                            ?>
                                            <div class="row">
                                                <div class="col-lg-10 p-3"><i class="fas fa-play-circle"
                                                        style="color: #f05123;"></i>  <?php echo $number_baihoc.'. '.$chitiet_set['noidung'];?></div>
                                                <div class="col-lg-2 p-3"><?php echo $chitiet_set['thoiluong'];?></div>
                                            </div>
                                            <?php $number_baihoc++;endwhile;?>

                                        </div>
                                    </div>
                                </div>
                            <?php $number++;endwhile;?>
                        </div>
                    </div>
                    <div class="col-lg-12 pl-4 mt-5">
                        <h5 style="font-weight: bold;">Yều cầu</h5>
                    </div>
                    <div class="col-lg-12 pl-4 mt-3">
                        <ul class="list-khoahoc">
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Máy vi tính kết nối internet
                                (Windows, Ubuntu hoặc MacOS)</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Ý thức tự học cao, trách nhiệm cao,
                                kiên trì bền bỉ không ngại cái khó</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Không được nóng vội, bình tĩnh học,
                                làm bài tập sau mỗi bài học</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Khi học nếu có khúc mắc hãy tham
                                gia hỏi/đáp tại group FB: Học lập trình web (fullstack.edu.vn)</li>
                            <li><i class="fas fa-check" style="color: #f05123;"></i> Bạn không cần biết gì hơn nữa,
                                trong khóa học tôi sẽ chỉ cho bạn những gì bạn cần phải biết</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 pt-4" style="position: fixed;right: 100px;">
                <img src="./Public/img/<?php echo $khoahocchinh['hinh'];?>" width="100%" alt="">
                <h5 class="text-center mt-4" style="color: #f05123;">Học Phí: <strong><?php echo number_format($khoahocchinh['hocphi']);?> đ</strong></h5>
                <?php
                    $trangthai = 'damua';
                    if(isset($_SESSION['mssv'])){
                        $kh = new khoahoc();
                        $result = $kh->checkKhoaHoc($_SESSION['mssv'],$_GET['makh']);
                        if(!$result){
                            $trangthai = 'chuamua';
                        }
                        else{
                            $trangthai = 'damua';
                        }
                    }
                ?>
                <a <?php if($trangthai == 'chuamua'):?> href="index.php?action=giohang&act=add&makh=<?php echo $_GET['makh'];?>" <?php endif;?> style="text-decoration:none">
                    <button type="button" class="btn text-light mx-auto d-block mt-3" style="background-color: #f05123;border-radius: 10px;font-size: 20px;">
                        ĐĂNG KÝ HỌC
                    </button>
                </a>
                <ul class="list-khoahoc pl-3 mt-3" style="font-size: 14px;">
                    <li><i class="fas fa-tachometer-alt"></i> Trình độ cơ bản</li>
                    <li><i class="fas fa-film"></i> Tổng số <strong>113</strong> bài học</li>
                    <li><i class="far fa-clock"></i> Thời lượng <strong>27 giờ 21 phút</strong></li>
                    <li><i class="fas fa-battery-full"></i> Học mọi lúc, mọi nơi</li>
                </ul>
            </div>
        </div>
    </div>
</div>