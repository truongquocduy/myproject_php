<nav class="navbar navbar-expand-md navbar-light fixed-top pl-4"
    style="background-color: white;box-shadow: 0px -10px 20px 0px black;">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php" style="font-size: 1rem;font-weight: 550;color: #333333;">
        <img src="./Public/img/logo.png" class="mr-2" alt="" height="40px">
        Học lập trình để đi làm
    </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="row w-100" style="margin-left: 300px;">
            <div class="col-lg-6">
                <div class="row">
                    <form action="" class="w-100" method="post">
                        <input type="text" name="search" class="pt-1 pb-1 pl-3"
                            style="border: 1px solid #dce0e3;border-radius: 20px;width:90%"
                            placeholder="Tìm kiếm khóa học, bài viết, video, ..." autoComplete="off">
                    </form>
                </div>
                <?php
                    if(isset($_POST['search'])):
                        $kh= new khoahoc();
                        $blog = new blog();
                        $kh_result = $kh->findAllkhoahoc($_POST['search']);
                        $blog_result = $blog->findAllBlog($_POST['search']);

                ?>
                <div class="row mt-2 p-4" id="khungtimkiem" style="background-color: white;width: 96%;box-shadow: 0 -4px 32px rgb(0 0 0 / 20%);border-radius: 12px;position: absolute;">
                    <div class="col-lg-12">
                        <i class="fas fa-search"></i> <span style="font-size: 14px;">Kết quả cho '<?php echo $_POST['search'];?>'</span>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <h6 style="color: #333;font-size: 14px;">KHÓA HỌC</h6>
                        <hr>
                        <?php
                            while($set = $kh_result->fetch()):
                                // if($set[0]==null){
                                //     echo '<h1>không có</h1>';
                                // }
                        ?>
                         <a href="index.php?action=khoahoc&act=chitiet&makh=<?php echo $set['makhoahoc'];?>" style="text-decoration:none;">
                            <div class="w-100 mt-2">
                                <img src="./Public/img/<?php echo $set['hinh'];?>" width="40px" height="40px" alt="" style="border-radius: 40px;">
                                <font style="font-size: 14px;"><?php echo $set['tenkhoahoc'];?></font>
                            </div>
                        </a>
                        <?php
                            endwhile;
                        ?>
                        
                    </div>
                    <div class="col-lg-12 mt-4">
                        <h6 style="color: #333;font-size: 14px;">BÀI VIẾT</h6>
                        <hr>
                        <?php
                            while($set = $blog_result->fetch()):
                        ?>
                        <a href="index.php?action=blog&act=detail&mabl=<?php echo $set['mabl'];?>" style="text-decoration:none;">
                            <div class="w-100 mt-2">
                                <img src="./Public/img/<?php echo $set['hinhanh'];?>" width="40px" height="40px" alt="" style="border-radius: 40px;">
                                <font style="font-size: 14px;"><?php echo $set['tieude'];?></font>
                            </div>
                        </a>
                        <?php
                            endwhile;
                        ?>                        
                    </div>
                </div>
                <?php
                    endif;
                ?>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-2" style="display: inline-flex;padding-left: 68px;">
                <a href="index.php?action=giohang"><i class="fas fa-shopping-cart  mr-3 mt-1" style="font-size: 20px;color: #464141;" disabled></i></a>
                <img src="./Public/img/nam.png" height="25px" alt="">
            </div>
        </div>
    </div>
</nav>