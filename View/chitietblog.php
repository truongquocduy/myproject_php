<div class="row" style="margin-top: 90px;padding-bottom:200px">
        <?php
            include './View/menu.php';
        ?>
        <?php
            $ctblog = new blog();
            $binhluan = new binhluan();
            $result = $ctblog->getDetails($_GET['mabl']);
            $result_khonglap = $ctblog->getDetails($_GET['mabl'])->fetch();;
            
        ?>
            <div class="col-lg-10 " style="position: relative;left: 140px;">
                <div class="offcanvas offcanvas-end <?php if(isset($_GET['show'])){ echo 'show';}?>" id="demo" style="width: 720px;padding: 0 40px;">
                    <div class="offcanvas-header">
                      <h1 class="offcanvas-title"></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h5><strong><?php echo $binhluan->getTongBinhluan($_GET['mabl']);?> bình luận</strong></h5>
                        <form action="index.php?action=blog&act=binhluan&mabl=<?php echo $_GET['mabl'];?>" method="post" style="margin-bottom: 50px;display:<?php if(!isset($_SESSION['mssv'])){echo 'none';}else{ echo 'block';}?>">
                            <img src="./Public/img/nam.png" width="50px" alt="">
                            <input class="ml-2" name="comment"  style="width: 80%;outline: none;height: 50px; font-size: 16px;border: none;border-bottom: 1px solid black;" type="text" placeholder="Viết bình luận của bạn">
                            <button type="submit" class="btn btn-success mt-2 mr-5 float-right" style="border-radius: 50px;">BÌNH LUẬN</button>
                        </form>
                        <?php
                            $binhluan = new binhluan();
                            $result_binhluan = $binhluan->getAllBinhluan($_GET['mabl']);
                            // echo '<script>console.log("'.$result_binhluan->fetch().'")</script>';
                            // if($result_binhluan['hoten'] == null){
                            //     echo 'Hãy là người bình luận đầu tiên !!!';
                            // }
                            while($set = $result_binhluan->fetch()):
                        ?>
                        <div class="div w-100 pr-5 mt-2" style="display: inline-flex;">
                            <img src="./Public/img/nam.png" width="50px" height="50px" alt="">
                            <p class="ml-3 p-2" style="background-color: #f2f3f5;border-radius: 10px 20px 10px 20px;">
                                <strong style="color: #292929;font-weight: 800;"><?php echo $set['hoten'];?></strong> <br>
                                <?php
                                    echo $set['noidung'];
                                ?>
                            </p>
                        </div>
                        <?php
                            endwhile;
                        ?>
                    </div>
                  </div>
                <div class="row">
                    
                    <div class="col-lg-12 mr-5 pr-5 pb-5" style="border-right: 1px solid #ece5e5;">
                        <div class="row justify-content-center">
                            <div class="col-lg-2" >
                                <div class="card">
                                    <div class="card-body">
                                        <strong style="color: #292929;font-weight: 800;"><?php echo $result_khonglap['hoten'];?></strong>
                                        <p class="mt-2" style="color: #757575;">nothing yet.</p>
                                    </div>
                                    <div class="card-footer" style="background-color: white;padding:0;">
                                        <button type="button" class="btn" style="font-size: 26px;color: #757575;">
                                            <?php
                                                $bl = new blog();
                                                if(isset($_SESSION['mssv'])){
                                                    if($bl->checklike($_GET['mabl'],$_SESSION['mssv'])==true){

                                                
                                            ?>
                                            <img src="./Public/img/like.png" alt="" width="30" style="margin-top:-6px">
                                            <?php }else{?>
                                                <a href="index.php?action=blog&act=like&id=<?php echo $_GET['mabl'];?>"><i class="far fa-heart" style="backgroud-color:red"></i ></a>
                                            <?php }}else{?>
                                                <a href="index.php?action=blog&act=like&id=<?php echo $_GET['mabl'];?>"><i class="far fa-heart" style="backgroud-color:red"></i ></a>
                                            <?php }?>
                                        </button>
                                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" class="btn ml-3" style="font-size: 26px;color: #757575;">
                                            <i class="far fa-comment"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                
                                <div class="row">
                                    <h1 class="khoahoc-title" style="font-size: 40px;font-weight: 700;"><?php echo $result_khonglap['tieude'];?><h1>
                                </div>
                                <div class="row pt-3" >
                                    <div class="col-lg-10">
                                        <img src="./Public/img/nam.png"
                                            height="30px" alt="">
                                        <strong class="ml-3" style="color: #292929;font-weight: 800;"><?php echo $result_khonglap['hoten'];?></strong>
                                    </div>
                                    <div class="col-lg-2 pl-5">
                                        <i class="far fa-bookmark mr-3"></i>
                                        <i class="fas fa-ellipsis-h"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                        while($set = $result->fetch()):
                                    ?>
                                    <p class="p-3" style="line-height: 2;font-size: 20px;color: #292929;word-wrap: break-word;font-weight: 100;">
                                        <?php echo $set['noidung'];?>
                                    </p>
                                    <?php
                                        endwhile;
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>