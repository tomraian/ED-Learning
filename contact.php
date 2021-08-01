 <!-- start header -->
 <?php
 $title = 'Liên hệ';
    include './inc/header.php';
?>
 </header>
 <?php 
 $contact = new contact();
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        $insert_contact = $contact->insert_contact($_POST);
   }
 ?>
 <!-- end header  -->
 <main id="contact">
     <section class="contact-section">
         <div class="container">
             <div class="wrap">
                 <h2 class="main-title">Liên Hệ Với CFD</h2>
                 <div class="desc">
                     <p>Đừng ngần ngại liên hệ với <b>CFD</b> để cùng nhau tạo ra những sản phẩm giá trị, cũng
                         như việc hợp tác
                         với các đối tác tuyển dụng, công ty trong và ngoài nước.</p>
                 </div>
                 <form class="form" id="form-contact" action="" method="POST">
                     <?php 
                        if(isset($insert_contact))
                        {
                            echo $insert_contact;
                        }
                    ?>
                     <div class="form-group">
                         <label for="">
                             <p>Họ và tên</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <input type="text" name="contactName" id="contact-name" class="input-validation"
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
                             <input type="text" name="contactPhone" class="input-validation" id="contact-phone"
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
                             <input type="email" class="input-validation" id="contact-email" name="contactEmail"
                                 placeholder=" Email của bạn">
                             <p class="mes-error">Email là trường bắt buộc</p>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="">
                             <p>Tiêu đề</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <input type="text" placeholder="Tiêu đề liên hệ" name="contactTitle">
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="">
                             <p>Nội dung</p>
                             <span>*</span>
                         </label>
                         <div class="input">
                             <textarea name="contactContent" id="" cols="30" rows="10"></textarea>
                             <p class="mes-error">Nội dung là trường bắt buộc</p>
                         </div>
                     </div>
                     <div class="form-group submit">
                         <input type="submit" value="Gửi" name="add" class="btn btn-submit btnsubmit">
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