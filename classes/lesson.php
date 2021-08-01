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
    public function insert_lesson($data,$table,$classId){
        // $lessonName = $this->fm->validation($lessonName);
        // $lessonDesc = $this->fm->validation($lessonDesc);
        // $classId = $this->fm->validation($classId);
        
        // $lessonName = mysqli_real_escape_string($this->db->link, $lessonName);
        // $lessonDesc = mysqli_real_escape_string($this->db->link, $lessonDesc);
        // $classId = mysqli_real_escape_string($this->db->link, $classId);
        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
             . "VALUES ('" . implode("', '", $val) . "')";
     
        return($sql);
        // if(empty($lessonName)){
        //     $alert = "Tên buổi học không được để trống";
        //     return $alert;
        // }
        // else{
        //     $query = "INSERT INTO tbl_lesson (lessonName, lessonDesc,classId) VALUES ('$lessonName', '$lessonDesc','$classId')";
        //      $result  = $this->db->insert($query);
        //      if($result){
        //          $alert = '<span class="success-message">Thêm khóa học thành công</span>';
        //          return $alert;
        //      }
        //      else{
        //         $alert = '<span class="warning-message">Thêm khóa học thất bại</span>';
        //         return $alert;
        //      }
        // }

        for($i = 0; $i< 10 ; $i++){
            $arr = array('lessonName' => $lessonName,
                    'lessonDesc'=> $lessonDesc,
                    'classId' => $classId,
                    );
        }
        $columns = array_keys($arr);
        $values = array_values($arr);
        $query ="INSERT INTO tbl_lesson (".implode(',',$columns).") VALUES ('" . implode("', '", $values) . "' )";
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

?>