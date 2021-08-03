<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class team
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function insert_team($teamName,$teamDesc)
     {
         $teamName = $this->fm->validation($teamName);
         $teamDesc = $this->fm->validation($teamDesc);

         $teamName = mysqli_real_escape_string($this->db->link, $teamName);
         $teamDesc = mysqli_real_escape_string($this->db->link, $teamDesc);

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['teamImage'] ['name'];
         $file_size = $_FILES['teamImage'] ['size'];
         $file_temp = $_FILES['teamImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
        //  kiểm tra lỗi 
         if(empty($teamName)) {
             $alert = '<span class="warning-message">Tên thành viên không được để trống</span>';
            return $alert;
         }
         else if(empty($teamDesc)) {
             $alert = '<span class="warning-message">Chức vụ người thành viên không được để trống</span>';
            return $alert;
         }
         else if(empty($file_name)) {
             $alert = '<span class="warning-message">Hình ảnh thành viên không được để trống</span>';
            return $alert;
         }
         else if(in_array($file_ext, $permitted) === false)
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
            return $alert;
        }
         else{
            move_uploaded_file($file_temp,$uploaded_image);
             $query = "INSERT INTO tbl_team (teamName,teamDesc,teamImage) VALUES ('$teamName','$teamDesc','$unique_image')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Thêm thành viên thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Thêm thành viên thất bại</span>';
                return $alert;
             }
         }
     }
     public function show_team(){
         $query = "SELECT * FROM tbl_team ORDER BY teamId DESC" ;
         $result = $this->db->select($query);
         return $result; 
     }
     public function getTeamById($Id){
        $query = "SELECT * FROM tbl_team WHERE teamId = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
     }
     public function update_team($teamName,$teamDesc,$Id)
     {
        $teamName = $this->fm->validation($teamName);
         $teamDesc = $this->fm->validation($teamDesc);

         $teamName = mysqli_real_escape_string($this->db->link, $teamName);
         $teamDesc = mysqli_real_escape_string($this->db->link, $teamDesc);

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['teamImage'] ['name'];
         $file_size = $_FILES['teamImage'] ['size'];
         $file_temp = $_FILES['teamImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
       //  kiểm tra lỗi 
       if(empty($teamName)) {
            $alert = '<span class="warning-message">Tên thành viên ED Team được để trống</span>';
            return $alert;
        }
        else if(empty($teamDesc)) {
            $alert = '<span class="warning-message">Chức vụ thành viên ED Team được để trống</span>';
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
                  $query = "UPDATE tbl_team SET teamName = '$teamName',teamDesc = '$teamDesc', teamImage = '$unique_image' WHERE teamId = '$Id'";
               }
            }   
            else{
                $query = "UPDATE tbl_team SET teamName = '$teamName',teamDesc = '$teamDesc' WHERE teamId = '$Id'";

            }
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Cập nhật thông tin thành viên ED Team thành công</span>';
                return $alert;
            }
            else{
               $alert = '<span class="warning-message">Cập nhật thông tin thành viên ED Team thất bại</span>';
               echo $result;
               return $alert;
            }
        }
     }
     public function del_team($Id)
     {
      $query = "DELETE FROM tbl_team WHERE teamId = '$Id' ";
      $result = $this->db->delete($query);
      if($result)
      {
         $alert = '<span class="success-message">Xóa thành viên ED Team thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Xóa thành viên ED Team thất bại</span>';
         return $alert;
      }
     }
     public function get_max()
     {
        $query = "SELECT MAX(teamId) FROM tbl_team";
        $result = $this->db->select($query);
        return $result; 
     }
     
 }
?>