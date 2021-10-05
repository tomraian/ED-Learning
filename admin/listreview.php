<?php 
    $title = "Danh sách người cảm nhận";
    include './inc/sidebar.php';
    include '../classes/review.php';
    include_once '../helpers/format.php';
?>
<?php 
    $review = new review();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_review = $review->del_review($Id);
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
                            if(isset($del_review))
                            {
                                echo $del_review;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr class="box-item">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Chức vụ</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_review = $review->show_review();
                                    if(isset($show_review))
                                    {
                                        $i = 0;
                                        while($result = $show_review->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="editreview.php?Id=<?php echo $result['testimonial_sliderId']?>">
                                            <?php echo $result['testimonial_sliderName']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $result['testimonial_sliderPosition'] ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->textShorten($result['testimonial_sliderDesc'], 50); ?>
                                    </td>
                                    <td class="box-image">
                                        <img src="../uploads/<?php echo $result['testimonial_sliderImage']; ?>" alt="">
                                    </td>

                                    <td>
                                        <div class="action-box">
                                            <a href="editreview.php?Id=<?php echo $result['testimonial_sliderId']?>"
                                                class="action-box__edit">Sửa</a>
                                            <a href="listreview.php?delid=<?php echo $result['testimonial_sliderId']?>"
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
                </div>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>

<?php 
    include './inc/footer.php';
?>