<?php 
    include '../lib/session.php';
    Session::checkSession();
?>
<?php 
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if(isset($title))
            {
                echo $title;
            }
            else{
                echo 'ED';
            }
        ?>
    </title>
    <link rel="shortcut icon" href="./images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <a href="index.php">
                <img src="./images/logo-lg.png" alt="Comapny logo">
                <div class="sidebar-close" id="sidebar-close">
                    <i class='bx bx-left-arrow-alt'></i>
                </div>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <div class="sidebar-user-name">
                    <?php 
                    echo Session::get('adminName');
                    ?>
                </div>
            </div>
            <button class="btn btn-outline">
                <?php 
                if(isset($_GET['action']) && $_GET['action'] == 'logout')
                {
                    Session::destroy();
                }
                ?>
                <a href="?action=logout">
                    <i class='bx bx-log-out bx-flip-horizontal'></i>
                    <span>Đăng xuất</span>
                </a>
            </button>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="index.php" class="">
                    <i class='bx bx-home'></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-shopping-bag'></i>
                    <span>sales</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chart'></i>
                    <span>analytic</span>
                </a>
            </li> -->
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-user-circle'></i>
                    <span>Tài khoản</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./editaccount.php">
                            Sửa thông tin
                        </a>
                    </li>
                    <li>
                        <a href="./addadmin.php">
                            Thêm quản trị viên
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>Khóa Học</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listcourse.php">
                            Danh sách khóa học
                        </a>
                    </li>
                    <li>
                        <a href="./addcourse.php">
                            Thêm khóa học
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>Lớp học</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listclass.php">
                            Danh sách lớp học
                        </a>
                    </li>
                    <li>
                        <a href="./addclass.php">
                            Thêm lớp học
                        </a>
                    </li>
                    <li>
                        <a href="./addlesson.php">
                            Thêm nội dung lớp học
                        </a>
                    </li>
                    <li>
                        <a href="./listlesson.php">
                            danh sách nội dung lớp học
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-carousel'></i>
                    <span>Slider Cảm nhận</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listreview.php">
                            Danh sách Slider
                        </a>
                    </li>
                    <li>
                        <a href="./addreview.php">
                            Thêm Slider
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-carousel'></i>
                    <span>Slider Team</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listslider.php">
                            Danh sách Slider
                        </a>
                    </li>
                    <li>
                        <a href="./addslider.php">
                            Thêm Slider
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-user'></i>
                    <span>Thành viên ED</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listteam.php">
                            Danh sách thành viên
                        </a>
                    </li>
                    <li>
                        <a href="./addteam.php">
                            Thêm thành viên
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./listcontact.php">
                    <i class='bx bx-chat'></i>
                    <span>liên hệ</span>
                </a>
            </li>
            <li>
                <a href="./listregister.php">
                    <i class='bx bx-data'></i>
                    <span>Danh sách người đăng ký</span>
                </a>
            </li>
            <!--    <li>
                <a href="#">
                    <i class='bx bx-calendar'></i>
                    <span>calendar</span>
                </a>
            </li> -->
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-cog'></i>
                    <span>Cài đặt</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            Nền tối
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->