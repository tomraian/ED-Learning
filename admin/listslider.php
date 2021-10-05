<?php 
    $title = "Danh sách slider";
    include './inc/sidebar.php';
    include '../classes/slider.php';
    include_once '../helpers/format.php';
?>
<?php 
    $slider = new slider();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_slider = $slider->del_slider($Id);
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
                            if(isset($del_slider))
                            {
                                echo $del_slider;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr class="box-item">
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_slider = $slider->show_slider();
                                    if(isset($show_slider))
                                    {
                                        $i = 0;
                                        while($result = $show_slider->fetch_assoc()){
                                            $i++;
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td class="box-image">
                                        <img src="../uploads/<?php echo $result['sliderImage']; ?>" alt="">
                                    </td>

                                    <td>
                                        <div class="action-box">
                                            <a href="editslider.php?Id=<?php echo $result['sliderId']?>"
                                                class="action-box__edit">Sửa</a>
                                            <a href="listslider.php?delid=<?php echo $result['sliderId']?>"
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