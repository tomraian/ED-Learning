<?php 
    include 'lib/session.php';
    Session::init();
?>
<?php 
    include 'lib/database.php';
    include 'helpers/format.php';
    include './classes/class.php';
    include './classes/admin.php';
    include './classes/courses.php';
    include './classes/contact.php';
    include './classes/review.php';
    include './classes/slider.php';
    include './classes/register.php';
    include './classes/lesson.php';
    include './classes/team.php';
    $db = new Database();
    $fm = new Format();
    $admin = new admin();
    $class = new classOfCourse();
    $courses = new courses();
    $contact = new contact();
    $review = new review();
    $slider = new slider();
    $register = new register();
    $lesson = new lesson();
    $team = new team();
?>
<?php 
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="./img/logo-mb.png" type="image/png">
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />

    <link rel="stylesheet" href="dest/style.min.css">
    <link rel="stylesheet" href="dest/fonts.css">
    <link rel="stylesheet" href="dest/stylelibs.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- header aria -->
        <header>
            <nav class="header-menu header-menu-desktop">
                <div class="hamburger">
                    <div class="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <p>menu</p>
                </div>
                <a href="index.php" class="logo">
                    <img src="img/logo-lg.png " alt="" class=" svg">
                </a>
            </nav>
            <nav class="nav">
                <ul class="menu-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        <a href="courses.php">Khóa học</a>
                    </li>
                    <li>
                        <a href="team.php">CFD team</a>
                    </li>
                    <li>
                        <a href="contact.php">liên hệ</a>
                    </li>
                </ul>
            </nav>
            <div class="overlay"></div>