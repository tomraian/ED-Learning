<?php 
    $title = "Sửa thông tin lớp học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
    include '../classes/class.php';
?>
<?php 
    $class = new classOfCourse();
    if(!isset($_GET['classId']) || $_GET['classId'] == NULL) {
        echo "<script>window.location = 'listclass.php'</script>";
    } else {
        $Id = $_GET['classId'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $update_class = $class->update_class($_POST,$_FILES,$Id);
   }
?>
<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            <?php echo $title ;
            ?>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <!-- ORDERS TABLE -->

                <div class="box">
                    <?php 
                     $getClassById = $class->getClassById($Id);
                         if($getClassById){
                             while($result_class = $getClassById->fetch_assoc()){
                    ?>
                    <form action="" method="POST" class="box-body" enctype="multipart/form-data">
                        <?php 
                            if(isset($update_class))
                            {
                                echo $update_class;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên lớp học</label>
                            <input type="text" name="className" placeholder="Nhập tên khóa học"
                                value="<?php echo $result_class['className'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu lớp học</label>
                            <input type="text" name="classDesc" placeholder="Nhập thông tin giới thiệu lớp học"
                                value="<?php echo $result_class['classDesc']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">-----Chọn khóa học-----</label>
                            <select name="classCourse" class="class-select">
                                <?php 
                                    $courses = new courses();
                                    $courseslist = $courses->show_courses();
                                    if($courseslist)
                                    {
                                        while($result = $courseslist->fetch_assoc())
                                        {
                                    ?>
                                <option <?php 
                                    if($result['coursesId'] == $result_class['coursesId'])
                                    {
                                        echo 'selected';
                                    }
                                ?> value="<?php echo $result['coursesId'] ?>"><?php echo $result['coursesName'] ?>
                                </option>
                                <?php 
                                        }  
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">-----Chọn thời gian khai giảng lớp học-----</label>
                            <input type="date" name="classTime" id="" value="<?php echo $result_class['classTime']?>">

                        </div>
                        <div class="form-group">
                            <label for="">Tên giáo viên</label>
                            <input type="text" name="classTeacher" placeholder="Nhập tên giáo viên giảng dạy"
                                value="<?php echo $result_class['classTeacher']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh giáo viên</label>
                            <img src="../uploads/<?php echo $result_class['classTeacherAvatar']?>" alt="" width="100px">
                            <input type="file" name="classTeacherAvatar" accept=".jpg, .jpeg, .png .gif">
                        </div>
                        <div class="form-group">
                            <label for="">Tên giáo viên hỗ trợ </label>
                            <input type="text" name="classMentor" placeholder="Nhập tên giáo viên hỗ trợ giảng dạy"
                                value="<?php echo $result_class['classMentor']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh giáo viên hỗ trợ</label>
                            <img src="../uploads/<?php echo $result_class['classMentorAvatar']?>" alt="" width="100px">
                            <input type="file" name="classMentorAvatar" accept=".jpg, .jpeg, .png .gif">
                        </div>
                        <div class="form-group">
                            <label for="">Giá tiền</label>
                            <input type="number" min="0" name="classPrice" placeholder="Nhập giá tiền cho lớp học"
                                value="<?php echo $result_class['classPrice']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tình trang lớp học</label>
                            <select name="classStatus" id="" class="class-select">
                                <?php 
                                if($result_class['classStatus'] == 0){
                                ?>
                                <option value="0" selected>Đang diễn ra</option>
                                <option value="1">Sắp khai giảng</option>
                                <option value="2">Đã kết thúc</option>
                                <?php  }
                                else if($result_class['classStatus'] == 1){
                                ?>
                                <option value="0">Đang diễn ra</option>
                                <option value="1" selected>Sắp khai giảng</option>
                                <option value="2">Đã kết thúc</option>
                                <?php
                                }
                                else if($result_class['classStatus'] == 2){
                                    ?>
                                <option value="0">Đang diễn ra</option>
                                <option value="1">Sắp khai giảng</option>
                                <option value="2" selected>Đã kết thúc</option>
                                <?php }?>
                            </select>
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