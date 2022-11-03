<?php
    include './Model/connect.php';
    include './Model/blog.php';
    include './Model/sinhvien.php';
    include './Model/khoahoc.php';
    include './Model/binhluan.php';
    session_start ();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./Public/style.css">
    <style>
        ::selection{
            background-color: #f05123;
            color: #fff;
        }
        ::-webkit-scrollbar {
            width: 8px;
            
        }
        
        /* Track */
        ::-webkit-scrollbar-track {       
            background: #f1f1f1; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888; 
            border-radius: 10px;
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="menu-content">
                <ul class="pb-4">
                    <li>
                        <a href="#" class="text-light">
                            <span class="icon">
                                <ion-icon name="school-outline"></ion-icon>
                            </span>
                            <span class="title ">School Administrator</span>
                        </a>
                    </li>
                </ul>
                <?php
                    $ctrl = 'home';
                    if(isset($_GET['action'])){
                        $ctrl = $_GET['action'];
                    }
                ?>
                <ul class="list-menu pt-3">
                    <li <?php if($ctrl=='home')echo 'class="hovered"';?>>
                        <a href="./index.php?action=home" class="text-light">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li <?php if($ctrl=='student')echo 'class="hovered"';?>>
                        <a href="./index.php?action=student" class="text-light">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Students</span>
                        </a>
                    </li>
                    <li <?php if($ctrl=='message')echo 'class="hovered"';?>>
                        <a href="./index.php?action=message" class="text-light">
                            <span class="icon">
                                <ion-icon name="chatbox-outline"></ion-icon>
                            </span>
                            <span class="title">Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=exam" class="text-light">
                            <span class="icon">
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Exam</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-light">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-light">
                            <span class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </span>
                            <span class="title">Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-light">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="body-content">
                <div class="nav row ps-2 bg-light"
                    style="position: fixed;width: 81%;z-index: 3;box-shadow: 0 0 5px 0px gray;">
                    <div class="col-lg-3">
                        <div class="form-check form-switch" style="font-size: 24px;">
                            <input onchange="menuStatus()" class="form-check-input" type="checkbox" id="myMenu"
                                name="menu" value="yes" checked>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <form action="#" class="w-100 text-center">
                            <input type="text" class="pt-1 pe-1 ps-3"
                                style="border: 1px solid #dce0e3;border-radius: 20px;width: 50%"
                                placeholder="Tìm kiếm khóa học, bài viết, video, ...">
                        </form>
                    </div>
                    <div class="col-lg-3 p-1">
                        <div class="form-check form-switch float-end" style="font-size: 26px;">
                            <img src="../Public/img/nam.png" width="40px" alt="">
                        </div>
                    </div>
                </div>
                <?php
                    
                    include './Controller/'.$ctrl.'.php';
                ?>
                
            </div>
        </div>
    </div>
</body>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php
    $sv = new sinhvien();
    $result = $sv->gethocluc();
    $kh = new khoahoc();
    $hocphi = $kh->getdoanhthu();
    // echo '<script>alert("'.$result['Yeu'].'")</script>';
?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: ['Xuất sắc', 'Giỏi', 'Trung Bình', 'Yếu', 'Khá'],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $result['Xuatsac'];?>,<?php echo $result['Gioi'];?>,<?php echo $result['Trungbinh'];?>,<?php echo $result['Yeu'];?>,<?php echo $result['Kha'];?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });

    const chartearning = document.getElementById('myChart-earning').getContext('2d');
    const myChart_earning = new Chart(chartearning, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu 2022',

                data: [
                    <?php
                        while($set=$hocphi->fetch()):
                    ?>
                    <?php echo $set['hocphi']/1000;?>,
                    <?php endwhile;?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>
<script src="./Public/script.js"></script>

</html>