<?php

$kategori_event = $_POST['kategori_event'];
$desc_kategori = $_POST['desc_kategori'];
$id_kategori_event = $_POST['id_kategori_event'];

// include database connection file
include_once("connection.php");

if(isset($_POST["id_kategori_event"], $_POST["kategori_event"])) {
    //update  user data into table
    $result = mysqli_query($connect, "UPDATE tb_kategori_event SET kategori_event='$kategori_event', desc_kategori='$desc_kategori', updated_at=NOW() WHERE id_kategori_event='$id_kategori_event'") or die(mysqli_error($connect));

} else {
    
}

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }


header("location:/connect-point/api/?page=kategori_acara");
?>