<?php

$kategori_tenant = $_POST['kategori_tenant'];
$id_kategori_tenant = $_POST['id_kategori_tenant'];

// include database connection file
include_once("connection.php");

if(isset($_POST["id_kategori_tenant"], $_POST["kategori_tenant"])) {
    //update  user data into table
    $result = mysqli_query($connect, "UPDATE tb_kategori_tenant SET kategori_tenant='$kategori_tenant', updated_at=NOW() WHERE id_kategori_tenant='$id_kategori_tenant'") or die(mysqli_error($connect));

} else {
    
}

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }


header("location:/connect-point/api/?page=kategori_tenant");
?>