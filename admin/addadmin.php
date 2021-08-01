<?php 
    $title = "Thêm người quản trị";
    include './inc/sidebar.php';
    include '../classes/admin.php';
?>
<?php 
     $admin = new admin();
     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
          $insert_admin = $admin->insert_admin($_POST);
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
                    <form action="addadmin.php" method="POST" class="box-body">
                        <?php 
                            if(isset($insert_admin))
                            {
                                echo $insert_admin;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên người quản trị</label>
                            <input type="text" name="adminName" placeholder="Nhập tên người quản trị">
                        </div>
                        <div class="form-group">
                            <label for="">Email (Email sẽ không được thay đổi)</label>
                            <input type="email" name="adminEmail" placeholder="Nhập email người quản trị">
                        </div>
                        <div class="form-group">
                            <label for="">Tên người dùng (Tên người dùng sẽ không được thay đổi)</label>
                            <input type="text" name="adminUser">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="adminPass" placeholder="Nhập mật khẩu người quản trị">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu</label>
                            <input type="password" name="adminPassAgain" placeholder="Nhập mật khẩu người quản trị">
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
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>