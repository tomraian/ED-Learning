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
                <?php 
                        if(isset($insert_class))
                        {
                            echo $insert_class;
                        }
                    ?>
                <form action="addclass.php" method="POST" class="box-body" enctype="multipart/form-data">
                    <div class="box">
                        <div class="form-group">
                            <label for="">Tên lớp học</label>
                            <input type="text" name="className" placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu lớp học</label>
                            <textarea name="classDesc" id="" cols="30" rows="10" spellcheck="false"
                                placeholder="Nhập thông tin giới thiệu lớp học"></textarea>
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
                                <option value="<?php echo $result['coursesId'] ?>"><?php echo $result['coursesName'] ?>
                                </option>
                                <?php 
                                    }   
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">-----Chọn thời gian khai giảng lớp học-----</label>
                            <input type="date" name="classTime" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập số buổi học</label>
                            <input type="number" name="classLesson" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập thời gian học</label>
                            <input type="text" name="classLearnTime" id=""
                                placeholder="Nhập thứ trong tuần và thời gian học">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập địa điểm học</label>
                            <input type="text" name=" classAddress" id="" placeholder="Quận 1, TP Hồ Chí Minh">
                        </div>
                        <div class="form-group">
                            <label for="">Giá tiền</label>
                            <input type="number" min="0" name="classPrice" placeholder="Nhập giá tiền cho lớp học">
                        </div>
                    </div>
                    <div class="box">
                        <div class="form-group">
                            <label for="">Tên giáo viên</label>
                            <input type="text" name="classTeacher" placeholder="Nhập tên giáo viên giảng dạy">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh giáo viên</label>
                            <input type="file" name="classTeacherAvatar" accept=".jpg, .jpeg, .png .gif">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn về giáo viên</label>
                            <input type="text" name="classTeacherDesc">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu về giáo viên</label>
                            <textarea name="classTeacherIntro" id="" cols="30" rows="10"></textarea>
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
                            <label for="">Mô tả ngắn về giáo viên hỗ trợ</label>
                            <input type="text" name="classMentorDesc">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu về giáo viên hỗ trợ</label>
                            <textarea name="classMentorIntro" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add" value="Thêm">
                        </div>
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