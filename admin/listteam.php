<?php 
    $title = "Danh sách thành viên ED team";
    include './inc/sidebar.php';
    include '../classes/team.php';
    include_once '../helpers/format.php';
?>
<?php 
    $team = new team();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_team = $team->del_team($Id);
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
                            if(isset($del_team))
                            {
                                echo $del_team;
                            }
                        ?>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr class="box-item">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Chức vụ</th>
                                    <th>Hình ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_team = $team->show_team();
                                    if(isset($show_team))
                                    {
                                        $i = 0;
                                        while($result = $show_team->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="editteam.php?Id=<?php echo $result['teamId']?>">
                                            <?php echo $result['teamName']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $result['teamDesc'] ?>
                                    </td>
                                    <td class="box-image">
                                        <img src="../uploads/<?php echo $result['teamImage']; ?>" alt="">
                                    </td>

                                    <td>
                                        <div class="action-box">
                                            <a href="editteam.php?Id=<?php echo $result['teamId']?>"
                                                class="action-box__edit">Sửa</a>
                                            <a href="listteam.php?delid=<?php echo $result['teamId']?>"
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