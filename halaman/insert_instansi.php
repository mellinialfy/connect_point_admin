<?php

$instansi = $_POST['instansi'];
$id_requested_instansi = $_POST['id_requested_instansi'];


// include database connection file
include_once("connection.php");

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }

// Insert user data into table
$result = mysqli_query($connect, "INSERT INTO tb_instansi(instansi, created_at) VALUES('$instansi', NOW())");

if(isset($_POST['id_requested_instansi'])) {
    $update = mysqli_query($connect, "UPDATE tb_requested_instansi SET status_requested=1 WHERE id_requested_instansi=$id_requested_instansi");
}



header("location:/connect-point/api/?page=instansi");
?>