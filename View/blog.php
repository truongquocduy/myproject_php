<div class="row" style="margin-top: 90px;">
    <?php  include './View/menu.php';?>
    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-8 mr-5 pr-5 pb-5" style="border-right: 1px solid #ece5e5;">
                <div class="row">
                    <div class="col-lg-12 pl-4 mt-4">
                        <h6 class="pb-3" style="border-bottom: 1px solid #dce0e3;"><b>PHÙ HỢP VỚI BẠN</b></h6>
                    </div>
                    <div class="col-lg-12 mt-2 ml-2" style="color: #888484;">
                        Cho dù bạn là người mới bắt đầu hay một lập trình viên đã có kinh nghiệm đang tìm kiếm
                        các khóa học để nâng cao kỹ năng bản thân và đạt đến mức độ cao hơn trong lập trình, lộ
                        trình học tập này sẽ giúp bạn đạt được mục tiêu của mình.
                    </div>
                </div>
                <div class="row mt-3 ml-2 justify-content">
                    <?php
                        $bl = new blog();
                        $pagehientai = 1;
                        if(isset($_GET['page'])){
                            $pagehientai = $_GET['page'];
                        }
                        $result = $bl->getAllBlog($pagehientai);
                        while($set = $result->fetch()):
                    ?>
                    <a href="index.php?action=blog&act=detail&mabl=<?php echo $set['mabl'];?>" style="text-decoration: none;color: #333;">
                        <div class="col-lg-12 pl-3 pr-3 pt-2 pb-3"
                            style="border-top: 1px solid #ece5e5;border-radius: 10px;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <img src="./Public/img/nam.png"
                                        height="20px" alt="">
                                    <font class="ml-2" style="font-weight: 600;font-size: 14px;"><?php echo $set['hoten'];?></font>
                                </div>
                                <div class="col-lg-2 pl-5">
                                    <i class="far fa-bookmark mr-3"></i>
                                    <i class="fas fa-ellipsis-h"></i>
                                </div>
                                <div class="col-lg-8 mt-2">
                                    <h2 class="khoahoc-title" style="font-size: 22px;"><?php echo $set['tieude'];?></h2>
                                    <p style="color: #888484;">
                                        <?php echo $set['noidung'];?>. . .
                                    </p>
                                    <p style="color: #524d4d;font-size: 14px;">12 ngày trước / 6 phút đọc</p>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <img src="./Public/img/<?php echo $set['hinhanh'];?>" class="w-100" alt="" style="border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                        endwhile;
                    ?>
                    <?php
                        $pagenumber = $bl->getPageNumber();//2
                        // echo '<script>alert('.$pagenumber.')</script>';
                    ?>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" style="cursor:pointer" <?php if($pagehientai>1):?> href="index.php?action=blog&page=<?php echo $pagehientai-1;endif;?>">Previous</a></li>
                        <?php
                            for($i = 1;$i<=$pagenumber;$i++):
                        ?>
                        <li class="page-item <?php if($i==$pagehientai)echo 'active';?>"><a class="page-link" href="index.php?action=blog&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                        <?php endfor;?>
                        <li class="page-item"><a class="page-link" style="cursor:pointer" <?php if($pagehientai<$pagenumber):?> href="index.php?action=blog&page=<?php echo $pagehientai+1;endif;?>">Next</a></li>
                    </ul>
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