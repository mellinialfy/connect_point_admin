<?php

$instansi = $_POST['instansi'];
$id_instansi = $_POST['id_instansi'];

// include database connection file
include_once("connection.php");

if(isset($_POST["id_instansi"], $_POST["instansi"])) {
    //update  user data into table
    $result = mysqli_query($connect, "UPDATE tb_instansi SET instansi='$instansi', updated_at=NOW() WHERE id_instansi='$id_instansi'") or die(mysqli_error($connect));

} else {
    
}

// $check = mysqli_num_rows(mysqli_query($connect, "SELECT kategori_event FROM tb_kategori_event WHERE kategori_event='$kategori_event'"));
// if($check > 0) {
    
// } else{
    
// }


header("location:/connect-point/api/?page=instansi");
?>