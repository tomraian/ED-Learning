<?php 
    $title = "Thêm nội dung buổi học";
    include './inc/sidebar.php';
    include '../classes/lesson.php';
?>
<?php 
    $lesson = new lesson();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add'])) {
        $lessonName = $_POST['lessonName'];
        $lessonDesc = $_POST['lessonDesc'];
        $classId = $_POST['classId'];
        $insert_lesson = $lesson->insert_lesson($lessonName,$lessonDesc,$classId);
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
                <?php 
                        if(isset($insert_lesson))
                        {
                            echo $insert_lesson;
                        }
                    ?>
                <form action="" method="POST" class="box-body" enctype="multipart/form-data">
                
                        <div class="box">
                        <div class="form-group">
                        <p style="text-align: center;"><label for="">----------Chọn lớp học----------</label></p>
                        <select name="classId" id="" class="class-select">
                            <?php 
                        $show_class = $lesson->show_class();
                         if($show_class){
                             while($result = $show_class->fetch_assoc()){
                        ?>
                            <option value="<?php echo $result['classId'] ?>"><?php echo $result['className'] ?></option>
                            <?php
                                }
                                }
                        ?>
                        </select>
                            <div class="form-group">
                                <label for="">Tiêu đề nội dung buổi học</label>
                                <input type="text" name="lessonName" placeholder="Nhập tên khóa học">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết nội dung buổi học</label>
                                <input type="text" name="lessonDesc" placeholder="Nhập thông tin giới thiệu khóa học">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="Thêm">
                    </div>
                </form>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>
<?php 
    include './inc/footer.php';
?>