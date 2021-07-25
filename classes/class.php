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
        //  $classCourse = mysqli_real_escape_string($this->db->link, $data['classCourse']);
         $classTeacher = mysqli_real_escape_string($this->db->link, $data['classTeacher']);
         $classMentor = mysqli_real_escape_string($this->db->link, $data['classMentor']);
         $classPrice = mysqli_real_escape_string($this->db->link, $data['classPrice']);
         $coursesId = mysqli_real_escape_string($this->db->link, $data['classCourse']);
        //  ===================================================
        $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
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
        else if(empty($coursesId)) {
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
        else if(empty($file_nameTeacher)) {
            $alert = '<span class="warning-message">Hình ảnh giáo viên không được để trống</span>';
            return $alert;
        }
        else if(empty($file_nameMentor)) {
            $alert = '<span class="warning-message">Hình ảnh giáo viên hỗ trợ không được để trống</span>';
           return $alert;
        }
        else if(empty($classPrice)) {
            $alert = '<span class="warning-message">Giá tiền không được để trống</span>';
            return $alert;
        }
        else if(strlen($classDesc) <= 10){
            $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
            return $alert;
        }
        else if(in_array($file_extTeacher, $permitted) === false || in_array($file_extMentor, $permitted) === false  )
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
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
    public function getClassById($Id){
        $query = "SELECT * FROM tbl_class WHERE classID = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
    }
    public function update_class($data, $files, $Id){
        $className = mysqli_real_escape_string($this->db->link, $data['className']);
        $classDesc = mysqli_real_escape_string($this->db->link, $data['classDesc']);
        $classCourse = mysqli_real_escape_string($this->db->link, $data['classCourse']);
        $classTeacher = mysqli_real_escape_string($this->db->link, $data['classTeacher']);
        $classMentor = mysqli_real_escape_string($this->db->link, $data['classMentor']);
        $classPrice = mysqli_real_escape_string($this->db->link, $data['classPrice']);
        $coursesId = mysqli_real_escape_string($this->db->link, $data['classCourse']);
        //  ===================================================
        $permitted = array('jpg', 'jpeg', 'png' , 'gif');
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
        else if(strlen($classDesc) <= 10){
            $alert = '<span class="warning-message">Thông tin giới thiệu phải lớn hơn 10 ký tự</span>';
            return $alert;
        }
        else{
            // Nếu upload ảnh của cả 2
            if(!empty($file_nameTeacher) && !empty($file_nameMentor))
            {
                if(in_array($file_extTeacher, $permitted) === false || in_array($file_extMentor, $permitted) === false )
                {
                    $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
                    return $alert;
                }
                else{
                    move_uploaded_file($file_tempTeacher,$uploaded_imageTeacher);
                    move_uploaded_file($file_tempMentor,$uploaded_imageMentor);
                    $query = 
                    "UPDATE tbl_class 
                    SET  
                    className = '$className',
                    coursesId = '$coursesId',
                    classDesc = '$classDesc',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classTeacherAvatar = '$unique_imageTeacher',
                    classMentorAvatar = '$unique_imageMentor'
                    WHERE classId = '$Id'";
                }
            }
            // Nếu chỉ upload ảnh của giáo viên
            else if(!empty($file_nameTeacher))
            {
                if(in_array($file_extTeacher, $permitted) === false)
                {
                    $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
                    return $alert;
                }
                else{
                    move_uploaded_file($file_tempTeacher,$uploaded_imageTeacher);
                    $query = 
                    "UPDATE tbl_class 
                    SET  
                    className = '$className',
                    coursesId = '$coursesId',
                    classDesc = '$classDesc',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classTeacherAvatar = '$unique_imageTeacher'
                    WHERE classId = '$Id'";
                }
            }
            // nếu chỉ upload ảnh của giáo viên hỗ trợ 
            else if(!empty($file_nameMentor))
            {
                if(in_array($file_extMentor, $permitted) === false)
                {
                    $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
                    return $alert;
                }
                else{
                    move_uploaded_file($file_tempMentor,$uploaded_imageMentor);
                    $query = 
                    "UPDATE tbl_class 
                    SET  
                    className = '$className',
                    coursesId = '$coursesId',
                    classDesc = '$classDesc',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classMentorAvatar = '$unique_imageMentor'
                    WHERE classId = '$Id'";
                }
            }
            
            // nếu không upload ảnh 
            else{
                $query = 
                "UPDATE tbl_class SET  
                    className = '$className',
                    coursesId = '$coursesId',
                    classDesc = '$classDesc',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor'
                WHERE classId = '$Id'";
            }
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Sửa lớp học thành công</span>';
                return $alert;
            }
            else{
                $alert = '<span class="warning-message">Sửa lớp học thất bại</span>';
                return $alert;
            }
        }

    }
    public function del_class($Id){
        $query = "DELETE FROM tbl_class WHERE classID = '$Id' ";
        $result = $this->db->delete($query);
        if($result)
        {
            $alert = '<span class="success-message">Xóa lớp học thành công</span>';
            return $alert;
        }
        else{
            $alert = '<span class="warning-message">Xóa lớp học thất bại</span>';
            return $alert;
        }
    }
 }
?>