<?php

$kategori_event = $_POST['kategori_event'];
$desc_kategori = $_POST['desc_kategori'];
$id_req_kat_event = $_POST['id_req_kat_event'];

// include database connection file
include_once("connection.php");

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }

// Insert user data into table
$result = mysqli_query($connect, "INSERT INTO tb_kategori_event(kategori_event, desc_kategori, created_at) VALUES('$kategori_event', '$desc_kategori', NOW())");

if(isset($_POST['id_req_kat_event'])) {
    
    $update = mysqli_query($connect, "UPDATE tb_req_kat_event SET status_req_kat_event=1 WHERE id_req_kat_event=$id_req_kat_event");
    
}

header("location:/connect-point/api/?page=kategori_acara");
?>