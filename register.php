 <!-- start header -->
 <?php
    $title = 'Đăng ký khóa học';
    include './inc/header.php';
?>
 <?php
if(!isset($_GET['classId']) || $_GET['classId'] == NULL) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $Id = $_GET['classId'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $insert_register = $register->insert_register($_POST,$Id);
}
?>
 </header>
 <!-- end header  -->
 <main id="register">
     <section class="register-section">
         <div class="container">
             <div class="wrap">
                 <h3>ĐĂNG KÝ</h3>
                 <?php 
                    $registerClassById = $register->registerClassById($Id);
                    if($registerClassById){
                        while($resultRegister = $registerClassById->fetch_assoc()){
                 ?>
                 <h2 class="main-title"><?php echo $resultRegister['className']; ?></h2>
                 <div class="price">
                     <h3>Học phí:</h3>
                     <span><?php echo $fm->formatMoney($resultRegister['classPrice']); ?></span>
                 </div>
                 <?php 
                 }
                }
                ?>
                 <?php 
                        if(isset($insert_register))
                        {
                            echo $insert_register;
                        }
                    ?>
                 <form class="form" method="POST" action="">
                     <div class="form-group">
                         <label for="">
                             <p>Họ và tên</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <input type="text" name="registerName" id="register-name" class="input-validation" required
                                 placeholder=" Họ và tên bạn">
                             <p class="mes-error">Họ và tên là trường bắt buộc</p>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="">
                             <p>Số điện thoại</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <input type="text" name="registerPhone" class="input-validation" id="register-phone"
                                 placeholder=" Số điện thoại ">
                             <p class="mes-error">Số điện thoại là trường bắt buộc</p>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="">
                             <p>Email</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <input type="email" name="registerEmail" class="input-validation" id="register-email"
                                 placeholder=" Email của bạn">
                             <p class="mes-error">Email là trường bắt buộc</p>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="">
                             <p>Hình thức thanh toán</p>
                         </label>
                         <select name="registerPayment">
                             <option value="0" selected>Thanh toán chuyển khoản</option>
                             <option value="1">Thanh toán tiền mặt</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">
                             <p>Ý kiến cá nhân</p>
                         </label>
                         <div class="input">
                             <input type="text" name="registerDesire" placeholder=" Định hướng và mong muốn của">
                         </div>
                     </div>
                     <div class="form-group submit">
                         <input type="submit" value="Đăng ký" class="btn btn-submit" name="add">
                     </div>
                 </form>
             </div>
         </div>
     </section>
 </main>
 <!-- start footer -->
 <?php 
    include './inc/footer.php';
?>