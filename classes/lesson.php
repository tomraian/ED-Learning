<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class lesson
 {
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_class(){
        $query = "SELECT * FROM tbl_class";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_lesson(){
        $query = "SELECT * FROM tbl_lesson ";
            $result = $this->db->select($query);
            return $result; 
    }
    public function insert_lesson($lessonName,$lessonDesc,$classId){
        $lessonName = $this->fm->validation($lessonName);
        $lessonDesc = $this->fm->validation($lessonDesc);
        $classId = $this->fm->validation($classId);
        
        $lessonName = mysqli_real_escape_string($this->db->link, $lessonName);
        $lessonDesc = mysqli_real_escape_string($this->db->link, $lessonDesc);
        $classId = mysqli_real_escape_string($this->db->link, $classId);
     
        if(empty($lessonName)){
            $alert = '<span class="warning-message">Tên buổi học không được để trống</span>';
            return $alert;
        }
        else if(empty($lessonDesc)){
            $alert = '<span class="warning-message">Mô tả học không được để trống</span>';
            return $alert;
        }
        else{
            $query = "INSERT INTO tbl_lesson (lessonName, lessonDesc,classId) VALUES ('$lessonName', '$lessonDesc','$classId')";
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
    public function lesson_details($Id){
        $query = "SELECT * FROM tbl_lesson WHERE classID = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
    }
        public function getLessonById($Id){
        $query = "SELECT * FROM tbl_lesson WHERE lessonId = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
    }
    public function del_lesson($IdLesson){
        $query = "DELETE FROM tbl_lesson WHERE lessonId = '$IdLesson' ";
        $result = $this->db->delete($query);
      if($result)
      {
         $alert = '<span class="success-message">Xóa nội dung buổi học thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Xóa nội dung buổi học thất bại</span>';
         return $alert;
      }
    }
    
    public function edit_lesson($lessonName,$lessonDesc,$IdLesson){
        $lessonName = $this->fm->validation($lessonName);
        $lessonDesc = $this->fm->validation($lessonDesc);
        
        $lessonName = mysqli_real_escape_string($this->db->link, $lessonName);
        $lessonDesc = mysqli_real_escape_string($this->db->link, $lessonDesc);
        if(empty($lessonName)){
            $alert = '<span class="warning-message">Tên nội dung buổi học không được để trống</span>';
            return $alert;
        }
        else if(empty($lessonDesc)){
            $alert = '<span class="warning-message">Mô tả nội dung buổi học không được để trống</span>';
            return $alert;
        }
        else{
            $query = "UPDATE tbl_lesson SET lessonName ='$lessonName', lessonDesc= '$lessonDesc' WHERE lessonId = '$IdLesson'";
             $result  = $this->db->update($query);
             if($result){
                $alert = '<span class="success-message">Sửa nội dung lớp học thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Sửa nội dung lớp học thất bại</span>';
                return $alert;
             }
        }
    }
}
?>