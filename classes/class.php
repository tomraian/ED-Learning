<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
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
         $classTime = mysqli_real_escape_string($this->db->link, $data['classTime']);
         $classLesson = mysqli_real_escape_string($this->db->link, $data['classLesson']);
         $classLearnTime = mysqli_real_escape_string($this->db->link, $data['classLearnTime']);
         $classAddress = mysqli_real_escape_string($this->db->link, $data['classAddress']);
         $classTeacher = mysqli_real_escape_string($this->db->link, $data['classTeacher']);
         $classMentor = mysqli_real_escape_string($this->db->link, $data['classMentor']);
         $classPrice = mysqli_real_escape_string($this->db->link, $data['classPrice']);
         $coursesId = mysqli_real_escape_string($this->db->link, $data['classCourse']);
         $classTeacherDesc = mysqli_real_escape_string($this->db->link, $data['classTeacherDesc']);
         $classMentorDesc = mysqli_real_escape_string($this->db->link, $data['classMentorDesc']);
         $classTeacherIntro = mysqli_real_escape_string($this->db->link, $data['classTeacherIntro']);
         $classMentorIntro = mysqli_real_escape_string($this->db->link, $data['classMentorIntro']);
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
        //  ki???m tra l???i 
        if(empty($className)) {
            $alert = '<span class="warning-message">T??n l???p h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classDesc)) {
            $alert = '<span class="warning-message">Th??ng tin gi???i thi???u kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($coursesId)) {
            $alert = '<span class="warning-message">Ph???i ch???n kh??a h???c</span>';
            return $alert;
        }
        else if(empty($classTime)) {
            $alert = '<span class="warning-message">Ng??y khai gi???ng kh??a h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classLesson)) {
            $alert = '<span class="warning-message">S??? l?????ng bu???i h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classLearnTime)) {
            $alert = '<span class="warning-message">Th???i gian h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classAddress)) {
            $alert = '<span class="warning-message">?????a ??i???m h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacher)) {
            $alert = '<span class="warning-message">T??n gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentor)) {
            $alert = '<span class="warning-message">T??n gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($file_nameTeacher)) {
            $alert = '<span class="warning-message">H??nh ???nh gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($file_nameMentor)) {
            $alert = '<span class="warning-message">H??nh ???nh gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
           return $alert;
        }
        else if(empty($classPrice)) {
            $alert = '<span class="warning-message">Gi?? ti???n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacherDesc)) {
            $alert = '<span class="warning-message">M?? t??? v??? gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentorDesc)) {
            $alert = '<span class="warning-message">M?? t??? v??? gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacherIntro)) {
            $alert = '<span class="warning-message">Gi???i thi???u v??? gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentorIntro)) {
            $alert = '<span class="warning-message">Gi???i thi???u v??? gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(strlen($classDesc) <= 10){
            $alert = '<span class="warning-message">Th??ng tin gi???i thi???u ph???i l???n h??n 10 k?? t???</span>';
            return $alert;
        }
        else if(in_array($file_extTeacher, $permitted) === false || in_array($file_extMentor, $permitted) === false  )
        {
            $alert = '<span class="warning-message">???nh ch??? ???????c c?? ?????nh d???ng file l?? '.implode(',',$permitted)."</span>";
            return $alert;
        }
        else{
            move_uploaded_file($file_tempTeacher,$uploaded_imageTeacher);
            move_uploaded_file($file_tempMentor,$uploaded_imageMentor);
            $query = "INSERT INTO tbl_class (className,coursesId,classDesc,classTime,classLesson,classLearnTime,classAddress,classPrice,classTeacher,classMentor,classTeacherAvatar,classMentorAvatar,classStatus,classTeacherDesc,classMentorDesc,classTeacherIntro,classMentorIntro) 
            VALUES ('$className','$coursesId','$classDesc','$classTime','$classLesson','$classLearnTime','$classAddress','$classPrice','$classTeacher','$classMentor','$unique_imageTeacher','$unique_imageMentor', 1,'$classTeacherDesc','$classMentorDesc','$classTeacherIntro','$classMentorIntro')";
            $result  = $this->db->insert($query);
            if($result){
                $alert = '<span class="success-message">Th??m l???p h???c th??nh c??ng</span>';
                return $alert;
            }
            else{
               $alert = '<span class="warning-message">Th??m l???p h???c th???t b???i</span>';
               return $alert;
            }
        }
    }
    public function show_class_asc(){
        $query =
        "SELECT tbl_class.*,tbl_courses.coursesName 
        FROM tbl_class INNER JOIN tbl_courses ON tbl_class.coursesId = tbl_courses.coursesId 
        ORDER BY tbl_class.classStatus ASC" ;
        $result = $this->db->select($query);
        return $result; 
    }
    public function show_class_desc(){
        $query = "SELECT * FROM tbl_class  WHERE classStatus = 0 OR classStatus = 1 ORDER BY classStatus DESC LIMIT 8";
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
        $classStatus = mysqli_real_escape_string($this->db->link, $data['classStatus']);
        $classTeacherIntro = mysqli_real_escape_string($this->db->link, $data['classTeacherIntro']);
        $classMentorIntro = mysqli_real_escape_string($this->db->link, $data['classMentorIntro']);
        $classTeacherDesc = mysqli_real_escape_string($this->db->link, $data['classTeacherDesc']);
        $classMentorDesc = mysqli_real_escape_string($this->db->link, $data['classMentorDesc']);
        $classTime = mysqli_real_escape_string($this->db->link, $data['classTime']);
        $classLesson = mysqli_real_escape_string($this->db->link, $data['classLesson']);
        $classLearnTime = mysqli_real_escape_string($this->db->link, $data['classLearnTime']);
        $classAddress = mysqli_real_escape_string($this->db->link, $data['classAddress']);
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
        //  ki???m tra l???i 
        if(empty($className)) {
            $alert = '<span class="warning-message">T??n l???p h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classDesc)) {
            $alert = '<span class="warning-message">Th??ng tin gi???i thi???u kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(strlen($classDesc) <= 10){
            $alert = '<span class="warning-message">Th??ng tin gi???i thi???u ph???i l???n h??n 10 k?? t???</span>';
            return $alert;
        }
        else if(empty($classCourse)) {
            $alert = '<span class="warning-message">Ph???i ch???n kh??a h???c</span>';
            return $alert;
        }
        else if(empty($classTime)) {
            $alert = '<span class="warning-message">Th???i gian khai gi???ng kh??a h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classLesson)) {
            $alert = '<span class="warning-message">S??? l?????ng bu???i h???c kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacher)) {
            $alert = '<span class="warning-message">T??n gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentor)) {
            $alert = '<span class="warning-message">T??n gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classPrice)) {
            $alert = '<span class="warning-message">Gi?? ti???n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacherDesc)) {
            $alert = '<span class="warning-message">M?? t??? v??? gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentorDesc)) {
            $alert = '<span class="warning-message">M?? t??? v??? gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classTeacherIntro)) {
            $alert = '<span class="warning-message">Gi???i thi???u v??? gi??o vi??n kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else if(empty($classMentorIntro)) {
            $alert = '<span class="warning-message">Gi???i thi???u v??? gi??o vi??n h??? tr??? kh??ng ???????c ????? tr???ng</span>';
            return $alert;
        }
        else{
            // N???u upload ???nh c???a c??? 2 
            if(!empty($file_nameTeacher) && !empty($file_nameMentor))
            {
                if(in_array($file_extTeacher, $permitted) === false || in_array($file_extMentor, $permitted) === false )
                {
                    $alert = '<span class="warning-message">???nh ch??? ???????c c?? ?????nh d???ng file l?? '.implode(',',$permitted)."</span>";
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
                    classTime = '$classTime',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classTeacherAvatar = '$unique_imageTeacher',
                    classMentorAvatar = '$unique_imageMentor',
                    classTeacherIntro = '$classTeacherIntro',
                    classMentorIntro = '$classMentorIntro',
                    classTeacherDesc = '$classTeacherDesc',
                    classMentorDesc = '$classMentorDesc',
                    classLesson = '$classLesson',
                    classLearnTime = '$classLearnTime',
                    classAddress = '$classAddress',
                    classStatus = $classStatus
                    WHERE classId = '$Id'";
                }
            }
            // N???u ch??? upload ???nh c???a gi??o vi??n
            else if(!empty($file_nameTeacher))
            {
                if(in_array($file_extTeacher, $permitted) === false)
                {
                    $alert = '<span class="warning-message">???nh ch??? ???????c c?? ?????nh d???ng file l?? '.implode(',',$permitted)."</span>";
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
                    classTime = '$classTime',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classTeacherAvatar = '$unique_imageTeacher',
                    classTeacherIntro = '$classTeacherIntro',
                    classMentorIntro = '$classMentorIntro',
                    classTeacherDesc = '$classTeacherDesc',
                    classMentorDesc = '$classMentorDesc',
                    classLesson = '$classLesson',
                    classLearnTime = '$classLearnTime',
                    classAddress = '$classAddress',
                    classStatus = $classStatus
                    WHERE classId = '$Id'";
                }
            }
            // n???u ch??? upload ???nh c???a gi??o vi??n h??? tr??? 
            else if(!empty($file_nameMentor))
            {
                if(in_array($file_extMentor, $permitted) === false)
                {
                    $alert = '<span class="warning-message">???nh ch??? ???????c c?? ?????nh d???ng file l?? '.implode(',',$permitted)."</span>";
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
                    classTime = '$classTime',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classMentorAvatar = '$unique_imageMentor',
                    classTeacherIntro = '$classTeacherIntro',
                    classMentorIntro = '$classMentorIntro',
                    classTeacherDesc = '$classTeacherDesc',
                    classMentorDesc = '$classMentorDesc',
                    classLesson = '$classLesson',
                    classLearnTime = '$classLearnTime',
                    classAddress = '$classAddress',
                    classStatus = $classStatus
                    WHERE classId = '$Id'";
                }
            }  
            // n???u kh??ng upload ???nh 
            else{
                $query = 
                "UPDATE tbl_class SET  
                    className = '$className',
                    coursesId = '$coursesId',
                    classDesc = '$classDesc',
                    classTime = '$classTime',
                    classPrice = '$classPrice',
                    classTeacher = '$classTeacher',
                    classMentor = '$classMentor',
                    classTeacherIntro = '$classTeacherIntro',
                    classMentorIntro = '$classMentorIntro',
                    classTeacherDesc = '$classTeacherDesc',
                    classMentorDesc = '$classMentorDesc',
                    classLesson = '$classLesson',
                    classLearnTime = '$classLearnTime',
                    classAddress = '$classAddress',
                    classStatus = $classStatus
                WHERE classId = '$Id'";
            }
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">S???a l???p h???c th??nh c??ng</span>';
                return $alert;
            }
            else{
                $alert = '<span class="warning-message">S???a l???p h???c th???t b???i</span>';
                return $alert;
            }
        }
    }
    public function del_class($Id){
        $query = "DELETE FROM tbl_class WHERE classID = '$Id' ";
        $result = $this->db->delete($query);
        if($result)
        {
            $alert = '<span class="success-message">X??a l???p h???c th??nh c??ng</span>';
            return $alert;
        }
        else{
            $alert = '<span class="warning-message">X??a l???p h???c th???t b???i</span>';
            return $alert;
        }
    }
    public function get_details($Id){
        $query = "SELECT * FROM tbl_class WHERE classID = '$Id' ";
        // $query =
        // "SELECT tbl_class.*,tbl_courses.coursesName 
        // FROM tbl_class INNER JOIN tbl_courses ON tbl_class.coursesId = tbl_courses.coursesId 
        // ORDER BY tbl_class.classStatus WHERE tbl_class.classId = '$Id'" ;
        $result = $this->db->select($query);
        return $result; 
    }
    public function show_class_details($Id){
        $query = "SELECT tbl_class.*,tbl_courses.coursesName,tbl_courses.coursesImage
        FROM tbl_class INNER JOIN tbl_courses ON tbl_class.coursesId = tbl_courses.coursesId WHERE classId = '$Id'";
        $result = $this->db->select($query);
        return $result; 
    }
    public function show_class_relative($Id){
        // $query = "SELECT * FROM tbl_class WHERE classStatus = '1' ";
        $query = "SELECT * FROM tbl_class WHERE classStatus = 1 EXCEPT (SELECT * FROM tbl_class WHERE classId = '$Id')";

        $result = $this->db->select($query);
        return $result; 
    }
    public  function show_class_list($Id)
    {
        $query = "SELECT * FROM tbl_class WHERE coursesId = '$Id'";
        $result = $this->db->select($query);
        return $result; 
    }
 }
?>