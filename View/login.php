<div class="row" style="margin-top: 90px">
    <?php include './View/menu.php';?>

    <div class="col-lg-8 mx-auto mt-4 mb-5" style="position: relative;left: 40px;box-shadow: 0px 10px 20px 0px black;">
        <div class="row">
            <div class="col-lg-8 p-5">
                <img src="./Public/img/login-banner.jpg" width="100%" height="300px" alt="">
            </div>
            <div class="col-lg-4 text-center mt-5 pl-5 pr-5">
                <h3 class="mt-4"><strong>ĐĂNG NHẬP</strong></h3>
                <form action="index.php?action=sinhvien&act=login" method='POST'>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="mssv" placeholder="Mã số sinh viên">
                    </div>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="pass" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group form-check text-left">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Lưu tài khoản
                        </label>
                    </div>
                    <button type="submit" class="btn text-light w-75" style="background-color: #f05123">Đăng
                        nhập</button>
                </form>                
            </div>
        </div>
    </div>
</div>
