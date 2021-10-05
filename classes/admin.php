<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class admin
 {
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_admin($data){
        $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
        $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
        $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
        $adminPass = mysqli_real_escape_string($this->db->link, md5($data['adminPass']));
        $adminPassAgain = mysqli_real_escape_string($this->db->link, md5($data['adminPassAgain']));
        if(empty($adminName)) {
            $alert = '<span class="warning-message">Tên người quản trị không được để trống</span>';
            return $alert;
        }
        else if(empty($adminEmail)) {
            $alert = '<span class="warning-message">Email người quản trị không được để trống</span>';
            return $alert;
        }
        else if(empty($adminUser)) {
            $alert = '<span class="warning-message">Tên người dùng không được để trống</span>';
            return $alert;
        }
        else{
            $query = "INSERT INTO tbl_admin(adminName, adminEmail, adminUser, adminPass) VALUES ('$adminName','$adminEmail','$adminUser','$adminPass')";
            $result  = $this->db->insert($query);
            if($result){
                $alert = '<span class="success-message">Thêm thành công</span>';
                return $alert;
            }
            else if(mysqli_error($result) == 44)
            {
                $alert = '<span class="success-message">aaaâ</span>';
                return $alert;
            }
            else{
            $alert = '<span class="warning-message">Thêm thất bại</span>';
            return $alert;
            }
        }
    }
    public function update_adminInfo($adminName,$Id){
        $adminName = $this->fm->validation($adminName);
        $adminName = mysqli_real_escape_string($this->db->link, $adminName);
        if(empty($adminName)) {
            $alert = '<span class="warning-message">Tên người quản trị không được để trống</span>';
            return $alert;
        }
        else{
            $query = "UPDATE tbl_admin SET adminName = '$adminName' WHERE adminId = '$Id'";
            $result = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Sửa thông tin tài khoản thành công</span>';
                return $alert;
            }
            else{
                $alert = '<span class="warning-message">Sửa thông tin tài khoản thất bại</span>';
                return $alert;
            }
        }
    }
    public function update_adminPass($adminPass,$adminPassAgain,$Id){
         $adminPass = $this->fm->validation($adminPass);
         $adminPassAgain = $this->fm->validation($adminPassAgain);
         $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
         $adminPassAgain = mysqli_real_escape_string($this->db->link, md5($adminPassAgain));
        if(empty($adminPass)) {
            $alert = '<span class="warning-message">Mật khẩu không được để trống</span>';
            return $alert;
        }
        if(empty($adminPassAgain)) {
            $alert = '<span class="warning-message">Mật khẩu nhập lại không được để trống</span>';
            return $alert;
        }
        else if($adminPassAgain != $adminPass){
            $alert = '<span class="warning-message">Mật khẩu nhập lại không trùng khớp</span>';
            return $alert;
        }
        else{
            $query = "UPDATE tbl_admin SET adminPass = '$adminPass' WHERE adminId = '$Id'";
            $result = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Sửa mật khẩu thành công, vui lòng đăng nhập lại</span>';
                return $alert;
            }
            else{
                $alert = '<span class="warning-message">Sửa mật khẩu thất bại</span>';
                return $alert;
            }
        }
    }
    public function show_admin($Id){
        $query = "SELECT * FROM tbl_admin WHERE adminId = '$Id'";
        $result = $this->db->select($query);
        return $result; 
    }
}
?>