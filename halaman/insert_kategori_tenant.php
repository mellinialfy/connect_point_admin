<?php

$kategori_tenant = $_POST['kategori_tenant'];
$id_req_kat_tenant = $_POST['id_req_kat_tenant'];

// include database connection file
include_once("connection.php");

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_tenant FROM tb_kategori_tenant WHERE kategori_tenant='$kategori_tenant'"));
// if($check > 0) {
    
// } else{
    
// }

// Insert user data into table
$result = mysqli_query($connect, "INSERT INTO tb_kategori_tenant(kategori_tenant, created_at) VALUES('$kategori_tenant', NOW())");

if(isset($_POST['id_req_kat_tenant'])) {
    
    $update = mysqli_query($connect, "UPDATE tb_req_kat_tenant SET status_req_kat_tenant=1 WHERE id_req_kat_tenant=$id_req_kat_tenant");
    
}

header("location:/connect-point/api/?page=kategori_tenant");
?>