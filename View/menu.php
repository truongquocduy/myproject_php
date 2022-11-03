<?php
    $css = 'background-color: #e8ebed';
    
?>
<div class="col-lg-1 ml-2" style="height: 300px;position: fixed;">
        <ul class="menu">
            <?php
                if(isset($_SESSION['mssv'])):
            ?>
            <li style="background-color:#1473e6">
                <a href="index.php?action=blog&act=themblog" class="pl-3 text-light">
                    <i class="fas fa-plus" style="font-size: 24px;"></i>
                </a>
            </li>
            <?php endif;?>
            <li style="<?php if($ctrl == 'home') echo $css;?>">
                <a href="./index.php?action=home" class="pl-3">
                    <i class="fas fa-home" style="font-size: 16px;"></i>
                    <span>Home</span>
                </a>
            </li>
            <li style="<?php if($ctrl == 'lotrinh') echo $css;?>">
                <a href="./index.php?action=lotrinh" class="pl-3">
                    <i class="fas fa-graduation-cap" style="font-size: 16px;"></i>
                    <span>Lộ trình</span>
                </a>
            </li>
            <li style="<?php if($ctrl == 'khoahoc') echo $css;?>">
                <a href="./index.php?action=khoahoc" class="pl-3">
                    <i class="fas fa-lightbulb" style="font-size: 16px;"></i>
                    <span>Học</span>
                </a>
            </li>
            <li style="<?php if($ctrl == 'blog') echo $css;?>">
                <a href="./index.php?action=blog" class="pl-3">
                    <i class="fas fa-th" style="font-size: 16px;"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li style="<?php if($ctrl == 'sinhvien') echo $css;?>">
                <a href="./index.php?action=sinhvien" class="pl-3">
                    <i class="fas fa-user-graduate" style="font-size: 16px;"></i>
                    <span>Học viên</span>
                </a>
            </li>
        </ul>

    </div>