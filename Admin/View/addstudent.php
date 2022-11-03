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
<div class="row m-5" style="box-shadow: 0px 10px 20px 0px black;">
    <div class="col-lg-6 p-5">
        <img src="../Public/img/taotaikhoan.jpg" width="80%" alt="">
    </div>
    <div class="col-lg-6 text-center mt-5 pl-5 pr-5">
        <h3 class="mt-4"><strong>TẠO TÀI KHOẢN</strong></h3>
        
        <form action="index.php?action=student&act=create_action" method='POST' id="frm">
            <div class="input-group mb-3">
                <input type="number" autocomplete="off" id="mssv" class="form-control bg-light" name="mssv" placeholder="Mã số sinh viên" >
                <button type="button" class="input-group-text" onclick="randomID();"><ion-icon name="shuffle-outline"></ion-icon></button>
            </div>
            <div class="form-group mb-3">
                <input type="text" autocomplete="off" class="form-control" name="hoten" placeholder="Họ tên">
            </div>
            <select name="lop" class="form-select mb-3">
                <option selected value="CD20CT12">CD20CT12</option>
                <option value="CD20CT13">CD20CT13</option>
            </select>
            <select name="phai" class="form-select mb-3">
                <option selected value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            <div class="form-group mb-3">
                <input type="text" autocomplete="off" class="form-control" name="ngaysinh" placeholder="Ngày sinh VD: 2022-01-30">
            </div>
            <div class="form-group mb-3">
                <input type="text" autocomplete="off" class="form-control" name="diachi" placeholder="Địa chỉ">
            </div>
            <div class="form-group mb-3">
                <input type="number" autocomplete="off" class="form-control" name="sdt" placeholder="Số điện thoại">
            </div>
            <div class="form-group mb-3">
                <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group mb-3">
                <input type="text" autocomplete="off" class="form-control" name="pass" placeholder="Mật khẩu">
            </div>
            <button type="submit" class="btn text-light w-75 btn-primary mb-5">Tạo tài khoản</button>
        </form>
    </div>
</div>