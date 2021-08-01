<?php 
    $title = "Thêm slider team";
    include './inc/sidebar.php';
    include '../classes/slider.php';
?>

<?php 
    $slider = new slider();
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $insert_slider = $slider->insert_slider();
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
                    <form action="addslider.php" method="POST" class="box-body" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?php echo $token; ?>" />
                        <?php 
                            if(isset($insert_slider))
                            {
                                echo $insert_slider;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Hình ảnh slider</label>
                            <input type="file" name="sliderImage">
                        </div>
                </div>
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