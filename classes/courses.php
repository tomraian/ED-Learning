<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class courses
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function insert_course($courseName,$courseDesc)
     {
         $courseName = $this->fm->validation($courseName);
         $courseDesc = $this->fm->validation($courseDesc);
        //  $courseImage = $this->fm->validation($courseImage);

         $courseName = mysqli_real_escape_string($this->db->link, $courseName);
         $courseDesc = mysqli_real_escape_string($this->db->link, $courseDesc);

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['courseImage'] ['name'];
         $file_size = $_FILES['courseImage'] ['size'];
         $file_temp = $_FILES['courseImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
        //  $courseImage = mysqli_real_escape_string($this->db->link, $courseImage);
        //  kiểm tra lỗi 
         if(empty($courseName)) {
             $alert = '<span class="warning-message">Tên khóa học không được để trống</span>';
            return $alert;
         }
         else if(empty($courseDesc)) {
             $alert = '<span class="warning-message">Thông tin giới thiệu không được để trống</span>';
            return $alert;
         }
         else if(strlen($courseName) <= 10){
            $alert = '<span class="warning-message">Tên khóa học phải lớn hơn 10 ký tự</span>';
            return $alert;
         }
         else if(strlen($courseDesc) <= 10){
            $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
            return $alert;
         }
         else if(in_array($file_ext, $permitted) === false)
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
            return $alert;
        }
        //  else if(empty($courseImage)){
        //     $alert = "Thông tin giới thiệu khóa học không được để trống";
        //     return $alert;
        //  }
         else{
            move_uploaded_file($file_temp,$uploaded_image);
             $query = "INSERT INTO tbl_courses (coursesName, coursesDesc,coursesImage) VALUES ('$courseName', '$courseDesc', '$unique_image')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Thêm khóa học thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Thêm khóa học thất bại</span>';
                return $alert;
             }
         }
     }
     public function show_courses(){
         $query = "SELECT * FROM tbl_courses ORDER BY coursesID DESC" ;
         $result = $this->db->select($query);
         return $result; 
     }
     public function getCourseById($Id){
        $query = "SELECT * FROM tbl_courses WHERE coursesID = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
     }
     public function update_course($courseName,$courseDesc,$Id)
     {
        $courseName = $this->fm->validation($courseName);
        $courseDesc = $this->fm->validation($courseDesc);
        $Id = $this->fm->validation($Id);

        $courseName = mysqli_real_escape_string($this->db->link, $courseName);
        $courseDesc = mysqli_real_escape_string($this->db->link, $courseDesc);
        $Id = mysqli_real_escape_string($this->db->link, $Id);
      
         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
         $file_name = $_FILES['courseImage'] ['name'];
         $file_size = $_FILES['courseImage'] ['size'];
         $file_temp = $_FILES['courseImage'] ['tmp_name'];
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
       //  kiểm tra lỗi 
        if(empty($courseName)) {
            $alert = '<span class="warning-message">Tên khóa học không được để trống</span>';
           return $alert;
        }
        else if(empty($courseDesc)) {
            $alert = '<span class="warning-message">Thông tin giới thiệu không được để trống</span>';
           return $alert;
        }
        else if(strlen($courseName) <= 10){
           $alert = '<span class="warning-message">Tên khóa học phải lớn hơn 10 ký tự</span>';
           return $alert;
        }
        else if(strlen($courseDesc) <= 10){
           $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
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
                  $query = "UPDATE tbl_courses SET coursesName = '$courseName', coursesDesc = '$courseDesc', coursesImage = '$unique_image' WHERE coursesId = '$Id'";
               }
            }   
            else{
               $query = "UPDATE tbl_courses SET coursesName = '$courseName', coursesDesc = '$courseDesc' WHERE coursesId = '$Id'";
            }
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Cập nhật khóa học thành công</span>';
                return $alert;
            }
            else{
               $alert = '<span class="warning-message">Cập nhật khóa học thất bại</span>';
               echo $result;
               return $alert;
            }
        }
     }
     public function del_course($Id)
     {
      $query = "DELETE FROM tbl_courses WHERE coursesID = '$Id' ";
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
     public function check_course(){
        $query = "SELECT DISTINCT tbl_courses.*,tbl_class.coursesId
        FROM tbl_class INNER JOIN tbl_courses ON tbl_class.coursesId = tbl_courses.coursesId WHERE tbl_class.coursesId = tbl_courses.coursesId";
        $result = $this->db->select($query);
        return $result; 
     }
 }
?>