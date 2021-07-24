<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
 class classOfCourse 
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function insert_class($data, $files)
     {
         $className = mysqli_real_escape_string($this->db->link, $data['className']);
         $classDesc = mysqli_real_escape_string($this->db->link, $data['classDesc']);
         $classCourse = mysqli_real_escape_string($this->db->link, $data['classCourse']);
         $classTeacher = mysqli_real_escape_string($this->db->link, $data['classTeacher']);
         $classMentor = mysqli_real_escape_string($this->db->link, $data['classMentor']);
         $classPrice = mysqli_real_escape_string($this->db->link, $data['classPrice']);
         $coursesId = mysqli_real_escape_string($this->db->link, $data['classCourse']);
        //  ===================================================
         $permited = array('jpg', 'jpeg', 'png' , 'gif');
         $file_nameTeacher = $_FILES['classTeacherAvatar'] ['name'];
         $file_sizeTeacher = $_FILES['classTeacherAvatar'] ['size'];
         $file_tempTeacher = $_FILES['classTeacherAvatar'] ['tmp_name'];
         $divTeacher = explode('.', $file_nameTeacher);
         $file_extTeacher = strtolower(end($divTeacher));
         $unique_imageTeacher = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_extTeacher;
         $uploaded_imageTeacher = "../uploads/".$unique_imageTeacher;
         //  ===================================================
         $file_nameMentor = $_FILES['classMentorAvatar'] ['name'];
         $file_sizeMentor = $_FILES['classMentorAvatar'] ['size'];
         $file_tempMentor = $_FILES['classMentorAvatar'] ['tmp_name'];
         $divMentor = explode('.', $file_nameMentor);
         $file_extMentor = strtolower(end($divMentor));
         $unique_imageMentor = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_extMentor;
         $uploaded_imageMentor = "../uploads/".$unique_imageMentor;
        //  kiểm tra lỗi 
         if(empty($className)) {
             $alert = '<span class="warning-message">Tên lớp học không được để trống</span>';
            return $alert;
         }
         else if(empty($classDesc)) {
             $alert = '<span class="warning-message">Thông tin giới thiệu không được để trống</span>';
            return $alert;
         }
         else if(empty($classCourse)) {
             $alert = '<span class="warning-message">Phải chọn khóa học</span>';
            return $alert;
         }
         else if(empty($classTeacher)) {
             $alert = '<span class="warning-message">Tên giáo viên không được để trống</span>';
            return $alert;
         }
         else if(empty($classMentor)) {
             $alert = '<span class="warning-message">Tên giáo viên hỗ trợ không được để trống</span>';
            return $alert;
         }
         else if(empty($classPrice)) {
             $alert = '<span class="warning-message">Giá tiền không được để trống</span>';
            return $alert;
         }
         else if(empty($file_nameTeacher)) {
             $alert = '<span class="warning-message">Hình ảnh giáo viên không được để trống</span>';
            return $alert;
         }
         else if(empty($file_nameMentor)) {
             $alert = '<span class="warning-message">Hình ảnh giáo viên hỗ trợ không được để trống</span>';
            return $alert;
         }
         else if(strlen($classDesc) <= 10){
            $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
            return $alert;
         }
         else{
             move_uploaded_file($file_tempTeacher,$uploaded_imageTeacher);
             move_uploaded_file($file_tempMentor,$uploaded_imageMentor);
             $query = "INSERT INTO tbl_class (className,coursesId,classDesc,classPrice,classTeacher,classMentor,classTeacherAvatar,classMentorAvatar) VALUES ('$className','$coursesId','$classDesc','$classPrice','$classTeacher','$classMentor','$unique_imageTeacher','$unique_imageMentor')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Thêm lớp học thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Thêm lớp học thất bại</span>';
                return $alert;
             }
         }
     }
     public function show_class(){
         $query =
        "SELECT tbl_class.*,tbl_courses.coursesName 
         FROM tbl_class INNER JOIN tbl_courses ON tbl_class.coursesId = tbl_courses.coursesId 
         ORDER BY tbl_class.classId DESC" ;
         $result = $this->db->select($query);
         return $result; 
     }
   //   public function getCourseById($Id){
   //      $query = "SELECT * FROM tbl_courses WHERE coursesID = '$Id' ";
   //      $result = $this->db->select($query);
   //      return $result; 
   //   }
   //   public function update_course($courseName,$courseDesc,$Id)
   //   {
   //      $courseName = $this->fm->validation($courseName);
   //      $courseDesc = $this->fm->validation($courseDesc);
   //      $Id = $this->fm->validation($Id);
   //     //  $courseImage = $this->fm->validation($courseImage);

   //      $courseName = mysqli_real_escape_string($this->db->link, $courseName);
   //      $courseDesc = mysqli_real_escape_string($this->db->link, $courseDesc);
   //      $Id = mysqli_real_escape_string($this->db->link, $Id);
   //     //  $courseImage = mysqli_real_escape_string($this->db->link, $courseImage);
   //     //  kiểm tra lỗi 
   //      if(empty($courseName)) {
   //          $alert = '<span class="warning-message">Tên khóa học không được để trống</span>';
   //         return $alert;
   //      }
   //      else if(empty($courseDesc)) {
   //          $alert = '<span class="warning-message">Thông tin giới thiệu không được để trống</span>';
   //         return $alert;
   //      }
   //      else if(strlen($courseName) <= 10){
   //         $alert = '<span class="warning-message">Tên khóa học phải lớn hơn 10 ký tự</span>';
   //         return $alert;
   //      }
   //      else if(strlen($courseDesc) <= 10){
   //         $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
   //         return $alert;
   //      }
   //     //  else if(empty($courseImage)){
   //     //     $alert = "Thông tin giới thiệu khóa học không được để trống";
   //     //     return $alert;
   //     //  }
   //      else{
   //          $query = "UPDATE tbl_courses SET coursesName = '$courseName', coursesDesc = '$courseDesc' WHERE coursesId = '$Id'";
   //          $result  = $this->db->insert($query);
   //          if($result){
   //              $alert = '<span class="success-message">Cập nhật khóa học thành công</span>';
   //              return $alert;
   //          }
   //          else{
   //             $alert = '<span class="warning-message">Cập nhật khóa học thất bại</span>';
   //             echo $result;
   //             return $alert;
   //          }
   //      }
   //   }
   //   public function del_course($Id)
   //   {
   //    $query = "DELETE FROM tbl_courses WHERE coursesID = '$Id' ";
   //    $result = $this->db->delete($query);
   //    if($result)
   //    {
   //       $alert = '<span class="success-message">Xóa khóa học thành công</span>';
   //        return $alert;
   //    }
   //    else{
   //       $alert = '<span class="warning-message">Xóa khóa học thất bại</span>';
   //       return $alert;
   //    }
   //   }
 }
?>