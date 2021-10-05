<?php 
    $title = "Sửa thông tin tài khoản";
    include './inc/sidebar.php';
    include '../classes/admin.php';
?>
<?php 
     $admin = new admin();
     $Id = Session::get('adminId');
     if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['info'])) {
        $adminName = $_POST['adminName'];
        $update_adminInfo = $admin->update_adminInfo($adminName,$Id);
    }
    
     if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['pass'])) {
        $adminPass = $_POST['adminPass'];
        $adminPassAgain = $_POST['adminPassAgain'];
        $update_adminPass = $admin->update_adminPass($adminPass,$adminPassAgain,$Id);
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
                <?php 
                    if(isset($update_adminInfo))
                    {
                        echo $update_adminInfo;
                    }
                ?>
                <form action="editaccount.php?info" method="POST" class="box-body">
                    <div class="box">
                        <?php 
                            $get_admin = $admin->show_admin($Id);
                            if($get_admin){
                                while($result = $get_admin->fetch_assoc())
                                {
                        ?>
                        <div class="form-group">
                            <label for="">Tên người quản trị</label>
                            <input type="text" name="adminName" placeholder="Nhập tên người quản trị"
                                value="<?php echo $result['adminName']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" readonly name="adminEmail" placeholder="Nhập email người quản trị"
                                value="<?php echo $result['adminEmail']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tên người dùng</label>
                            <input type="text" readonly name="adminUser" value="<?php echo $result['adminUser']?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="updateInfo" value="Sửa thông tin cá nhân">
                        </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </form>
                <?php 
                    if(isset($update_adminPass))
                    {
                        echo $update_adminPass;
                    }
                ?>
                <form action="editaccount.php?pass" method="POST" class="box-body" name="pass">
                    <div class="box">
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="adminPass" placeholder="Nhập mật khẩu người quản trị"
                                class="password">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu</label>
                            <input type="password" name="adminPassAgain" class="password"
                                placeholder="Nhập mật khẩu người quản trị">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="updatePass" value="Đổi mật khẩu">
                        </div>
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