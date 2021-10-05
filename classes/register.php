<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php
 class register
 {
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_register($data,$Id){
        $registerName = mysqli_real_escape_string($this->db->link, $data['registerName']);
        $registerPhone = mysqli_real_escape_string($this->db->link, $data['registerPhone']);
        $registerEmail = mysqli_real_escape_string($this->db->link, $data['registerEmail']);
        $registerPayment = mysqli_real_escape_string($this->db->link, $data['registerPayment']);
        $registerDesire = mysqli_real_escape_string($this->db->link, $data['registerDesire']);
        if(empty($registerName)) {
            $alert = '<span class="warning-message">Tên không được để trống</span>';
            return $alert;
        }
        else if(empty($registerPhone)) {
            $alert = '<span class="warning-message">Số điện thoại không được để trống</span>';
            return $alert;
        }
        else if(empty($registerEmail)) {
            $alert = '<span class="warning-message">Email không được để trống</span>';
            return $alert;
        }
        $query = "INSERT INTO tbl_register (registerName,registerPhone,registerEmail,registerPayment,registerDesire,classId,registerStatus) VALUES ('$registerName', '$registerPhone', '$registerEmail', $registerPayment, '$registerDesire','$Id',0)";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Cảm ơn bạn đã đăng ký, ED sẽ liên hệ lại với bạn trong vòng 48H.</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Gửi thất bại</span>';
                return $alert;
             }
    }
    public function registerClassById($Id){
       
        $query = "SELECT * FROM tbl_class WHERE classId = $Id";
        $result = $this->db->select($query);
        return $result; 
    }
    public function show_register(){
        $query = "SELECT tbl_register.*,tbl_class.className,tbl_class.classPrice
        FROM tbl_register INNER JOIN tbl_class ON tbl_class.classId = tbl_register.classId ORDER BY registerStatus ASC ";
        $result = $this->db->select($query);
        return $result; 
    }
    public function show_details($Id){
        $query = "SELECT tbl_register.*,tbl_class.className,tbl_class.classPrice
        FROM tbl_register INNER JOIN tbl_class ON tbl_class.classId = tbl_register.classId WHERE registerId = '$Id'" ;
        $result = $this->db->select($query);
        return $result; 
    }
    public function del_register($Id){
        $query = "DELETE FROM tbl_register WHERE registerID = '$Id' ";
      $result = $this->db->delete($query);
      if($result)
      {
         $alert = '<span class="success-message">Xóa liên lạc thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Xóa liên lạc thất bại</span>';
         return $alert;
      }
    }
    public function check_register($Id){
        $query = "UPDATE tbl_register SET registerStatus = 1 WHERE registerId = '$Id'";
        $result = $this->db->update($query);
      if($result)
      {
         $alert = '<span class="success-message">Duyệt thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Duyệt thất bại</span>';
         return $alert;
      }
    }
    public function count_register(){
        $query = "SELECT COUNT(*) FROM tbl_register";
        $result  = $this->db->select($query);
        $count = $result->fetchColumn();
        return $count; 
    }
}
?>