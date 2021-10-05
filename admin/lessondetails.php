<?php

use function PHPSTORM_META\type;

error_reporting( error_reporting() & ~E_NOTICE );

?>

<?php 
    $title = "Danh sách nội dung lớp học";
    include './inc/sidebar.php';
    include '../classes/courses.php';
    include '../classes/lesson.php';
    include_once '../helpers/format.php';
?>
<?php 
    $lesson = new lesson();
    $fm = new Format();
   
   
  if(!isset($_GET['classId']) || $_GET['classId'] == NULL ) {
    echo "<script>window.location = 'listlesson.php'</script>";
} else {
    $Id = $_GET['classId'];
    $lesson_details = $lesson->lesson_details($Id);
}
if(isset($_GET['dellessonId']))
{
    // $Id = $result['dellessonId'];
    $IdLesson = $_GET['dellessonId'];
    $del_lesson = $lesson->del_lesson($IdLesson);
}
if(isset($_GET['editlessonId']))
{
    $IdLesson = $_GET['editlessonId'];
}
                  
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lessonName = $_POST['lessonName'];
    $lessonDesc = $_POST['lessonDesc'];
    $edit_lesson = $lesson->edit_lesson($lessonName,$lessonDesc,$IdLesson);
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
                    if(isset($del_lesson))
                    {
                        echo $del_lesson;
                    }
                    if(isset($edit_lesson))
                    {
                        echo $edit_lesson;
                    }
                ?>
                    <form action="" method="POST" id="form1">
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr class="box-item box-item-header">
                                        <th>STT</th>
                                        <th>Tên nội dung buổi học</th>
                                        <th>Chi tiết nội dung buổi học</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $getLessonById = $lesson->getLessonById($Id);
                                    $lesson_details = $lesson->lesson_details($Id);
                                    if(isset($lesson_details))
                                    {
                                        $i = 0;
                                        while($result = $lesson_details->fetch_assoc()){
                                            $i++;
                                            $classId = $result['classId'];
                                            $lessonId = $result['lessonId'];
                                    
                                    ?>
                                    <tr class="box-item">
                                        <td>
                                            <?php echo $i?>
                                        </td>
                                        <td>
                                            <textarea name="
                                            <?php 
                                             if(isset($_GET['editlessonId']) &&  $IdLesson == $result['lessonId'])
                                             {
                                                 echo 'lessonName';
                                             }
                                            else{
                                                echo "";
                                            }
                                            ?>" cols="40" class="textarea lessonName"
                                                rows="3"><?php echo $result['lessonName']?></textarea>
                                        </td>
                                        <td>
                                            <textarea name="
                                            <?php 
                                             if(isset($_GET['editlessonId']) &&  $IdLesson == $result['lessonId'])
                                             {
                                                 echo 'lessonDesc';
                                             }
                                            ?>" id="" cols="40" class="textarea lessonDesc"
                                                rows="3"><?php echo $result['lessonDesc']?></textarea>

                                        </td>
                                        <td>
                                            <div class="action-box">

                                                <?php
                                                    if(!isset($_GET['editlessonId']) ||  $IdLesson != $result['lessonId'])
                                                    {
                                                        
                                                       echo "<a href=\"lessondetails.php?classId=$classId&editlessonId=$lessonId\"
                                                class=\"action-box__edit\" name=\"update\">Lấy ID</a>";
                                                    }
                                                    else{
                                                        echo '<a href="javascript:;" class="action-box__edit" name="update"
                                                        onclick="submit();">Sửa</a>';
                                                }
                                                ?>

                                                <a href="lessondetails.php?classId=<?php echo $result['classId']?>&dellessonId=<?php echo $result['lessonId']?>"
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