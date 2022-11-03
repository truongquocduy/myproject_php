<div class="row" style="margin-top: 90px;">
    <?php
        include './View/menu.php';
    ?>
    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row" style="min-height:500px">
            <div class="col-lg-8 mr-5 pr-5 pb-5" style="border-right: 1px solid #ece5e5;">
                <div class="row">
                    <div class="col-lg-12 pl-4">
                        <h2 class="khoahoc-title">Lộ trình Fullstack</h2>
                    </div>
                    <div class="col-lg-12 mt-2 ml-2" style="color: #888484;">
                        Cho dù bạn là người mới bắt đầu hay một lập trình viên đã có kinh nghiệm đang tìm kiếm
                        các khóa học để nâng cao kỹ năng bản thân và đạt đến mức độ cao hơn trong lập trình, lộ
                        trình học tập này sẽ giúp bạn đạt được mục tiêu của mình.
                    </div>
                </div>
                <div class="row mt-3 ml-2 justify-content">
                    <div class="col-md-6">
                        <?php
                            $lt = new lotrinh();
                            $mangmau = ['bg-danger','bg-warning','bg-success','bg-primary'];
                            $num_mau=0;
                            $baihoc = $lt->getkhoahoc($_SESSION['mssv']);
                            while($set = $baihoc->fetch()):
                            $phantram = $lt->gettientrinh($_SESSION['mssv'],$set['makhoahoc']);
                            
                        ?>
                        <h3 class="progress-title"><?php echo $set['tenkhoahoc'];?> - <?php echo (int)$phantram;?>%</h3>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger progress-bar-striped active <?php echo $mangmau[$num_mau];?>"
                                style="width:<?php echo (int)$phantram;?>%;"></div>
                        </div>
                        <?php $num_mau++; endwhile;?>
                    </div>

                </div>
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
        </div>
    </div>
</div>