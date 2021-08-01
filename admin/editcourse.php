<?php 
    $title = "Sửa khóa học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
?>
<?php 
    $courses = new courses();
    if(!isset($_GET['coursesId']) || $_GET['coursesId'] == NULL) {
        echo "<script>window.location = 'listcourse.php'</script>";
    } else {
        $Id = $_GET['coursesId'];
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        // $courseName = $_POST['name'];
        $update_courses = $courses->update_course($courseName,$courseDesc,$Id);
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
                    <?php 
                            $get_courses_name = $courses->getCourseById($Id);
                            if($get_courses_name){
                                while($result = $get_courses_name->fetch_assoc())
                                {
                        ?>
                    <form action="" method="POST" class="box-body " enctype="multipart/form-data">
                        <?php 
                            if(isset($update_courses))
                            {
                                echo $update_courses;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên khóa học</label>
                            <input type="text" name="courseName" value="<?php echo $result['coursesName'] ?>"
                                placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu khóa học</label>
                            <input type="text" name="courseDesc" value="<?php echo $result['coursesDesc'] ?>"
                                placeholder="Nhập thông tin giới thiệu khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh khóa học</label>
                            <img src="../uploads/<?php echo $result['coursesImage']?>" alt="">
                            <input type="file" name="courseImage">
                        </div>
                        <!-- <div class="form-group">
                                    <label for="">Hình ảnh khóa học</label>
                                    <input type="file" name="image">
                                </div> -->
                        <div class="form-group">
                            <input type="submit" name="update" value="Sửa">
                        </div>
                    </form>
                    <?php 
                             }
                        }
                    ?>
                </div>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>

<?php 
    include './inc/footer.php';
?>