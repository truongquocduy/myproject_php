<div class="row" style="margin-top: 90px;">
    <?php include './View/menu.php';?>
    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-12 pl-4">
                <h2 class="khoahoc-title">Khóa chưa học</h2>
            </div>
            <?php
                $kh = new khoahoc();
                $result = $kh->getallkhoahoc();
                while($set = $result->fetch()):
            ?>
            <div class="khoahoc col-lg-3 pl-1 pr-1">
                <a href="index.php?action=khoahoc&act=chitiet&makh=<?php echo $set['makhoahoc'];?>" style="text-decoration:none;">
                    <div class="card">
                        <div class="card-body">
                            <img src="./Public/img/<?php echo $set['hinh'];?>" class="w-100" alt="" style="border-radius: 16px;">
                            <h3 class="mt-4" style="font-size: 18px;font-weight: 600;"><?php echo $set['tenkhoahoc'];?></h3>
                            <p class="mt-3" style="font-size: 14px;color: #5a5757;">
                                <i class="fas fa-users mr-1"></i>
                                <span>3010</span>
                            </p>
                        </div>
                    </div>

                </a>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</div>