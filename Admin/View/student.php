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
                <option value="macdinh">M???c ?????nh</option>
                <option value="lop">Theo l???p</option>
                <option value="gioitinh">Theo gi???i t??nh</option>
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
                        filter2.innerHTML = '<option value="Nam">Nam</option><option value="Nu">N???</option>';
                    }
                    filter2.style.display = 'block';

                    // console.log(e.options[e.selectedIndex].value)
                    if(e.options[e.selectedIndex].value=='macdinh')
                        filter2.style.display = 'none';

                }
            </script>
            <button type="submit" class="btn btn-warning ms-3 text-light">L???c</button>
            <button type="button" class="btn btn-danger ms-3 text-light"><a href="index.php?action=student&act=khoadiem" class="text-light">Kh??a ??i???m</a></button>

        </form>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>H??nh ???nh</th>
                    <th>MSSV</th>
                    <th>H??? v?? T??n</th>
                    <th>L???p</th>
                    <th>Gi???i T??nh</th>
                    <th>Ng??y Sinh</th>
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
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#_<?php echo $set['massv'];?>">Chi ti???t</button></td>
                    <td><button type="button" class="btn btn-danger"><a href="index.php?action=student&act=del&id=<?php echo $set['massv'];?>" style="color:white">X??a</button>
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
                <a class="nav-link" data-bs-toggle="pill" href="#menu1_<?php echo $set['massv'];?>">??i???m s???</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu2_<?php echo $set['massv'];?>">Ti???u s???</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container active" id="home_<?php echo $set['massv'];?>">
                <div class="row pt-4">
                    <div class="col-lg-3 text-center pt-3 pb-3" style="background-color:#eae8e9;border-radius:10px">
                        <img src="../Public/img/<?php echo $set['hinhanh'];?>" width="80%" alt="" style="border: 6px solid #00c0f3;border-radius:100%;">
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>V??? B???N TH??N</strong></h6> 
                        <p class="text-left" style="font-size:14px">
                            C??? nh??n c??ng ngh??? th??ng tin, v???i kinh nghi???m x??y d???ng ph???n m???m, website, ??a n???n t???ng, photoshop . . .
                        </p>  
                        <h6 class="mt-5 text-left" style="color:#00c0f3;"><strong>TH??NG TIN LI??N H???</strong></h6> 
                        <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
                            <li>S??? ??I???N THO???I</li>
                            <li>(+84) <?php echo $set['sdt'];?></li> <br>
                            <li>QU?? QU??N</li>
                            <li><?php echo $set['diachi'];?></li><br>
                            <li>?????A ??I???M  L??M VI???C</li>
                            <li>TP.H??? Ch?? Minh</li><br>
                            <li>EMAIL</li>
                            <li><?php echo $set['email'];?></li>
                        </ul>       
                    </div>
                    <div class="col-lg-9" style="background-color:white;border-radius:80px 0 0 0;padding:70px 30px 0px 50px">
                        <strong style="font-size:40px"><?php echo $set['hoten'];?></strong>
                        <h5>C??NG NGH??? TH??NG TIN</h5>
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>H???C V???N</strong></h6> 
                        <hr>
                        <ul style="list-style:none;padding:0;font-size:14px">
                            <li><strong>Tr?????ng cao ?????ng CNTT TP.HCM</strong></li>
                            <li>2020 - 2023</li>
                            <li>??i???m trung b??nh: 8.0/10</li><br>
                            <li>Th??nh t??ch h???c t???p n???i b???t</li>
                            <ul>
                                <li>3 k??? cu???i c??ng ?????t h???c l???c gi???i</li>
                                <li>Nh???n ???????c h???c b???ng to??n ph???n c???a t??? ch???c Ti???ng Anh</li>
                            </ul>
                        </ul> 
                        <h6 class="mt-4 text-left" style="color:#00c0f3;"><strong>HO???T ?????NG NGO???I KH??A</strong></h6> 
                        <hr>
                        <ul class="text-left" style="list-style:none;padding:0;font-size:14px">
                            <li><strong>CLB nh?? l???p tr??nh vi??n t????ng lai</strong></li>
                            <li>2020 - hi???n t???i</li>
                            <ul>
                                <li>Danh hi???u sinh vi??n t??ch c???c</li>
                                <li>Th?????ng xuy??n ?????m nhi???m v??? tr?? tr?????ng nh??m trong c??c ho???t ?????ng c???a CLB nh?? l???p tr??nh vi??n t????ng lai do nh?? Tr?????ng t??? ch???c</li>
                                <li>L?? ?????i m???i li??n l???c, k???t n???i c??c h???i vi??n v?? c??c doanh nghi???p</li>
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
                            <th>T??n h???c ph???n</th>
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
                <h5>H???c L???c: <?php echo $set['hocluc'];?></h5>
            </div>
            <div class="tab-pane container fade" id="menu2_<?php echo $set['massv'];?>">
                <div class="row">
                    <div class="col-lg-6 p-5">
                        <img src="../Public/img/thaydoisinhvien.jpg" width="100%" height="500px" alt="">
                    </div>
                    <div class="col-lg-6 text-center mt-5 pl-5 pr-5">
                        <h3 class="mt-4"><strong>C???P NH???T T??I KHO???N</strong></h3>
                        
                        <form action="index.php?action=student&act=update" method='POST' id="frm">
                            <div class="input-group mb-3">
                                <input type="number" autocomplete="off" id="mssv" class="form-control bg-light" name="mssv" placeholder="M?? s??? sinh vi??n" value="<?php echo $set['massv'];?>">
                                <button type="button" class="input-group-text" onclick="randomID();"><ion-icon name="shuffle-outline"></ion-icon></button>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="hoten" placeholder="H??? t??n" value="<?php echo $set['hoten'];?>">
                            </div>
                            <select name="lop" class="form-select mb-3">
                                <option value="CD20CT12" <?php if($set['lop']=='CD20CT12') echo 'selected="selected"'?>>CD20CT12</option>
                                <option value="CD20CT13" <?php if($set['lop']=='CD20CT13') echo 'selected="selected"'?>>CD20CT13</option>
                            </select>
                            <select name="phai" class="form-select mb-3">
                                <option value="Nam" <?php if($set['phai']=='Nam') echo 'selected="selected"'?>>Nam</option>
                                <option value="N???" <?php if($set['phai']=='N???') echo 'selected="selected"'?>>N???</option>
                            </select>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="ngaysinh" placeholder="Ng??y sinh VD: 2022-01-30" value="<?php echo $set['ngaysinh'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" autocomplete="off" class="form-control" name="diachi" placeholder="?????a ch???" value="<?php echo $set['diachi'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" autocomplete="off" class="form-control" name="sdt" placeholder="S??? ??i???n tho???i" value="0<?php echo $set['sdt'];?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email" value="<?php echo $set['email'];?>">
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="input-group-text"><input type="checkbox" name="check_matkhau" id="check_update_<?php echo $set['massv'];?>" onchange="hienthimk('<?php echo $set['massv'];?>')"></button>
                                <input type="text" autocomplete="off" class="form-control" name="pass" placeholder="M???t kh???u" id="update_mk_<?php echo $set['massv'];?>">
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
                            <button type="submit" class="btn text-light w-75 btn-primary mb-5">C???p nh???t t??i kho???n</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php endwhile;?>
