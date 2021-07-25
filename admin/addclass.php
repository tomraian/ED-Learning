<?php 
    $title = "Thêm lớp học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
    include '../classes/class.php';
?>
<?php 
    $class = new classOfCourse();
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        $insert_class = $class->insert_class($_POST,$_FILES);
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
                    <form action="addclass.php" method="POST" class="box-body" enctype="multipart/form-data">
                        <?php 
                            if(isset($insert_class))
                            {
                                echo $insert_class;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên lớp học</label>
                            <input type="text" name="className" placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu lớp học</label>
                            <input type="text" name="classDesc" placeholder="Nhập thông tin giới thiệu lớp học">
                        </div>
                        <div class="form-group">
                            <label for="">-----Chọn khóa học-----</label>
                            <select name="classCourse" id="class-select">
                                <?php 
                                    $courses = new courses();
                                    $courseslist = $courses->show_courses();
                                    if($courseslist)
                                    {
                                        while($result = $courseslist->fetch_assoc())
                                        {
                                    ?>
                                <option value="<?php echo $result['coursesId'] ?>"><?php echo $result['coursesName'] ?>
                                </option>
                                <?php 
                                    }   
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên giáo viên</label>
                            <input type="text" name="classTeacher" placeholder="Nhập tên giáo viên giảng dạy">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh giáo viên</label>
                            <input type="file" name="classTeacherAvatar" accept=".jpg, .jpeg, .png .gif">
                        </div>
                        <div class="form-group">
                            <label for="">Tên giáo viên hỗ trợ </label>
                            <input type="text" name="classMentor" placeholder="Nhập tên giáo viên hỗ trợ giảng dạy">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh giáo viên hỗ trợ</label>
                            <input type="file" name="classMentorAvatar" accept=".jpg, .jpeg, .png .gif">
                        </div>
                        <div class="form-group">
                            <label for="">Giá tiền</label>
                            <input type="number" min="0" name="classPrice" placeholder="Nhập giá tiền cho lớp học">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Hình ảnh khóa học</label>
                            <input type="file" name="image">
                        </div> -->
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