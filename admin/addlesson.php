<?php 
    $title = "Thêm nội dung lớp học";
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
        // for($i = 0; $i< 10 ; $i++){
        // $lessonName.$i = $_POST['lessonName'].$i;
        // $lessonDesc.$i = $_POST['lessonDesc'].$i;
        // }
        // $classId = $_POST['classId'];
        // $insert_lesson = $lesson->insert_lesson($lessonName.$i,$lessonDesc.$i,$classId);
   }
//    foreach($lessonName  as $key => $value){
//           $query = "SELECT lessonId FROM tbl_lesson WHERE lessonDesc = '" . $mysqli->real_escape_string($lessonDesc[$key]) . "' LIMIT 1"; 
//           $result = $mysqli->query($query);
//           if($result->num_rows == 0){
//               $query = "INSERT INTO tbl_lesson(lessonName,lessonDesc) VALUES ('"
//               . $mysqli->real_escape_string($value) . 
//               "','"
//               . $mysqli->real_escape_string($lessonDesc[$key])."')";
//               $insert = $mysqli->query($query);
//           } 
//     }
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
                    </div>
                    <a href="#" class="add_field">
                        <i class='bx bx-plus'></i>
                        <span>Thêm nội dung lớp học</span>
                        <i class='bx bx-plus'></i>
                    </a>
                    <div class="box-wrap">
                        <div class="box">
                            <div class="form-group">
                                <label for="">Tiêu đề buổi học</label>
                                <input type="text" name="lessonName" placeholder="Nhập tên khóa học">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết buổi học</label>
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