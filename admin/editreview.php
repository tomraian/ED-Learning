<?php 
    $title = "Danh sách người cảm nhận";
    include './inc/sidebar.php';
    include '../classes/review.php';
    include_once '../helpers/format.php';
?>
<?php 
     $review = new review();
    if(!isset($_GET['Id']) || $_GET['Id'] == NULL) {
        echo "<script>window.location = 'listreview.php'</script>";
    } else {
        $Id = $_GET['Id'];
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $testimonial_sliderName = $_POST['testimonial_sliderName'];
        $testimonial_sliderPosition = $_POST['testimonial_sliderPosition'];
        $testimonial_sliderDesc = $_POST['testimonial_sliderDesc'];
        $update_review = $review->update_review($testimonial_sliderName,$testimonial_sliderPosition,$testimonial_sliderDesc,$Id);
   }
?>

<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            <?php 
            echo $title;
            ?>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                    <?php 
                        $get_review = $review->getReviewById($Id);
                        if($get_review){
                            while($result = $get_review->fetch_assoc())
                            {
                            ?>
                    <form action="" method="POST" class="box-body " enctype="multipart/form-data">
                        <?php 
                            if(isset($update_review))
                            {
                                echo $update_review;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên người đánh giá</label>
                            <input type="text" name="testimonial_sliderName" placeholder="Nhập tên khóa học"
                                value="<?php echo $result['testimonial_sliderName'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ người đánh giá</label>
                            <input type="text" name="testimonial_sliderPosition"
                                value="<?php echo $result['testimonial_sliderPosition'] ?>"
                                placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Thông tin đánh giá</label>
                            <input type="text" name="testimonial_sliderDesc"
                                value="<?php echo $result['testimonial_sliderDesc'] ?>"
                                placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh người đánh giá</label>
                            <img src="../uploads/<?php echo $result['testimonial_sliderImage'] ?>" alt="">
                            <input type="file" name="testimonial_sliderImage">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Sửa">
                        </div>
                    </form>
                    <?php 
                            }
                        }
                    ?>
                </div>
                </form>
            </div>
            <!-- END ORDERS TABLE -->
        </div>
    </div>
</div>

<?php 
    include './inc/footer.php';
?>