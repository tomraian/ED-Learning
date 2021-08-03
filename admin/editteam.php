<?php 
    $title = "Sửa thông tin thành viên ED";
    include './inc/sidebar.php';
    include '../classes/team.php';
    include_once '../helpers/format.php';
?>
<?php 
     $team = new team();
    if(!isset($_GET['Id']) || $_GET['Id'] == NULL) {
        echo "<script>window.location = 'listteam.php'</script>";
    } else {
        $Id = $_GET['Id'];
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $teamName = $_POST['teamName'];
        $teamDesc = $_POST['teamDesc'];
        $update_team = $team->update_team($teamName,$teamDesc,$Id);
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
                        $get_team = $team->getTeamById($Id);
                        if($get_team){
                            while($result = $get_team->fetch_assoc())
                            {
                            ?>
                    <form action="" method="POST" class="box-body " enctype="multipart/form-data">
                        <?php 
                            if(isset($update_team))
                            {
                                echo $update_team;
                            }
                        ?>
                        <div class="form-group">
                            <label for="">Tên thành viên ED</label>
                            <input type="text" name="teamName" placeholder="Nhập tên thành viên"
                                value="<?php echo $result['teamName'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ thành viên ED</label>
                            <input type="text" name="teamDesc" value="<?php echo $result['teamDesc'] ?>"
                                placeholder="Nhập chức vụ thành viên">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh thành viên ED</label>
                            <img src="../uploads/<?php echo $result['teamImage'] ?>" alt="">
                            <input type="file" name="teamImage">
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