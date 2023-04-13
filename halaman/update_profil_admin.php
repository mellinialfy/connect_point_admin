<?php

$nama_lengkap = $_POST['nama_lengkap'];
$email_admin = $_POST['email_admin'];
$id_admin = $_POST['id_admin'];

// include database connection file
include_once("connection.php");
$msg="";
define('UPLOAD_PATH', '/connect-point/api/admin_profile_pict/');


// If upload button is clicked ...
// if (isset($_POST['submit'])) {
    
    if (!file_exists($_FILES['profile_pict']['tmp_name']) || !is_uploaded_file($_FILES['profile_pict']['tmp_name'])) {
        $result = mysqli_query($connect, "UPDATE tb_admin SET nama_lengkap='$nama_lengkap', email_admin='$email_admin', updated_at=NOW() WHERE id_admin='$id_admin'") or die(mysqli_error($connect));
        
    } else{ 
        $path_parts = pathinfo($_FILES["profile_pict"]["name"]);
        $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
        $image_path = preg_replace('/\s+/', '_', $image_path);
        
        $actualpath = "https://astungkarasarjana.com/connect-point/api/admin_profile_pict/";
        $filename = $actualpath . $image_path;
        
        //update  user data into table
        $result = mysqli_query($connect, "UPDATE tb_admin SET nama_lengkap='$nama_lengkap', email_admin='$email_admin', profile_pict='$filename', updated_at=NOW() WHERE id_admin='$id_admin'") or die(mysqli_error($connect));
        
        if(move_uploaded_file($_FILES["profile_pict"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']. UPLOAD_PATH . $image_path)){
           $msg = "Image uploaded successfully";
            
        }else{
            $msg = "Failed to upload image";
            
        }
        
    }
// } else {
    
// }


header("location:/connect-point/api/?page=profil");
?>
