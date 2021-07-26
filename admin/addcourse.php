<?php 
    $title = "Thêm khóa học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
?>

<?php 
    $courses = new courses();
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        // $courseName = $_POST['name'];
        $insert_courses = $courses->insert_course($courseName,$courseDesc);
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
                    <form action="addcourse.php" method="POST" class="box-body" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?php echo $token; ?>" />
                        <?php 
                            if(isset($insert_courses))
                            {
                                echo $insert_courses;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên khóa học</label>
                            <input type="text" name="courseName" placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu khóa học</label>
                            <input type="text" name="courseDesc" placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh khóa học</label>
                            <input type="file" name="courseImage">
                        </div>
                        <div class="form-group">
                            <label for="check">
                                <span>Duyệt</span>
                                <input type="checkbox" name="check" id="check" value="1">
                            </label>

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