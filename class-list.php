<?php
    // header 
    $title = 'Trang chủ';
    include './inc/header.php';
?>
<?php 
if(!isset($_GET['courseId']) || $_GET['courseId'] == NULL) {
    // echo "<script>window.location = 'courses.php'</script>";
} else {
    $Id = $_GET['courseId'];
}
?>
</header>
<!-- end header  -->
<main id="home-page">
    <!-- start banner section -->
    <section class="banner-section">
        <video autoplay loop muted>
            <source src="img/CFD-video-bg2.mp4" type="">
        </video>
        <div class="content">
            <h2>Thực Chiến </h2>
            <h2>
                Sáng Tạo Để Phát Triển
            </h2>
            <p>
                Giảm giá 5% khi học theo nhóm!
            </p>
            <a href="courses.php" class="">
                Khóa học
            </a>
        </div>
    </section>
    <!-- end banner section -->
    <!-- start courses section -->
    <section class="course-section course-offline">
        <div class="container">
            <div class="content">
                <h2 class="main-title">
                    Chào Mừng Bạn Đến Với CFD
                </h2>
                <p class="desc">
                    Nơi có những khóa học thực chiến Front-End Dev và UX/UI Design, kết nối và chia sẻ kinh
                    nghiệm giúp bạn có đầy đủ kỹ năng thực tế để tạo ra những sản phẩm sáng tạo, tinh tế và phù
                    hợp.
                </p>
            </div>
            <div class="course">
                <h2 class="main-title">Lớp học</h2>
                <div class="course-list">
                    <?php 
                        $getlist = $class->show_class_list($Id);
                        if(isset($getlist)){
                            while($result = $getlist->fetch_assoc())
                            {
                        ?>
                    <div class="course-item">
                        <a href="class-details.php?classId=<?php echo $result['classId'] ?>">
                            <?php 
                                if($result['classStatus'] == 0 )
                                {
                                    echo ' <span class="course-badge">Đang diễn ra</span>';
                                }
                                else if($result['classStatus'] == 1)
                                {
                                    echo ' <span class="course-badge">Sắp khai giảng</span>';
                                }
                                else if($result['classStatus'] == 2)
                                {
                                    echo ' <span class="course-badge disable">Đã kết thúc</span>';
                                }
                            ?>
                            <h3 class="course-title">
                                <?php echo $result['className']?>
                            </h3>
                            <p class="text">
                                <?php echo $result['classDesc']?>
                            </p>
                            <div class="course-bottom">
                                <div class="author">
                                    <img src="uploads/<?php echo $result['classTeacherAvatar']?>" alt="" class="avatar">
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
    <!-- end courses section -->
    <!-- start difference section  -->
    <section class="difference-section">
        <div class="difference-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="difference-item">
                            <h2 class="main-title white left">
                                Những Điều
                                <br>
                                <span>Đặc Biệt</span> Tại CFD
                            </h2>
                            <div class="video-difference btn-modal" data-toggle="modal-difference" data-video="">
                                <img src="img/img-cfd-dac-biet.jpg" alt="">
                                <div class="play-video">
                                    <img src="img/play-icon.svg" alt="" class="svg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="difference-item">
                            <div class="difference-item-desc">
                                <h3>Không cam kết đầu ra</h3>
                                <p>Với CFD thì việc cam kết đầu ra nó sẽ không có ý nghĩa nếu như cả người hướng
                                    dẫn và người học không thật sự tâm huyết và cố gắng. Vì thế, đội ngũ CFD sẽ
                                    làm hết sức để giúp các thành viên tạo ra sản phẩm có giá trị, thay vì cam
                                    kết.</p>
                            </div>
                            <div class="difference-item-desc">
                                <h3>Không chỉ là một lớp học</h3>
                                <p>CFD không phải một lớp học thuần túy, tất cả thành viên là một team, cùng hỗ
                                    trợ, chia sẻ và giúp đỡ nhau trong suốt quá trình học và sau này, với sự
                                    hướng dẫn tận tâm của các thành viên đồng sáng lập</p>
                            </div>
                            <div class="difference-item-desc">
                                <h3>Không để ai bị bỏ lại phía sau</h3>
                                <p>Vì chúng ta là một team, những thành viên tiếp thu chậm sẽ được đội ngũ CFD
                                    kèm cặp đặc biệt, cùng sự hỗ trợ từ các thành viên khác. Vì mục tiêu cuối
                                    cùng là hoàn thành khóa học thật tốt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end difference section  -->
    <!-- start testimonial section -->
    <section class="testimonial-section">
        <div class="testimonial-wrap">
            <div class="container">
                <div class="text-box">
                    <h2 class="main-title white">
                        Cảm Nhận Về CFD

                    </h2>
                </div>
                <div class="testimonial">
                    <div class="testimonial-item">
                        <div class="text">
                            <?php 
                            $reviewContent = $review->slider_showContent();
                            ?>
                            <?php
                            if($review) {
                                $i = 0;
                                while($resultContent = $reviewContent->fetch_assoc())
                                {
                                $i++;
                            ?>
                            <div class="content ct-<?php echo $i ?>
                             <?php if($i == 1)
                             {
                                 echo 'active';
                             } ?>">
                                <div class="info">
                                    <h4 class="name">
                                        <?php echo $resultContent['testimonial_sliderName'] ?>
                                    </h4>
                                    <p class="class"><?php echo $resultContent['testimonial_sliderPosition'] ?></p>
                                </div>
                                <div class="desc">
                                    <p>
                                        <?php echo $resultContent['testimonial_sliderDesc']?>
                                    </p>
                                </div>
                            </div>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                        <div class="images">
                            <?php 
                            $Image = $review->slider_showImage();
                            if($Image) {
                                while($result_Slider = $Image->fetch_assoc())
                                {
                            ?>
                            <img src="uploads/<?php echo $result_Slider['testimonial_sliderImage'] ?>" alt="">
                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonial section -->
    <!-- start faq section  -->
    <section class="faq-section">
        <div class="container">
            <div class="text-box">
                <h2 class="main-title">
                    Câu Hỏi Thường Gặp
                    <br>
                </h2>
            </div>
            <div class="row accordion">
                <div class="accordion-wrap col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12" id="acc-info">
                    <h2 class="accordion-main">THÔNG TIN CHUNG</h2>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>CFD là gì?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                CFD được sáng lập bởi Trần Nghĩa cùng các thành viên có từ 6-10 năm kinh nghiệm
                                trong lĩnh vực Web/App Dev và UX/UI Design hiện đang làm việc tại DNA Digital.
                                <br>
                                <br>
                                CFD cung cấp các khóa học thực chiến lập trình website, UX/UI Design giúp học
                                viên có đủ những kỹ năng thực tế cần thiết để đi làm sau khóa học. Ngoài các
                                khóa học, CFD còn kết nối cộng đồng các thành viên để học hỏi, chia sẻ, giúp đỡ
                                lẫn nhau trong suốt quá trình học và tương lai.
                                <br>
                                <br>
                                Sứ mệnh của CFD là để tạo ra những sản phẩm chất lượng, tinh tế, sáng tạo và có
                                giá trị.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>Học tại CFD xong có đi làm hay thực tập được không?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Khóa học thực chiến tại CFD giúp học viên trải nghiệm dự án, quy trình làm việc
                                và kỹ năng thực tế cần có để không chỉ xin thực tập và còn có thể ứng tuyển các
                                vị trị chính thức cao hơn như Fresher, Junior ở các công ty.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>CFD có cam kết đầu ra và cấp chứng chỉ không?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Hiện tại, CFD không cam kết đầu ra và chứng chỉ, điều CFD làm là cố gắng hết sức
                                để truyền đạt và giúp cho tất cả học viên có thể làm được việc và các kỹ năng
                                thực tế cần có sau khóa học và ứng tuyển ít nhất là vị trí Fresher cho các công
                                ty.
                                <br><br>
                                Ngoài sự cố gắng của giảng viên, các thành viên cũng phải có sức chiến đấu cao,
                                ý thức tự học và hoàn thành các yêu cầu đặt ra nhằm hoàn thành khóa học thật
                                tốt.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>Học tại CFD sao cho hiệu quả nhất?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Học viên cần chuẩn bị đủ thời gian để học Offline hoặc Online, cũng như thời
                                gian để hoàn thành bài tập, tự học tại nhà.<br><br> Tự tin vào bản thân, kiên
                                trì, cố gắng và sức chiến đấu cao không lùi bước, chủ động hỏi những vấn đề chưa
                                rõ để được giải đáp và hỗ trợ. <br><br> Hạn chế tối đa việc nghỉ học, nếu có
                                nghỉ thì phải xin và xem lại video được ghi lại trong lúc học để hoàn thành bài
                                tập và kiến thức ngày hôm đó.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>Sau mỗi buổi học có quay video để xem lại không?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                CFD sẽ quay lại video buổi học để các bạn không tham gia được có thể xem lại
                                bằng cách đăng nhập vào website CFD, chọn mục Khóa Học Của Tôi, chọn khóa đang
                                học và xem lại video.<br><br>Bản quyền video thuộc về CFD, nên nếu học viên tìm
                                cách tải video về và chia sẻ thì sẽ bị khóa tài khoản vĩnh viễn.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-wrap col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12" id="acc-register">
                    <h2 class="accordion-main">ĐĂNG KÝ VÀ THANH TOÁN</h2>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>Đăng ký khóa học tại CFD như thế nào?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Bạn chọn khóa học bất kỳ tại CFD, điền đầy đủ thông tin và bấm đăng ký, nhân
                                viên CFD sẽ chủ động liên lạc xác nhận qua số điện thoại, sau đó, Trần Nghĩa sẽ
                                trò chuyện trực tiếp để định hướng, giải đáp thắc mắc và thêm bạn vào nhóm
                                facebook CFD khóa học đó.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-title">
                            <h2>Học theo nhóm có được giảm giá không?</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Khi bạn học từ nhóm hai người trở lên thì sẽ được giảm giá 5% cho tất cả các
                                thành viên nhóm trong khóa học đó.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- end faq section  -->
    <!-- start gallery section -->
    <section class="gallery-section">
        <div class="text-box">
            <h2 class="main-title">
                Chúng Ta Là Một Team
            </h2>
        </div>
        <div class="gallery-carousel">
            <div class="list">
                <?php 
                    $show_slider = $slider->get_slider();
                    if(isset($show_slider))
                    {
                        while($result = $show_slider->fetch_assoc()){
                ?>
                <img src="uploads/<?php echo $result['sliderImage'] ?>" alt="">
                <?php 
                
                        }
                        }?>
            </div>
            <div class="controls">
                <span>Trượt qua</span>
                <div class="timeline">
                    <div class="process" style=""></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery section -->
    <!-- start action  -->
    <section class="action-section">
        <div class="container">
            <h3>
                Bạn đã sẵn sàng trở thành chiến binh tiếp theo của Team CFD chưa?
            </h3>
            <a href="contact.php" class="btn btn-white primary-text">
                Đăng ký nhận tin
            </a>
        </div>
    </section>
    <!-- end action  -->
</main>
<?php 
    include './inc/footer.php';
?>