<?php
/**
* Format Class
*/
class Format{
 public function formatDate($date){
    return date('d/m/Y', strtotime($date));
 }

 public function textShorten($text, $limit = 400){
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text.".....";
    return $text;
 }
 public function formatMoney($money){
   return number_format($money, 0, '', ',').' VNĐ';
 }
 public function validation($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 function generateRandomString($length) 
 {
   return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 }
 function remove_vn ($str){
   $unicode = array(
       'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
       'd'=>'đ',
       'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
       'i'=>'í|ì|ỉ|ĩ|ị',
       'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
       'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
       'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
       'D'=>'Đ',
       'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
       'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
       'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
       'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
       'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
   );
   
  foreach($unicode as $nonUnicode=>$uni){
       $str = preg_replace("/($uni)/i", $nonUnicode, $str);
  }
 return $str;
}
 public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
     $title = 'home';
    }elseif ($title == 'contact') {
     $title = 'contact';
    }
    return $title = ucfirst($title);
   }
}
?>