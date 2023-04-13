<?php

$id = $_GET['id'];

// include database connection file
include_once("connection.php");

if(isset($_GET["id"])) {
    //update  user data into table
    $result = mysqli_query($connect, "UPDATE tb_requested_instansi SET status_requested=2 WHERE id_requested_instansi='$id'") or die(mysqli_error($connect));

} else {
    // echo "gaada data";
}

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }


header("location:/connect-point/api/?page=instansi");
?>