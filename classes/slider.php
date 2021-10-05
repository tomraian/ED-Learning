<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class slider
 {
     private $db;
     private $fm; 
     public function __construct()
     {
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function insert_slider()
     {
         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['sliderImage'] ['name'];
         $file_size = $_FILES['sliderImage'] ['size'];
         $file_temp = $_FILES['sliderImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
        //  kiểm tra lỗi 
         if(empty($file_name)) {
             $alert = '<span class="warning-message">Hình ảnh người không được để trống</span>';
            return $alert;
         }
         else if(in_array($file_ext, $permitted) === false)
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
            return $alert;
        }
         else{
            move_uploaded_file($file_temp,$uploaded_image);
             $query = "INSERT INTO tbl_slider (sliderImage) VALUES ('$unique_image')";
             $result  = $this->db->insert($query);
             if($result){
                 $alert = '<span class="success-message">Thêm thành công</span>';
                 return $alert;
             }
             else{
                $alert = '<span class="warning-message">Thêm thất bại</span>';
                return $alert;
             }
         }
     }
     public function show_slider(){
         $query = "SELECT * FROM tbl_slider ORDER BY sliderID DESC" ;
         $result = $this->db->select($query);
         return $result; 
     }
     public function getsliderById($Id){
        $query = "SELECT * FROM tbl_slider WHERE sliderID = '$Id' ";
        $result = $this->db->select($query);
        return $result; 
     }
     public function update_slider($Id)
     {

         $permitted = array('jpg', 'jpeg', 'png' , 'gif');
        
         $file_name = $_FILES['sliderImage'] ['name'];
         $file_size = $_FILES['sliderImage'] ['size'];
         $file_temp = $_FILES['sliderImage'] ['tmp_name'];
         
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0 , 10).$this->fm->generateRandomString(10).'.'.$file_ext;
         $uploaded_image = "../uploads/".$unique_image;
       //  kiểm tra lỗi 
        if (empty($file_name)){
            $alert = '<span class="warning-message">Ảnh không được để trống</span>"';
            return $alert;
        }
        else if(in_array($file_ext, $permitted) === false)
        {
            $alert = '<span class="warning-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</span>";
            return $alert;
        }
        else{
           move_uploaded_file($file_temp,$uploaded_image);
            $query = "UPDATE tbl_slider SET sliderImage = '$unique_image' WHERE sliderId = '$Id'";
            $result  = $this->db->update($query);
            if($result){
                $alert = '<span class="success-message">Thêm thành công</span>';
                return $alert;
            }
            else{
               $alert = '<span class="warning-message">Thêm thất bại</span>';
               return $alert;
            }
        }
     }
     public function del_slider($Id)
     {
      $query = "DELETE FROM tbl_slider WHERE sliderID = '$Id' ";
      $result = $this->db->delete($query);
      if($result)
      {
         $alert = '<span class="success-message">Xóa slider thành công</span>';
          return $alert;
      }
      else{
         $alert = '<span class="warning-message">Xóa slider thất bại</span>';
         return $alert;
      }
     }
     public function get_slider(){
        $query = "SELECT * FROM tbl_slider ORDER BY sliderID DESC LIMIT 8" ;
        $result = $this->db->select($query);
        return $result; 
    }
 }
?>