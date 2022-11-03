<?php $sv = new sinhvien();

?>
<div class="row" style="margin-top: 90px;">
    <?php include './View/menu.php';?>
    <div class="col-lg-10 mt-4 mb-5" style="position: relative;left: 160px;">
        <div class="row">
            <div class="col-lg-9 pr-4">
                <div class="row p-3" style="border-radius: 30px;box-shadow: 0px 2px 7px black;">
                    <div class="col-lg-9">
                        <h5><strong>Thông tin cá nhân</strong></h5>
                    </div>
                    <div class="col-lg-9">
                        <?php
                            $detail = $sv->getDetail($_SESSION['mssv']);
                        ?>
                        <strong>Xin chào <?php echo $detail['hoten'];?></strong>
                        , MSSV: <?php echo $detail['massv'];?>, Lớp CD20CT12, Ngành CNTT - Khoa CNTT - Điện Tử, Trường CĐ CNTT
                        TP.HCM, ... <br>
                        <button class="btn text-light mt-4" style="background-color: #f05123;border-radius: 10px;" data-bs-toggle="offcanvas" data-bs-target="#thongtinsv">
                            Xem thông tin
                        </button>
                        <button class="btn text-light mt-4 bg-danger" style="border-radius: 10px;">
                            <a class=" text-light" style="text-decoration:none;" href="index.php?action=sinhvien&act=logout">Đăng xuất</a>
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <img class="mx-auto d-block" src="./Public/img/<?php echo $detail['hinhanh'];?>" width="60%" alt="">
                    </div>
                </div>
                <div class="row mt-5 p-3">
                    <div class="col-lg-12">
                        <h5><strong>Các khóa đang học</strong></h5>
                    </div>
                    <div class="khungchuakhoahoc">
                        <?php
                        $kdh = new khoahoc();
                        $result = $kdh->getKhoaDangHoc($_SESSION['mssv']);
                        while($set = $result->fetch()):
                        ?>
                        <div class="khoahoc col-lg-4 pr-1">
                            <a href="index.php?action=khoahoc&act=danghoc&makh=<?php echo $set['makhoahoc'];?>" style="text-decoration:none;">
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
                        <?php
                            endwhile;
                        ?>
                    </div>

                </div>
                <div class="row p-3 mt-4" style="border-radius: 30px;box-shadow: 0px 2px 7px black;">
                    <div class="col-lg-9">
                        <h5><strong>THỜI KHÓA BIỂU</strong></h5>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered" id="tb">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học phần</th>
                                    <th>Giảng viên</th>
                                    <th>Thứ</th>
                                    <th>Thời gian</th>
                                    <th>Phòng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tbk = new thoikhoabieu();
                                    $result = $tbk->getDetail($detail['lop']);
                                    $stt=1;
                                    while($set = $result->fetch()):
                                ?>
                                <tr>
                                    <td><?php echo $stt;?></td>
                                    <td><?php echo $set['tenhocphan'];?></td>
                                    <td><?php echo $set['giangvien'];?></td>
                                    <td><?php echo $set['thu'];?></td>
                                    <td><?php echo $set['thoigian'];?></td>
                                    <td><?php echo $set['phong'];?></td>
                                </tr>
                                <?php
                                    $stt++;
                                    endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="month">      
                    <ul class="mon__ul">
                        <li class="prev">&#10094;</li>
                        <li class="next">&#10095;</li>
                        <li>
                            <?php echo date('M');?><br>
                            <span style="font-size:18px"><?php echo date('Y');?></span>
                        </li>
                    </ul>
                </div>
                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>
                <?php
                    $date = [1=>31,2=>28,3=>31,4=>31,5=>31,6=>31,7=>31,8=>31,9=>31,10=>31,11=>31,12>31];
                    $day = ['Monday'=>1,'Tuesday'=>2,'Wednesday'=>3,'Thursday'=>4,'Friday'=>5,'Saturday'=>6,'Sunday'=>7];
                    
                    foreach($date as $key=>$item){
                        if(date('m') == $key){
                            $thangnay = $key;//1
                            break;
                        }
                    }
                    foreach($day as $key=>$item){
                        if($key == date("l", mktime(0,0,0,date('m'),1,2022))){
                            $ngaydauthang = $item;//6
                            break;
                        }
                    }
                    
                ?>
                <ul class="days">
                    <?php
                        for($i = 1; $i<$ngaydauthang;$i++):
                    ?>
                    <li></li>
                    <?php endfor;?>
                    <?php
                        for($i = 1; $i<=$date[$thangnay];$i++):
                    ?>
                    <li class="<?php if($i == date('d')) echo 'active';?>"><?php echo $i;?></li>
                    
                    <?php endfor;?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" id="thongtinsv" style="width:1000px">
  <div class="offcanvas-header" style="padding-bottom:0">
    <h2 class="offcanvas-title">Thông tin sinh viên</h2>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#lilich">Sơ yếu lý lịch</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#diemso">Điểm số</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#thi">Thi online</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#chinhsua">Thay đổi</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane container active" id="lilich" style="background-color:#eae8e9;">
        <div class="row pt-4">
            <div class="col-lg-3 text-center pl-4">
                <?php
                    $result = $sv->getDetail($_SESSION['mssv']);
                    
                ?>
                <img src="./Public/img/<?php echo $result['hinhanh'];?>" width="80%" alt="" style="border: 6px solid #00c0f3;border-radius:100%;">
                <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>VỀ BẢN THÂN</strong></h6> 
                <p class="text-left" style="font-size:14px">
                    Cử nhân công nghệ thông tin, với kinh nghiệm xây dựng phần mềm, website, đa nền tảng, photoshop . . .
                </p>  
                <h6 class="mt-5 text-left" style="color:#00c0f3;"><strong>THÔNG TIN LIÊN HỆ</strong></h6> 
                <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
                    <li>SỐ ĐIỆN THOẠI</li>
                    <li>(+84) <?php echo $result['sdt'];?></li> <br>
                    <li>QUÊ QUÁN</li>
                    <li><?php echo $result['diachi'];?></li><br>
                    <li>ĐỊA ĐIỂM  LÀM VIỆC</li>
                    <li>TP.Hồ Chí Minh</li><br>
                    <li>EMAIL</li>
                    <li><?php echo $result['email'];?></li>
                </ul>       
            </div>
        <div class="col-lg-9" style="background-color:white;border-radius:80px 0 0 0;padding:70px 30px 0px 50px">
            <strong style="font-size:40px"><?php echo $result['hoten'];?></strong>
            <h5>CÔNG NGHỆ THÔNG TIN</h5>
            <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>HỌC VẤN</strong></h6> 
            <hr>
            <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
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
<div class="tab-pane container fade" id="diemso">
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
                $ds = $sv->getdiem($_SESSION['mssv']);
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
    

</div>
<div class="tab-pane container fade" id="thi">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:10%">STT</th>
                <th style="width:70%">Tên học phần</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $kdh = new khoahoc();
                if(isset($_SESSION['lanthi'])){
                
                $result = $kdh->getKhoaDangHoc($_SESSION['mssv']);
                $i = 0;
                while($set = $result->fetch()):
                $i++;
            ?>
            <?php
                if($set[$_SESSION['lanthi'].'_trangthai']==0){
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $set['tenkhoahoc'];?></td>
                <td><button class="btn btn-success mx-auto d-block w-75" data-bs-toggle="modal" data-bs-target="#<?php echo $set['makhoahoc'];?>">Bắt đầu</button></td>
            </tr>
            <?php
                }
            
            ?>
                            <!-- The Modal -->
            <div class="modal" id="<?php echo $set['makhoahoc'];?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title mx-auto d-block">Bài Thi <?php echo $set['tenkhoahoc'];?> Lần 1</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            
                            <form action="index.php?action=sinhvien&act=baithi&makh=<?php echo $set['makhoahoc'];?>" id="form_<?php echo $set['makhoahoc'];?>" method="POST">
                                <label for="cau1">Câu 1: JavaScript có các biến ?</label> <br>
                                <input type="radio" name="cau1" id="" value="1"> Number, String, Boolean <br>
                                <input type="radio" name="cau1" id="" value="2"> Numbber, Integer, Char <br>
                                <input type="radio" name="cau1" id="" value="3"> Number, String, Boolean, Null <br>
                                <input type="radio" name="cau1" id="" value="4"> Tất cả các loại trên <br> <br>
                                <label for="cau1">Câu 2: JavaScript có các biến ?</label> <br>
                                <input type="radio" name="cau2" id="" value="1"> Numbber, Integer, Char <br>
                                <input type="radio" name="cau2" id="" value="2"> Number, String, Boolean <br>
                                <input type="radio" name="cau2" id="" value="3"> Tất cả các loại trên <br>
                                <input type="radio" name="cau2" id="" value="4"> Number, String, Boolean, Null <br> <br>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" form="form_<?php echo $set['makhoahoc'];?>">Nộp bài</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
                }
            ?>
        </tbody>
    </table>
    
</div>
<div class="tab-pane container fade" id="chinhsua">
    <div class="row">
        <div class="col-lg-6 p-5">
            <img src="./Public/img/thaydoisinhvien.jpg" width="100%" height="500px" alt="">
        </div>
        <div class="col-lg-6 text-center mt-5 pl-5 pr-5">
            <h3 class="mt-1"><strong>CẬP NHẬT THÔNG TIN</strong></h3>
            <form action="index.php?action=sinhvien&act=update" enctype="multipart/form-data" method='POST'>
                <?php
                    $result = $sv->getDetail($_SESSION['mssv']);
                ?>
                <div class="form-group">
                    <input type="number" value="<?php echo $result['massv'];?>" autocomplete="off" id="mssv" class="form-control" name="mssv" placeholder="Mã số sinh viên" disabled>
                </div>
                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" name="hoten" placeholder="Họ tên" value="<?php echo $result['hoten'];?>">
                </div>
                <select name="lop" class="custom-select mb-3" disabled>
                    <option selected value="CD20CT12">CD20CT12</option>
                    <option value="CD20CT13">CD20CT13</option>
                </select>
                <select name="phai" class="custom-select mb-3" disabled>
                    <option selected value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <div class="form-group">
                    <input type="text" autocomplete="off"  value="<?php echo $result['ngaysinh'];?>" class="form-control" name="ngaysinh" placeholder="Ngày sinh VD: 2022-01-30">
                </div>
                <div class="form-group">
                    <input type="text" name="hinhan" id="hinhan" value="<?php echo $result['hinhanh'];?>" hidden>
                    <label for="#">Chọn hình đại diện</label>
                    <input type="file" name="hinh" class="form-control" onchange="lenhinh(this)">
                </div>
                <script>
                    function lenhinh(ele){
                        document.getElementById('hinhan').value = ele.files[0].name
                    }
                </script>
                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" name="diachi" placeholder="Địa chỉ"  value="<?php echo $result['diachi'];?>">
                </div>
                <div class="form-group">
                    <input type="number" autocomplete="off" class="form-control" name="sdt" placeholder="Số điện thoại"  value="<?php echo $result['sdt'];?>">
                </div>
                <div class="form-group">
                    <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email"  value="<?php echo $result['email'];?>">
                </div>
                <button type="submit" class="btn text-light w-75 btn-primary">Cập nhật</button>
            </form>                
        </div>
    </div>
</div>



