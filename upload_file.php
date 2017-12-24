<?php
function upload_file(){ 
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         //move_uploaded_file($file_tmp,"images/".$file_name);
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
//$query=$link->query("UPDATE POST SET Image='$imagetmp' where PostID='$postID'");
return $image;
         //echo "Success";
      }else{
         print_r($errors);

      }
   }
   return empty($errors);
}
?>