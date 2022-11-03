<div class="row" style="margin-top: 90px;min-height:500px">
    <?php
        include './View/menu.php';
    ?>
            <div class="col-lg-10 " style="position: relative;left: 140px;">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table" id="banggiohang">
                            <thead>
                              <tr>
                                <th class="pl-5">KHÓA HỌC</th>
                                <th>NỘI DUNG</th>
                                <th>HÌNH THỨC</th>
                                <th>HỌC PHÍ</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $kh =  new Khoahoc();
                                $tonghocphi = 0;
                                foreach(array_unique($_SESSION['giohang']) as $item){
                                    $result = $kh->getmotkhoahoc($item);
                                    $tonghocphi += $result['hocphi'];
                                
                            ?>
                                <tr>
                                    <td><img src="./Public/img/<?php echo $result['hinh'];?>" width="120px" alt="" style="border-radius:10px"></td>
                                    <td><?php echo $result['tenkhoahoc'];?></td>
                                    <td><?php echo $result['loai'];?></td>
                                    <td><?php echo number_format($result['hocphi']);?> ₫</td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                        <a href="index.php?action=giohang&act=del"><button class="btn btn-outline-danger" type="button">Xóa Giỏ hàng</button></a>
                    </div>

                    <div class="col-lg-3" style="position: fixed;right: 100px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th class="w-50">TỔNG SỐ LƯỢNG</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tổng phụ</td>
                                            <td><strong><?php echo number_format($tonghocphi);?> ₫</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Thông báo</td>
                                            <td>
                                                <p style="font-size: 13px;">
                                                    Ngày bắt đầu sẽ được thông báo sau khi thanh toán khóa học.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mã giảm giá: </td>
                                            <td>
                                                <input id="mgg" class="w-100" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tổng</td>
                                            <td><strong id="tongtien"></strong> <strong>₫</strong></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                  <a <?php if(count($_SESSION['giohang'])>0):?> href="index.php?action=giohang&act=thanhtoan"<?php endif;?>><button class="btn btn-danger w-100 p-3"<?php if(count($_SESSION['giohang'])==0){ echo 'disabled';}?>>TIẾN HÀNH THANH TOÁN</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>