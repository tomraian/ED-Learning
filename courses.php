 <!-- start header -->
 <?php
 $title = 'Danh sách khóa học';

    include './inc/header.php';
?>
 </header>
 <!-- end header  -->
 <main>
     <!-- start courses section -->
     <section class="course-section">
         <div class="container">
             <div class="content">
                 <h2 class="main-title">
                     Khóa Học CFD
                 </h2>
                 <p class="desc">
                     Khóa học thực chiến tại <b style="font-weight: 700;">CFD</b> được thiết kế giúp cho thành viên trải
                     nghiệm những dự án thực tế, bám sát yêu cầu nhà tuyển dụng, cũng như những kỹ năng cần thiết để ứng
                     tuyển tại các công ty.
                 </p>
             </div>
             <div class="course">
                 <h2 class="main-title">Offline & Online</h2>
                 <div class="course-list">
                     <?php 
                        $courses = $courses->check_course();
                        if($courses) {
                            while($result = $courses->fetch_assoc())
                            {
                            ?>
                     <div class="course-item">
                         <a href="class-list.php?courseId=<?php echo $result['coursesId'] ?>">
                             <h3 class="course-title">
                                 <?php echo $result['coursesName']?>
                             </h3>
                             <p class="text">
                                 <?php echo $result['coursesDesc']?>
                             </p>
                             <div class="course-image">
                                 <img src="./uploads/<?php echo $result['coursesImage']?>" alt="">
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
     <!-- end courses section -->
 </main>
 <?php 
    include './inc/footer.php';
?>