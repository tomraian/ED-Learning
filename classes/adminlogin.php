<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
 class adminlogin
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function login_admin($adminEmail,$adminPassword)
     {
         $adminEmail = $this->fm->validation($adminEmail);
         $adminPassword = $this->fm->validation($adminPassword);

         $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
         $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);
         
         if(empty($adminEmail) || empty($adminPassword)){
             $alert = "Tài khoản và mật khẩu không được để trống";
            return $alert;
         }
         else{
             $query = "SELECT * FROM tbl_admin WHERE adminEmail ='$adminEmail' AND adminPass = '$adminPassword' LIMIT 1";
             $result  = $this->db->select($query);
             if($result != false)
             {
                 $value = $result->fetch_assoc(); 
                 Session::set('adminlogin', true);
                 
                 Session::set('adminId', $value['adminId']);
                 Session::set('adminEmail', $value['adminEmail']);
                 Session::set('adminName', $value['adminName']);
                 header('Location:index.php');
             }
             else{
                $alert = "Email và mật khẩu sai";
                return $alert;
             }
         }
     }
 }
?>