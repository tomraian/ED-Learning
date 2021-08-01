<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class review
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function insert_review($testimonial_sliderName,$testimonial_sliderPosition,$testimonial_sliderDesc)
     {
         $testimonial_sliderName = $this->fm->validation($testimonial_sliderName);
         $testimonial_sliderPosition = $this->fm->validation($testimonial_sliderPosition);
         $testimonial_sliderDesc = $this->fm->validation($testimonial_sliderDesc);

         $testimonial_sliderName = mysqli_real_escape_string($this->db->link, $testimonial_sliderName);
         $testimonial_sliderPosition = mysqli_real_escape_string($this->db->link, $testimonial_sliderPosition);
         $testimonial_sliderDesc = mysqli_real_escape_string($this->db->link, $testimonial_sliderDesc);

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['testimonial_sliderImage'] ['name'];
         $file_size = $_FILES['testimonial_sliderImage'] ['size'];
         $file_temp = $_FILES['testimonial_sliderImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
        //  kiểm tra lỗi 
         if(empty($testimonial_sliderName)) {
             $alert = '<span class="warning-message">Tên người đánh giá không được để trống</span>';
            return $alert;
         }
         else if(empty($testimonial_sliderPosition)) {
             $alert = '<span class="warning-message">Chức vụ người đánh giá không được để trống</span>';
            return $alert;
         }
         else if(empty($testimonial_sliderDesc)) {
             $alert = '<span class="warning-message">Thông tin đánh giá không được để trống</span>';
            return $alert;
         }
         else if(empty($file_name)) {
             $alert = '<span class="warning-message">Hình ảnh người đánh giá không được để trống</span>';
            return $alert;
         }
         else if(in_array($file_ext, $permitted) === false)
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
            return $alert;
        }
         else{
            move_uploaded_file($file_temp,$uploaded_image);
             $query = "INSERT INTO tbl_testimonial_slider (testimonial_sliderName,testimonial_sliderPosition,testimonial_sliderDesc,testimonial_sliderImage) VALUES ('$testimonial_sliderName','$testimonial_sliderPosition','$testimonial_sliderDesc','$unique_image')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Thêm cảm nhận thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Thêm cảm nhận thất bại</span>';
                return $alert;
             }
         }
     }
     public function show_review(){
         $query = "SELECT * FROM tbl_testimonial_slider ORDER BY testimonial_sliderID DESC" ;
         $result = $this->db->select($query);
         return $result; 
     }
     public function getReviewById($Id){
        $query = "SELECT * FROM tbl_testimonial_slider WHERE testimonial_sliderID = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
     }
     public function update_review($testimonial_sliderName,$testimonial_sliderPosition,$testimonial_sliderDesc,$Id)
     {
        $testimonial_sliderName = $this->fm->validation($testimonial_sliderName);
         $testimonial_sliderPosition = $this->fm->validation($testimonial_sliderPosition);
         $testimonial_sliderDesc = $this->fm->validation($testimonial_sliderDesc);

         $testimonial_sliderName = mysqli_real_escape_string($this->db->link, $testimonial_sliderName);
         $testimonial_sliderPosition = mysqli_real_escape_string($this->db->link, $testimonial_sliderPosition);
         $testimonial_sliderDesc = mysqli_real_escape_string($this->db->link, $testimonial_sliderDesc);

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['testimonial_sliderImage'] ['name'];
         $file_size = $_FILES['testimonial_sliderImage'] ['size'];
         $file_temp = $_FILES['testimonial_sliderImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
       //  kiểm tra lỗi 
       if(empty($testimonial_sliderName)) {
            $alert = '<span class="warning-message">Tên người đánh giá không được để trống</span>';
            return $alert;
        }
        else if(empty($testimonial_sliderPosition)) {
            $alert = '<span class="warning-message">Chức vụ người đánh giá không được để trống</span>';
            return $alert;
        }
        else if(empty($testimonial_sliderDesc)) {
            $alert = '<span class="warning-message">Thông tin đánh giá không được để trống</span>';
            return $alert;
        }
        else{
         //   nếu có upload ảnh 
            if (!empty($file_name)){
               if(in_array($file_ext, $permitted) === false)
               {
                  $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
                  return $alert;
               }
               else{
                  move_uploaded_file($file_temp,$uploaded_image);
                  $query = "UPDATE tbl_testimonial_slider SET testimonial_sliderName = '$testimonial_sliderName', testimonial_sliderDesc = '$testimonial_sliderDesc',testimonial_sliderPosition = '$testimonial_sliderPosition', testimonial_sliderImage = '$unique_image' WHERE testimonial_sliderId = '$Id'";
               }
            }   
            else{
                $query = "UPDATE tbl_testimonial_slider SET testimonial_sliderName = '$testimonial_sliderName', testimonial_sliderDesc = '$testimonial_sliderDesc',testimonial_sliderPosition = '$testimonial_sliderPosition' WHERE testimonial_sliderId = '$Id'";

            }
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Cập nhật cảm nhận thành công</span>';
                return $alert;
            }
            else{
               $alert = '<span class="warning-message">Cập nhật cảm nhận thất bại</span>';
               echo $result;
               return $alert;
            }
        }
     }
     public function del_review($Id)
     {
      $query = "DELETE FROM tbl_testimonial_slider WHERE testimonial_sliderID = '$Id' ";
      $result = $this->db->delete($query);
      if($result)
      {
         $alert = '<span class="success-message">Xóa khóa học thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Xóa khóa học thất bại</span>';
         return $alert;
      }
     }
     public function slider_showContent(){
        $query = "SELECT * FROM tbl_testimonial_slider ORDER BY testimonial_sliderID DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result; 
     }
     public function slider_showImage(){
        $query = "SELECT * FROM tbl_testimonial_slider ORDER BY testimonial_sliderID DESC LIMIT 5";
        $resultImage = $this->db->select($query);
        return $resultImage; 
     }
     public function get_max()
     {
        $query = "SELECT MAX(testimonial_sliderId) FROM tbl_testimonial_slider";
        $result = $this->db->select($query);
        return $result; 
     }
 }
?>