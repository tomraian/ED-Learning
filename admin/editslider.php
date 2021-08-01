<?php 
    $title = "Sửa slider";
    include './inc/sidebar.php';
    include '../classes/slider.php';
    include_once '../helpers/format.php';
?>
<?php 
     $slider = new slider();
    if(!isset($_GET['Id']) || $_GET['Id'] == NULL) {
        echo "<script>window.location = 'listslider.php'</script>";
    } else {
        $Id = $_GET['Id'];
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $update_slider = $slider->update_slider($Id);
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
                        $get_slider = $slider->getsliderById($Id);
                        if($get_slider){
                            while($result = $get_slider->fetch_assoc())
                            {
                            ?>
                    <form action="" method="POST" class="box-body " enctype="multipart/form-data">
                        <?php 
                            if(isset($update_slider))
                            {
                                echo $update_slider;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Hình ảnh người đánh giá</label>
                            <img src="../uploads/<?php echo $result['sliderImage'] ?>" alt="">
                            <input type="file" name="sliderImage">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Sửa">
                        </div>
                    </form>
                    <?php 
                            }
                        }
                    ?>
                </div>
                </form>
            </div>
            <!-- END ORDERS TABLE -->
        </div>
    </div>
</div>

<?php 
    include './inc/footer.php';
?>