<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php
 class contact
 {
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_contact($data){
        $contactName = mysqli_real_escape_string($this->db->link, $data['contactName']);
        $contactPhone = mysqli_real_escape_string($this->db->link, $data['contactPhone']);
        $contactEmail = mysqli_real_escape_string($this->db->link, $data['contactEmail']);
        $contactTitle = mysqli_real_escape_string($this->db->link, $data['contactTitle']);
        $contactContent = mysqli_real_escape_string($this->db->link, $data['contactContent']);
        if(empty($contactName)) {
            $alert = '<span class="warning-message">Tên không được để trống</span>';
            return $alert;
        }
        else if(empty($contactPhone)) {
            $alert = '<span class="warning-message">Số điện thoại không được để trống</span>';
            return $alert;
        }
        else if(empty($contactEmail)) {
            $alert = '<span class="warning-message">Email không được để trống</span>';
            return $alert;
        }
        else if(empty($contactTitle)) {
            $alert = '<span class="warning-message">Tiêu đề không được để trống</span>';
            return $alert;
        }
        else if(empty($contactContent)) {
            $alert = '<span class="warning-message">Nội dung không được để trống</span>';
            return $alert;
        }
        $query = "INSERT INTO tbl_contact (contactName,contactPhone,contactEmail,contactTitle,contactContent) VALUES ('$contactName', '$contactPhone', '$contactEmail', '$contactTitle', '$contactContent')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Cảm ơn bạn đã liên hệ với chúng tôi</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Gửi thất bại</span>';
                return $alert;
             }
    }
    public function count_contact(){
        $query = "SELECT COUNT(*) FROM tbl_contact AS contactId";
        $result  = $this->db->select($query);
        return $result; 
    }
    public function show_contact(){
        $query = "SELECT * FROM tbl_contact ORDER BY contactId DESC" ;
        $show_contact = $this->db->select($query);
        return $show_contact; 
    }
    public function show_details($Id){
        $query = "SELECT * FROM tbl_contact WHERE contactId = '$Id' " ;
        $result = $this->db->select($query);
        return $result; 
    }
    public function del_contact($Id){
        $query = "DELETE FROM tbl_contact WHERE contactID = '$Id' ";
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
}
?>