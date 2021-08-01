<?php 
    $title = "Danh sách người đăng ký";
    include './inc/sidebar.php';
    include '../classes/register.php';
    include_once '../helpers/format.php';
?>
<?php 
    $register= new register();
    $fm = new Format();
    if(isset($_GET['delid']))
    {
        $Id = $_GET['delid'];
        $del_register= $register->del_register($Id);
    }
    if(isset($_GET['checkid']))
    {
        $Id = $_GET['checkid'];
        $check_register = $register->check_register($Id);
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
                        <table>
                            <thead>
                                <tr class="box-item-header box-item">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Tên lớp học</th>
                                    <th>Giá tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $show_register= $register->show_register();
                                    if(isset($show_register))
                                    {
                                        $i = 0;
                                        while($result = $show_register->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr class="box-item <?php if($result['registerStatus'] == 1) echo 'checked';?>">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <a href="registerdetails.php?Id=<?php echo $result['registerId'] ?>">
                                            <?php echo $result['registerName']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $result['registerPhone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['registerEmail']; ?>
                                    </td>
                                    <td>
                                        <?php
                                         if($result['registerPayment'] == 0)
                                        {
                                            echo 'Chuyển Khoản';
                                        } 
                                        else{
                                            echo 'Tiền Mặt';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->textShorten($result['className'],50); ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->formatMoney($result['classPrice']); ?>
                                    </td>
                                    <td>
                                        <div class=" action-box">
                                            <?php if($result['registerStatus'] == 0)
                                            {
                                                $Id = $result['registerId'];
                                                echo "<a href='listregister.php?checkid=$Id'class='action-box__edit'>Duyệt</a>";
                                            }
                                            ?>
                                            <!-- <a href="listregister.php?checkid=<?php echo $result['registerId'] ?>"
                                                class="action-box__edit">Duyệt</a> -->
                                            <a href="registerdetails.php?Id=<?php echo $result['registerId'] ?>"
                                                class="action-box__details">Chi tiết</a>
                                            <a href="listregister.php?delid=<?php echo $result['registerId'] ?>"
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