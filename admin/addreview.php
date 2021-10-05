<?php 
    $title = "Thêm slider cảm nhận";
    include './inc/sidebar.php';
    include '../classes/review.php';
?>

<?php 
    $review = new review();
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $testimonial_sliderName = $_POST['testimonial_sliderName'];
        $testimonial_sliderPosition = $_POST['testimonial_sliderPosition'];
        $testimonial_sliderDesc = $_POST['testimonial_sliderDesc'];
        $insert_review = $review->insert_review($testimonial_sliderName,$testimonial_sliderPosition,$testimonial_sliderDesc);
   }
?>
<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            <?php echo $title ;?>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                    <form action="addreview.php" method="POST" class="box-body" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?php echo $token; ?>" />
                        <?php 
                            if(isset($insert_review))
                            {
                                echo $insert_review;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên người đánh giá</label>
                            <input type="text" name="testimonial_sliderName" placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ người đánh giá</label>
                            <input type="text" name="testimonial_sliderPosition"
                                placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Thông tin đánh giá</label>
                            <input type="text" name="testimonial_sliderDesc"
                                placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh người đánh giá</label>
                            <input type="file" name="testimonial_sliderImage">
                        </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="add" value="Thêm">
                </div>
                </form>
            </div>
            <!-- END ORDERS TABLE -->
        </div>
    </div>
</div>
</div>

<?php 
    include './inc/footer.php';
?>