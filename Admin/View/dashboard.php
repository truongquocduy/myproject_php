<div class="row justify-content-center" style="margin-top: 80px;">
    <div class="card-list col-lg-3 p-4">
        <ion-icon name="eye-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
        </ion-icon>
        <h2 style="color:#287BFF;width: 70%;"><strong>1,504</strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;width: 70%;">Daily Views</h6>
    </div>
    <div class="card-list col-lg-3 p-4"
        style="border-radius: 14px;width: 22%;margin-right: 1%;box-shadow: 0px 0px 14px 0px gray;">
        <ion-icon name="cart-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
        </ion-icon>
        <h2 style="color:#287BFF;"><strong>80</strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;">Sales</h6>
    </div>
    <div class="card-list col-lg-3 p-4"
        style="border-radius: 14px;width: 22%;margin-right: 1%;box-shadow: 0px 0px 14px 0px gray;">
        <ion-icon name="chatbubbles-outline"
            style="width: 30%;float: right;font-size: 60px;color:#a8b0b6"></ion-icon>
            <?php
                $bl = new binhluan();
                $result = $bl->getTongBinhLuan();
            ?>
        <h2 style="color:#287BFF;"><strong><?php echo $result;?></strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;">Comments</h6>
    </div>
    <div class="card-list col-lg-3 p-4"
        style="border-radius: 14px;width: 22%;box-shadow: 0px 0px 14px 0px gray;">
        <ion-icon name="cash-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
        </ion-icon>
        <?php
            $kh = new khoahoc();
        ?>
        <h2 style="color:#287BFF;"><strong><?php echo number_format($kh->gettongdoanhthu()/1000);?></strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;">Earning</h6>
    </div>

</div>
<div class="row mt-5 justify-content-center"   >
    <div class="col-lg-4 p-4"
        style="border-radius: 14px;box-shadow: 0px 0px 14px 0px gray;margin-right: 10px;">
        <canvas id="myChart"></canvas>
    </div>
    <div class="col-lg-7 p-4" style="border-radius: 14px;box-shadow: 0px 0px 14px 0px gray;">
        <canvas id="myChart-earning"></canvas>

    </div>
</div>
<div class="row mt-5 mb-5" id="khung_blog">
    <div class="col-lg-12 p-4" >
        <h6 style="color: #287BFF;" class="mb-4"><strong>Top Posts</strong></h6>
        <form action="index.php?action=home&act=dashboard#khung_blog" style="display:flex" method="POST">
            <select class="form-select" style="width:20%" name="filter">
                <option value="macdinh">Mặc định</option>
                <option value="moinhat">Bài viết mới nhất</option>
                <option value="cunhat">Bài viết cũ nhất</option>
                <option value="tacgia">Tác giả</option>
                <option value="soluotlike">Số lược like</option>
            </select>
            <button type="submit" class="btn btn-warning ms-3 text-light">Lọc</button>
        </form>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên bài viết</th>
                    <th>Comment</th>
                    <th>Số lượt Like</th>
                    <th>Tác giả</th>
                    <th>Ngày đăng</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $bl=new blog();
                    $cmt=new binhluan();
                    if(isset($_POST['filter']))
                        $result = $bl->getBlogAdmin($_POST['filter']);
                    else
                        $result = $bl->getBlogAdmin();
                    while($set = $result->fetch()):
                ?>
                <tr>
                    <td>
                        <img src="../Public/img/<?php echo $set['hinhanh'];?>" style="width: 80px;">
                    </td>
                    <td><?php echo $set['tieude'];?></td>
                    <?php
                        $cmt_id = $cmt->getTongBinhluanID($set['mabl']);
                    ?>
                    <td><?php echo $cmt_id;?></td>
                    <?php
                            $luotthich = $bl->luotthichmotblog($set['mabl']);
                            
                    
                    ?>
                    <td>
                        <?php
                            if(is_array($luotthich)){
                                echo $luotthich[0];
                            }
                            if(is_bool($luotthich)){
                                echo 0;
                            }
                        ?>
                    </td>
                    <td><?php echo $set['hoten'];?></td>
                    <td><?php echo $set['ngaydang'];?></td>
                    <td><button type="button" class="btn btn-primary"><a  href="index.php?action=home&act=blog&id=<?php echo $set['mabl'];?>" style="color:white" target="_blank">Xem</a></button></td>
                    <td><button type="button" class="btn btn-danger"><a  href="index.php?action=home&act=blog&id=<?php echo $set['mabl'];?>" style="color:white">Xóa</button>
                    </td>
                </tr>
                <?php endwhile;?>
                
            </tbody>
        </table>
    </div>

    <!-- <tr>
                <td style="vertical-align: middle;"><img src="../img/nam.png" width="40px" alt=""></td>
                <td style="vertical-align: middle;"><span class="badge bg-primary">501200534</span></td>
                <td style="vertical-align: middle;">Trương Quốc Duy</td>
                <td style="vertical-align: middle;">0369082061</td>
                <td style="vertical-align: middle;">TP.Bạc Liêu, Bạc Liêu</td>
                <td>
                    <button class="btn btn-success">
                        <ion-icon style="font-size: 24px;" name="refresh-outline"></ion-icon>
                    </button>
                </td>
            </tr> -->


</div>
<div class="row mt-5 mb-5" id="khung_sv">
    <div class="col-lg-9 p-4">
        <h6 style="color: #287BFF;" class="mb-4"><strong>Students List</strong></h6>
        <form action="index.php?action=home&act=dashboard#khung_sv" style="display:flex" method="POST">
            <select class="form-select" style="width:20%" onchange="filter_sv(this)"  name="sv_filter_1">
                <option value="macdinh">Mặc định</option>
                <option value="lop">Theo lớp</option>
                <option value="gioitinh">Theo giới tính</option>
            </select>
            <select class="form-select ms-3" style="width:20%" id="filter_sv_2" name="sv_filter_2">

            </select>
            <script>
                document.getElementById('filter_sv_2').style.display="none";
                function filter_sv(e){
                    var filter2 = document.getElementById('filter_sv_2');
                    if(e.options[e.selectedIndex].value=='lop'){
                        filter2.innerHTML = '<option value="CD20CT12">CD20CT12</option><option value="CD20CT13">CD20CT13</option>';
                    }
                    if(e.options[e.selectedIndex].value=='gioitinh'){
                        filter2.innerHTML = '<option value="Nam">Nam</option><option value="Nu">Nữ</option>';
                    }
                    filter2.style.display = 'block';

                    // console.log(e.options[e.selectedIndex].value)
                    if(e.options[e.selectedIndex].value=='macdinh')
                        filter2.style.display = 'none';

                }
            </script>
            <button type="submit" class="btn btn-warning ms-3 text-light">Lọc</button>
            <button type="button" class="btn btn-danger ms-3 text-light"><a href="index.php?action=student&act=khoadiem" class="text-light">Khóa điểm</a></button>

        </form>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Hình ảnh</th>
                    <th>MSSV</th>
                    <th>Họ và Tên</th>
                    <th>Lớp</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $sv = new sinhvien();
                    $result = $sv->getList();
                    if(isset($_POST['sv_filter_1']) && isset($_POST['sv_filter_2'])){
                        $result =$sv->filter($_POST['sv_filter_1'],$_POST['sv_filter_2']);
                    }
                    while($set=$result->fetch()):
                
                ?>
                <tr>
                    <td>
                        <img src="../Public/img/<?php echo $set['hinhanh'];?>" style="width: 40px;">
                    </td>
                    <td><?php echo $set['massv'];?></td>
                    <td><?php echo $set['hoten'];?></td>
                    <td><?php echo $set['lop'];?></td>
                    <td><?php echo $set['phai'];?></td>
                    <td><?php echo $set['ngaysinh'];?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#_<?php echo $set['massv'];?>">Chi tiết</button></td>
                    <td><button type="button" class="btn btn-danger"><a href="index.php?action=student&act=del&id=<?php echo $set['massv'];?>" style="color:white">Xóa</button>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-3 p-4">
        <h6 style="color: #287BFF;"><strong>Top 3 Students</strong></h6>
            <table class="table-borderless">
                <?php
                    $sv = new sinhvien();
                    $result = $sv->getTop3();
                    $top1 = $result->fetch();
                    $top2 = $result->fetch();
                    $top3 = $result->fetch();
                    
                ?>
                <tr style="background-color: rgba(255, 99, 132, 1);" class="text-light">
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank1.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong><?php echo $top1['hoten'];?></strong></h6></td>
                </tr>
                <tr style="background-color: rgba(255, 206, 86, 1);" class="text-light">
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank2.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong><?php echo $top2['hoten'];?></strong></h6></td>
                </tr>
                <tr style="background-color: rgba(54, 162, 235, 1);" class="text-light">    
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank3.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong><?php echo $top3['hoten'];?></strong></h6></td>
                </tr>
                
            </table>

    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-9 p-4">
        <h6 style="color: #287BFF;"><strong>Lesson List</strong></h6>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Học Phí</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $kh = new khoahoc();
                    $result = $kh->getallkhoahoc();
                    while($set = $result->fetch()):
                ?>
                <tr>
                    <td>
                        <img src="../Public/img/<?php echo $set['hinh'];?>" style="width: 80px;">
                    </td>
                    <td><?php echo $set['tenkhoahoc'];?></td>
                    <td><?php echo $set['congviec'];?></td>
                    <td><?php echo number_format($set['hocphi']);?> VNĐ</td>
                    <td><button type="button" class="btn btn-success"><a class="text-light" target="_blank" href="../index.php?action=khoahoc&act=chitiet&makh=<?php echo $set['makhoahoc'];?>">Xem</a></button></td>
                    <td><button type="button" class="btn btn-danger" onclick="xoasp(0);">Xóa</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-3 p-4">
        <h6 style="color: #287BFF;"><strong>Top 3 Lesson</strong></h6>
            <table class="table-borderless">
                <tr style="background-color: rgba(255, 99, 132, 1);" class="text-light">
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank1.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong>HTML, CSS từ Zero đến Hero</strong></h6></td>
                </tr>
                <tr style="background-color: rgba(255, 206, 86, 1);" class="text-light">
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank2.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong>Học JavaScript Cơ bản</strong></h6></td>
                </tr>
                <tr style="background-color: rgba(54, 162, 235, 1);" class="text-light">    
                    <td style="width: 10%;vertical-align: middle;border-radius: 10px 0 0 10px;"><img src="../Public/img/rank3.png" width="50px" alt=""></td>
                    <td style="vertical-align: middle;"><h6><strong>Khóa học responsive</strong></h6></td>
                </tr>
                
            </table>
    </div>
</div>

<?php
    $sv = new sinhvien();
    $result = $sv->getList();
    while($set = $result->fetch()):
?>
<div class="offcanvas offcanvas-end" id="_<?php echo $set['massv'];?>" style="width:1000px">
    <div class="offcanvas-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#home_<?php echo $set['massv'];?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu1_<?php echo $set['massv'];?>">Điểm số</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu2">Menu 2</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container active" id="home_<?php echo $set['massv'];?>">
                <div class="row pt-4">
                    <div class="col-lg-3 text-center pt-3 pb-3" style="background-color:#eae8e9;border-radius:10px">
                        <img src="../Public/img/<?php echo $set['hinhanh'];?>" width="80%" alt="" style="border: 6px solid #00c0f3;border-radius:100%;">
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>VỀ BẢN THÂN</strong></h6> 
                        <p class="text-left" style="font-size:14px">
                            Cử nhân công nghệ thông tin, với kinh nghiệm xây dựng phần mềm, website, đa nền tảng, photoshop . . .
                        </p>  
                        <h6 class="mt-5 text-left" style="color:#00c0f3;"><strong>THÔNG TIN LIÊN HỆ</strong></h6> 
                        <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
                            <li>SỐ ĐIỆN THOẠI</li>
                            <li>(+84) <?php echo $set['sdt'];?></li> <br>
                            <li>QUÊ QUÁN</li>
                            <li><?php echo $set['diachi'];?></li><br>
                            <li>ĐỊA ĐIỂM  LÀM VIỆC</li>
                            <li>TP.Hồ Chí Minh</li><br>
                            <li>EMAIL</li>
                            <li><?php echo $set['email'];?></li>
                        </ul>       
                    </div>
                    <div class="col-lg-9" style="background-color:white;border-radius:80px 0 0 0;padding:70px 30px 0px 50px">
                        <strong style="font-size:40px"><?php echo $set['hoten'];?></strong>
                        <h5>CÔNG NGHỆ THÔNG TIN</h5>
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>HỌC VẤN</strong></h6> 
                        <hr>
                        <ul style="list-style:none;padding:0;font-size:14px">
                            <li><strong>Trường cao đẳng CNTT TP.HCM</strong></li>
                            <li>2020 - 2023</li>
                            <li>Điểm trung bình: 8.0/10</li><br>
                            <li>Thành tích học tập nổi bật</li>
                            <ul>
                                <li>3 kỳ cuối cùng đạt học lực giỏi</li>
                                <li>Nhận được học bổng toàn phần của tổ chức Tiếng Anh</li>
                            </ul>
                        </ul> 
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>HOẠT ĐỘNG NGOẠI KHÓA</strong></h6> 
                        <hr>
                        <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
                            <li><strong>CLB nhà lập trình viên tương lai</strong></li>
                            <li>2020 - hiện tại</li>
                            <ul>
                                <li>Danh hiệu sinh viên tích cực</li>
                                <li>Thường xuyên đảm nhiệm vị trí trưởng nhóm trong các hoạt động của CLB nhà lập trình viên tương lai do nhà Trường tổ chức</li>
                                <li>Là đối mối liên lạc, kết nối các hội viên và các doanh nghiệp</li>
                            </ul>
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="menu1_<?php echo $set['massv'];?>">
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên học phần</th>
                            <th>TBKH</th>
                            <th>Thi1</th>
                            <th>Thi2</th>
                            <th>HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ds = $sv->getdiem($set['massv']);
                            while($setdiem = $ds->fetch()):
                        ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $setdiem['tenkhoahoc'];?></td>
                            <td>0</td>
                            <td><?php echo $setdiem['thi1'];?></td>
                            <td><?php echo $setdiem['thi2'];?></td>
                            <td><?php echo $setdiem['hocphan'];?></td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
                <hr>
                <h5>Học Lực: <?php echo $set['hocluc'];?></h5>
            </div>
            <div class="tab-pane container fade" id="menu2">...</div>
        </div>
        
    </div>
</div>
<?php endwhile;?>

