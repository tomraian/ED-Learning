<?php 
    $title = 'Trang chủ';
    include './inc/sidebar.php';
    include '../classes/contact.php';
    include '../classes/register.php';
?>
<?php 
    $contact = new contact();
    $register = new register();
    $fm = new Format();
//     if(isset($_GET['delid']))
//     {
//         $Id = $_GET['delid'];
//         $del_courses = $courses->del_course($Id);
//    }
?>
<!-- MAIN CONTENT -->
<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            Trang chủ
        </div>
    </div>
    <div class="main-content">
        <div class="box">
            <center>
                <h2>Xin chào <?php 
                    echo Session::get('adminName');
                    ?>
                </h2>
                <h3>Bạn khỏe chứ ? Bắt đầu làm việc thôi nào</h3>
                <br>
                <img src="images/giphy.webp" alt="" width="60%">
            </center>
        </div>
    </div>
</div>
</div>
<!-- END MAIN CONTENT -->

<?php 
    include './inc/footer.php';
?>