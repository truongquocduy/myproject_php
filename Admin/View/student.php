<div class="row justify-content-center" style="margin-top: 80px;">
    <div class="card-list col-lg-3 p-4" style="">
        <a href="./index.php?action=student">
            <ion-icon name="school-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
            </ion-icon>
            <?php
                $sv = new sinhvien();
                $slsv = $sv->count();
            ?>
            <h2 style="color:#287BFF;width: 70%;"><strong><?php echo $slsv;?></strong></h2>
            <h6 style="color:#a8b0b6;font-size: 14px;width: 70%;">Students</h6>
        </a>
    </div>
    <div class="card-list col-lg-3 p-4"
        style="border-radius: 14px;width: 22%;margin-right: 1%;box-shadow: 0px 0px 14px 0px gray;">
        <ion-icon name="briefcase-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
        </ion-icon>
        <h2 style="color:#287BFF;"><strong>80</strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;">Class</h6>
    </div>
    <div class="card-list col-lg-3 p-4"
        style="border-radius: 14px;width: 22%;margin-right: 1%;box-shadow: 0px 0px 14px 0px gray;">
        <ion-icon name="chatbubbles-outline"
            style="width: 30%;float: right;font-size: 60px;color:#a8b0b6"></ion-icon>
        <h2 style="color:#287BFF;"><strong>284</strong></h2>
        <h6 style="color:#a8b0b6;font-size: 14px;">Comments</h6>
    </div>
    <div class="card-list col-lg-3 p-4" style="border-radius: 14px;width: 22%;box-shadow: 0px 0px 14px 0px gray;">
        <a href="./index.php?action=student&act=create">
            <ion-icon name="cash-outline" style="width: 30%;float: right;font-size: 60px;color:#a8b0b6">
            </ion-icon>
            <h2 style="color:#287BFF;"><strong>New</strong></h2>
            <h6 style="color:#a8b0b6;font-size: 14px;">New Student</h6>
        </a>
    </div>

</div>
<div class="row mt-5 mb-5" id="khung_sv">
    <div class="col-lg-12 p-4">
        <h6 style="color: #287BFF;" class="mb-4"><strong>Students List</strong></h6>
        <form action="index.php?action=home&act=student#khung_sv" style="display:flex" method="POST">
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
                <a class="nav-link" data-bs-toggle="pill" href="#menu2_<?php echo $set['massv'];?>">Tiểu sử</a>
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
            <div class="tab-pane container fade" id="menu2_<?php echo $set['massv'];?>">
                <div class="row">
                    <div class="col-lg-6 p-5">
                        <img src="../Public/img/thaydoisinhvien.jpg" width="100%" height="500px" alt="">
                    </div>
                    <div class="col-lg-6 text-center mt-5 pl-5 pr-5">
                        <h3 class="mt-4"><strong>CẬP NHẬT TÀI KHOẢN</strong></h3>
                        
                        <form action="index.php?action=student&act=update" method='POST' id="frm">
                            <div class="input-group mb-3">
                                <input type="number" autocomplete="off" id="mssv" class="form-control bg-light" name="mssv" placeholder="Mã số sinh viên" value="<?php echo $set['massv'];?>">
                                <button type="button" class="input-group-text" onclick="randomID();"><ion-icon name="shuffle-outline"></ion-icon></button>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="hoten" placeholder="Họ tên" value="<?php echo $set['hoten'];?>">
                            </div>
                            <select name="lop" class="form-select mb-3">
                                <option value="CD20CT12" <?php if($set['lop']=='CD20CT12') echo 'selected="selected"'?>>CD20CT12</option>
                                <option value="CD20CT13" <?php if($set['lop']=='CD20CT13') echo 'selected="selected"'?>>CD20CT13</option>
                            </select>
                            <select name="phai" class="form-select mb-3">
                                <option value="Nam" <?php if($set['phai']=='Nam') echo 'selected="selected"'?>>Nam</option>
                                <option value="Nữ" <?php if($set['phai']=='Nữ') echo 'selected="selected"'?>>Nữ</option>
                            </select>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="ngaysinh" placeholder="Ngày sinh VD: 2022-01-30" value="<?php echo $set['ngaysinh'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="diachi" placeholder="Địa chỉ" value="<?php echo $set['diachi'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" autocomplete="off" class="form-control" name="sdt" placeholder="Số điện thoại" value="0<?php echo $set['sdt'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email" value="<?php echo $set['email'];?>">
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="input-group-text"><input type="checkbox" name="check_matkhau" id="check_update_<?php echo $set['massv'];?>" onchange="hienthimk('<?php echo $set['massv'];?>')"></button>
                                <input type="text" autocomplete="off" class="form-control" name="pass" placeholder="Mật khẩu" id="update_mk_<?php echo $set['massv'];?>">
                                <script>
                                    document.getElementById('update_mk_<?php echo $set['massv'];?>').disabled=true
                                    hienthimk=(val)=>{
                                        if(document.getElementById('check_update_'+val).checked){
                                            document.getElementById('update_mk_'+val).disabled=false
                                        }
                                        else{
                                            document.getElementById('update_mk_'+val).disabled=true

                                        }
                                    }
                                </script>
                            </div>
                            <button type="submit" class="btn text-light w-75 btn-primary mb-5">Cập nhật tài khoản</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php endwhile;?>
