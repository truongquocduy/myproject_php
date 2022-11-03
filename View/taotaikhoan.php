<div class="row" style="margin-top: 90px">
    <?php include './View/menu.php';?>

    <div class="col-lg-8 mx-auto mt-4 mb-5" style="position: relative;left: 40px;box-shadow: 0px 10px 20px 0px black;">
        <div class="row">
            <div class="col-lg-6 p-5">
                <img src="./Public/img/taotaikhoan.jpg" width="100%" alt="">
            </div>
            <div class="col-lg-6 text-center mt-5 pl-5 pr-5">
                <h3 class="mt-4"><strong>TẠO TÀI KHOẢN</strong></h3>
                
                <form action="index.php?action=sinhvien&act=create_action" method='POST' id="frm">
                    <div class="form-group input-group">
                        <input type="number" autocomplete="off" id="mssv" class="form-control bg-light" name="mssv" placeholder="Mã số sinh viên" >
                        <div class="input-group-append">
                            <button type="button" class="input-group-text" onclick="randomID();"><i class="far fa-lightbulb"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="hoten" placeholder="Họ tên">
                    </div>
                    <select name="lop" class="custom-select mb-3">
                        <option selected value="CD20CT12">CD20CT12</option>
                        <option value="CD20CT13">CD20CT13</option>
                    </select>
                    <select name="phai" class="custom-select mb-3">
                        <option selected value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="ngaysinh" placeholder="Ngày sinh VD: 2022-01-30">
                    </div>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="diachi" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <input type="number" autocomplete="off" class="form-control" name="sdt" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="pass" placeholder="Mật khẩu">
                    </div>
                    <button type="submit" class="btn text-light w-75 btn-primary">Tạo tài khoản</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function randomID(){
        var mssv = document.getElementById('mssv');
        let x = Math.floor((Math.random() * 99) + 0);
        mssv.value= '5012005' + x;
    }
</script>
