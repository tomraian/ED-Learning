<?php 
    $title = "Danh sách lớp học";
    include './inc/sidebar.php';
    include '../classes/contact.php';
?>
<?php 
    $contact = new contact();
    if(!isset($_GET['Id']) || $_GET['Id'] == NULL) {
        // echo "<script>window.location = 'listcontact.php'</script>";
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
                            if(isset($del_contact))
                            {
                                echo $del_contact;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <?php 
                            $show_details = $contact->show_details($Id);
                            if(isset($show_details))
                            {
                                while($result = $show_details->fetch_assoc()){
                                ?>
                        <div class="box-item">
                            <p>Tên liên hệ</p>
                            <p><?php echo $result['contactName']?></p>
                        </div>
                        <div class="box-item">
                            <p>Số điện thoại liên hệ</p>
                            <p><?php echo $result['contactPhone']?></p>
                        </div>
                        <div class="box-item">
                            <p>Email liên hệ</p>
                            <p><?php echo $result['contactEmail']?></p>
                        </div>
                        <div class="box-item">
                            <p>Tiêu đề liên hệ</p>
                            <p><?php echo $result['contactTitle']?></p>
                        </div>
                        <div class="box-item">
                            <p>Nội dung liên hệ</p>
                            <p><?php echo $result['contactContent']?></p>
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