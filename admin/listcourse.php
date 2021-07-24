<?php 
    $title = "Danh sách khóa học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
    include_once '../helpers/format.php';
?>
<?php 
    $courses = new courses();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_courses = $courses->del_course($Id);
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
                            if(isset($del_courses))
                            {
                                echo $del_courses;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr class="box-item">
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Mô tả khóa học</th>
                                    <th>Hình ảnh</th>
                                    <th>Tình trạng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_courses = $courses->show_courses();
                                    if(isset($show_courses))
                                    {
                                        $i = 0;
                                        while($result = $show_courses->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="editcourse.php?coursesId=<?php echo $result['coursesId']?>">
                                            <?php echo $result['coursesName']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $fm->textShorten($result['coursesDesc'], 50); ?>
                                    </td>
                                    <td>
                                        <?php echo $result['coursesImage']; ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($result['coursesStatus'] == 0)
                                            {
                                                echo ' <div class="payment-status payment-pending">
                                                <div class="dot"></div>
                                                <span>Chờ duyệt</span>
                                            </div>';
                                            }
                                            else{
                                                echo ' <div class="payment-status payment-paid">
                                                <div class="dot"></div>
                                                <span>Thành công</span>
                                            </div>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="action-box">
                                            <a href="editcourse.php?coursesId=<?php echo $result['coursesId']?>"
                                                class="action-box__edit">Sửa</a>
                                            <a href="listcourse.php?delid=<?php echo $result['coursesId']?>"
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