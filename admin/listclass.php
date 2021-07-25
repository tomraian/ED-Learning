<?php 
    $title = "Danh sách lớp học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
    include '../classes/class.php';
    include_once '../helpers/format.php';
?>
<?php 
    $class = new classOfCourse();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_class = $class->del_class($Id);
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
                            if(isset($del_class))
                            {
                                echo $del_class;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr class="box-item-header">
                                    <th>STT</th>
                                    <th>Tên lớp học</th>
                                    <th>Tên khóa học</th>
                                    <th>Mô tả lớp học</th>
                                    <th>Giá tiền</th>
                                    <th>Giáo viên</th>
                                    <th>Giáo viên hỗ trợ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_class = $class->show_class();
                                    if(isset($show_class))
                                    {
                                        $i = 0;
                                        while($result = $show_class->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="editclass.php?classId=<?php echo $result['classId']?>">
                                            <?php echo $result['className']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $result['coursesName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->textShorten($result['classDesc'], 100); ?>
                                    </td>
                                    <td>
                                        <?php  echo number_format($result['classPrice'], 0, '', ',').' VNĐ'; ?>
                                    </td>
                                    <td>
                                        <div class="teacher-box">
                                            <img src="../uploads/<?php echo $result['classTeacherAvatar']?>" alt="">
                                            <span><?php echo $result['classTeacher']?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="teacher-box">
                                            <img src="../uploads/<?php echo $result['classMentorAvatar']?>" alt="">
                                            <span><?php echo $result['classMentor']?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-box">
                                            <a href="editclass.php?classId=<?php echo $result['classId']?>"
                                                class="action-box__edit">Sửa</a>
                                            <a href="listclass.php?delid=<?php echo $result['classId']?>"
                                                class="action-box__remove">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <!-- <div class="box-header">
                            <p>STT</p>
                            <p>Tên khóa học</p>
                            <p>Tóm tắt khóa học</p>
                            <p>Hình ảnh khóa học</p>
                            <p>Trạng thái</p>
                            <p>Công cụ</p>
                        </div>
                        <div class="box-content">
                            <div>1</div>
                            <div>Tên khóa học</div>
                            <div>Tóm tắt khóa học</div>
                            <div>Hình ảnh khóa học</div>
                            <div>Trạng thái</div>
                            <div class="action-box">
                                <a href="" class="action-box__edit">Sửa</a>
                                <a href="" class="action-box__remove">Xóa</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>

<?php 
    include './inc/footer.php';
?>