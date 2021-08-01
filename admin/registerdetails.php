<?php 
    $title = "Chi tiết người đăng ký";
    include './inc/sidebar.php';
    include '../classes/register.php';
?>
<?php 
    $register = new register();
    if(!isset($_GET['Id']) || $_GET['Id'] == NULL) {
        // echo "<script>window.location = 'listregister.php'</script>";
        echo '1';
    } else {
        $Id = $_GET['Id'];
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
                            if(isset($del_register))
                            {
                                echo $del_register;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <?php 
                            $show_details = $register->show_details($Id);
                            if(isset($show_details))
                            {
                                while($result = $show_details->fetch_assoc()){
                                ?>
                        <div class="box-item">
                            <p>Tên liên hệ</p>
                            <p><?php echo $result['registerName']?></p>
                        </div>
                        <div class="box-item">
                            <p>Số điện thoại liên hệ</p>
                            <a
                                href="tel:+<?php echo $result['registerPhone']; ?>"><?php echo $result['registerPhone']; ?></a>
                        </div>
                        <div class="box-item">
                            <p>Email liên hệ</p>
                            <a
                                href="mailto:<?php echo $result['registerEmail']?>"><?php echo $result['registerEmail']?></a>
                        </div>
                        <div class="box-item">
                            <p>Hình thức thanh toán</p>
                            <p> <?php
                                if($result['registerPayment'] == 0)
                            {
                                echo 'Chuyển Khoản';
                            } 
                            else{
                                echo 'Tiền Mặt';
                            }
                            ?></p>
                        </div>
                        <div class="box-item">
                            <p>Ý kiến cá nhân (Định hướng và mong muốn)</p>
                            <p><?php echo $result['registerDesire']?></p>
                        </div>
                        <div class="box-item">
                            <p>Tên khóa học đăng ký</p>
                            <p><?php echo $result['className']?></p>
                        </div>
                        <div class="box-item">
                            <p>Giá tiền khóa học</p>
                            <p><?php echo $result['classPrice']?></p>
                        </div>
                        <?php
                                }
                            }
                            ?>
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