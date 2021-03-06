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
                    <span>????ng xu???t</span>
                </a>
            </button>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="index.php" class="">
                    <i class='bx bx-home'></i>
                    <span>Trang ch???</span>
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
                    <span>T??i kho???n</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./editaccount.php">
                            S???a th??ng tin
                        </a>
                    </li>
                    <li>
                        <a href="./addadmin.php">
                            Th??m qu???n tr??? vi??n
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>Kh??a H???c</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listcourse.php">
                            Danh s??ch kh??a h???c
                        </a>
                    </li>
                    <li>
                        <a href="./addcourse.php">
                            Th??m kh??a h???c
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>L???p h???c</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listclass.php">
                            Danh s??ch l???p h???c
                        </a>
                    </li>
                    <li>
                        <a href="./addclass.php">
                            Th??m l???p h???c
                        </a>
                    </li>
                    <li>
                        <a href="./addlesson.php">
                            Th??m n???i dung l???p h???c
                        </a>
                    </li>
                    <li>
                        <a href="./listlesson.php">
                            danh s??ch n???i dung l???p h???c
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-carousel'></i>
                    <span>Slider C???m nh???n</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listreview.php">
                            Danh s??ch Slider
                        </a>
                    </li>
                    <li>
                        <a href="./addreview.php">
                            Th??m Slider
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
                            Danh s??ch Slider
                        </a>
                    </li>
                    <li>
                        <a href="./addslider.php">
                            Th??m Slider
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-user'></i>
                    <span>Th??nh vi??n ED</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./listteam.php">
                            Danh s??ch th??nh vi??n
                        </a>
                    </li>
                    <li>
                        <a href="./addteam.php">
                            Th??m th??nh vi??n
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./listcontact.php">
                    <i class='bx bx-chat'></i>
                    <span>li??n h???</span>
                </a>
            </li>
            <li>
                <a href="./listregister.php">
                    <i class='bx bx-data'></i>
                    <span>Danh s??ch ng?????i ????ng k??</span>
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
                    <span>C??i ?????t</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            N???n t???i
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->