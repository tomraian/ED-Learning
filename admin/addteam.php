<?php 
    $title = "Thêm thành viên ED";
    include './inc/sidebar.php';
    include '../classes/team.php';
?>

<?php 
    $team = new team();
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $teamName = $_POST['teamName'];
        $teamDesc = $_POST['teamDesc'];
        $insert_team = $team->insert_team($teamName,$teamDesc);
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
                    <form action="addteam.php" method="POST" class="box-body" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?php echo $token; ?>" />
                        <?php 
                            if(isset($insert_team))
                            {
                                echo $insert_team;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên thành viên ED</label>
                            <input type="text" name="teamName" placeholder="Nhập tên thành viên ">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ thành viên ED</label>
                            <input type="text" name="teamDesc" placeholder="Nhập chức vụ của thành viên">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh thành viên ED</label>
                            <input type="file" name="teamImage">
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