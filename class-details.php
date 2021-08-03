 <!-- start header -->
 <?php
 $title = 'Chi tiết khóa học';
    include './inc/header.php';
?>
 <?php 
    if(!isset($_GET['classId']) || $_GET['classId'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $Id = $_GET['classId'];
    }
?>
 <?php 
        $show_class_details = $class->show_class_details($Id);
        if($show_class_details)
        {
            while($result_details_class = $show_class_details->fetch_assoc())
            {
     ?>
 <div class="headtop">
     <div class="container-fluid">
         <div class="wrap">
             <div class="headtop-left">
                 <div class="avatar">
                     <img src="./uploads/<?php echo $result_details_class['coursesImage']?>" alt="">
                 </div>
                 <div class="title">
                     <h2><?php echo $result_details_class['coursesName']?></h2>
                     <p><?php echo $result_details_class['classTeacher']?></p>
                 </div>
             </div>
             <div class="headtop-right">
                 <p class="price">
                     <?php echo $fm->formatMoney($result_details_class['classPrice']) ?>
                 </p>
                 <a href="register.php" class="btn">
                     đăng ký
                 </a>
             </div>
         </div>
     </div>
     <div class="headtop-progress"></div>
 </div>
 <?php
            }
        }
 ?>
 </header>
 <!-- end header  -->
 <!-- main -->
 <main id="course-details">
     <?php 
        $get_class_details = $class->get_details($Id);
        if($get_class_details)
        {
            while($result_details = $get_class_details->fetch_assoc())
            {
     ?>
     <section class="banner-section">
         <div class="wrap">
             <div class="container">
                 <div class="info">
                     <h1><?php echo $result_details['className']?></h1>
                     <?php 
                     if($result_details['classStatus'] == 0 )
                     {
                         echo ' <div class="row">Đang diễn ra</div>';
                     }
                     else if($result_details['classStatus'] == 1)
                     {
                         echo ' <div class="row">Sắp khai giảng</div>';
                     }
                     else if($result_details['classStatus'] == 2)
                     {
                         echo ' <div class="row">Đã kết thúc</div>';
                     }
                     ?>
                     <div class="row">
                         <div class="date">
                             <h3>Khai giảng:</h3>
                             <span><?php echo $fm->formatDate($result_details['classTime'])?></span>
                         </div>
                         <div class="time">
                             <h3>Học phí:</h3>
                             <span><?php echo $fm->formatMoney($result_details['classPrice']) ?></span>
                         </div>
                     </div>
                     <?php
                     if($result_details['classStatus'] == 1)
                     {
                         $Id_temp = $result_details['classId'];
                         echo " <div class='register'>
                         <a href='register.php?classId=$Id_temp' class='btn'>Đăng Ký</a>
                     </div>";
                     }
                     ?>
                     <div class="bottom">
                         <div class="container">
                             <div class="row">
                                 <div class="details">
                                     <h3>Thông tin chi tiết</h3>
                                 </div>
                                 <div class="sessions">
                                     <h3>Số buổi: <span><?php echo  $result_details['classLesson'] ?> Buổi</span> </h3>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="section-details">
         <div class="container">
             <p class="desc"><?php echo $result_details['classDesc'] ?></p>
             <div class="schedule">
                 <h2 class="title">LỊCH HỌC</h2>
                 <ul>
                     <li>
                         <h3>Khai giảng: </h3>
                         <span><?php echo $fm->formatDate($result_details['classTime'])?></span>
                     </li>
                     <li>
                         <h3>Thời gian học: </h3>
                         <span> <?php echo  $result_details['classLearnTime'] ?> </span>
                     </li>
                     <li>
                         <h3>Địa điểm học: </h3>
                         <span><?php echo  $result_details['classAddress'] ?></span>
                     </li>
                 </ul>
             </div>
             <div class="accordion">
                 <div class="accordion-wrap" id="acc-details">
                     <h2 class="accordion-main">NỘI DUNG KHÓA HỌC</h2>
                     <?php 
                        $show_lesson = $lesson->show_lesson($Id);
                        if($show_lesson)
                        {
                            $i = 0;
                            while($result = $show_lesson->fetch_assoc())
                            {
                            $i++;
                    ?>
                     <div class="accordion-item">
                         <div class="accordion-title">
                             <h2><?php echo $result['lessonName'] ?></h2>
                             <span>Ngày <?php echo $i; ?></span>
                         </div>
                         <div class="accordion-content">
                             <p>
                                 <?php echo $result['lessonDesc'] ?>
                             </p>
                         </div>
                     </div>
                     <?php 
                            }
                        }
                        ?>
                 </div>
             </div>
             <h2 class="title">HÌNH THỨC HỌC</h2>
             <div class="row row-check">
                 <div class="col-md-6">
                     <p>Học offline hoặc online với sự hướng dẫn của 2 mentor CFD.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Dạy và thực hành thêm bài tập online thông qua Google Meet.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Hỗ trợ từ xa thông qua Teamviewer, Ultraview, group CFD và hỗ trợ trực tiếp liên tục tại
                         lớp học.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Mỗi buổi học được quay video lại để học viên có thể xem lại khi cần thiết.</p>
                 </div>
             </div>
             <h2 class="title">YÊU CẦU CẦN CÓ</h2>
             <div class="row row-check">
                 <div class="col-md-6">
                     <p>Có laptop cá nhân.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Cài đặt phần mềm Photoshop, VS Code.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Hạn chế tối đa nghỉ học và hoàn thành bài tập được giao.</p>
                 </div>
                 <div class="col-md-6">
                     <p>Thành viên CFD phải có tinh thần chiến đấu, trách nhiệm, chủ động cao trong việc học,
                         cũng như tự học và làm thêm tại nhà.</p>
                 </div>
             </div>
             <div class="teachers">
                 <h2 class="title">Người dạy</h2>
                 <div class=" teacher">
                     <div class="avatar">
                         <img src="./uploads/<?php echo $result_details['classTeacherAvatar']?>" alt="">
                     </div>
                     <div class="info">
                         <h3 class="name"><?php echo $result_details['classTeacher']?></h3>
                         <p class="title"><?php echo $result_details['classTeacherDesc']?></p>
                         <p class="intro">
                             <?php echo $result_details['classTeacherIntro']?>
                         </p>
                     </div>
                 </div>
                 <h2 class="title">Người hướng dẫn</h2>
                 <div class=" teacher mentors">
                     <div class="avatar">
                         <img src="./uploads/<?php echo $result_details['classMentorAvatar']?>" alt="">
                     </div>
                     <div class="info">
                         <h3 class="name"><?php echo $result_details['classMentor']?></h3>
                         <p class="title"><?php echo $result_details['classMentorDesc']?></p>
                         <p class="intro">
                             <?php echo $result_details['classMentorIntro']?>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="bottom">
                 <div class="user">
                     <img src="img/user-group-icon.png" alt="">
                     14 bạn đã đăng ký
                 </div>
                 <a href="register.php?classId=<?php echo $result_details['classId']?>" class="btn register">Đăng ký</a>
             </div>
         </div>
     </section>
     <section class="course-section" style="background-color:  #ededed;">
         <div class="container">
             <div class="course">
                 <h2 class="main-title">Khóa Học Liên Quan</h2>
                 <div class="course-list">
                     <?php 
                        $getclass_relative = $class->show_class_relative($Id);
                        if($getclass_relative) {
                            while($result = $getclass_relative->fetch_assoc())
                            {
                    ?>
                     <div class="course-item">
                         <a href="class-details.php?classId=<?php echo $result['classId'] ?>">
                             <span class="course-badge">Sắp khai giảng</span>
                             <h3 class="course-title">
                                 <?php echo $result['className']?>
                             </h3>
                             <p class="text">
                                 <?php echo $result['classDesc']?>
                             </p>
                             <div class="course-bottom">
                                 <div class="author">
                                     <img src="uploads/<?php echo $result['classTeacherAvatar']?>" alt=""
                                         class="avatar">
                                     <h4 class="name"><?php echo $result['classTeacher'] ?></h4>
                                 </div>
                                 <div class="date">
                                     <?php echo $fm->formatDate($result['classTime'])?>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <?php 
                            }
                        }
                    ?>
                 </div>
             </div>
         </div>
     </section>
     <?php 
           }
        }
     ?>
 </main>
 <!-- footer -->

 <?php 
    include './inc/footer.php';
?>