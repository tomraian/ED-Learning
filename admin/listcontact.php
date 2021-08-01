<?php 
    $title = "Danh sách lớp học";
    include './inc/sidebar.php';
    include '../classes/contact.php';
    include_once '../helpers/format.php';
?>
<?php 
    $contact = new contact();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_contact = $contact->del_contact($Id);
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
                        <table>
                            <thead>
                                <tr class="box-item-header">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_contact = $contact->show_contact();
                                    if(isset($show_contact))
                                    {
                                        $i = 0;
                                        while($result = $show_contact->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="contactdetails.php?Id=<?php echo $result['contactId'] ?>">
                                            <?php echo $result['contactName']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $result['contactPhone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['contactEmail']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['contactTitle']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->textShorten($result['contactContent'],100); ?>
                                    </td>
                                    <td>
                                        <div class=" action-box">
                                            <a href="contactdetails.php?Id=<?php echo $result['contactId'] ?>"
                                                class="action-box__details">Chi tiết</a>
                                            <a href="listcontact.php?delid=<?php echo $result['contactId'] ?>"
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