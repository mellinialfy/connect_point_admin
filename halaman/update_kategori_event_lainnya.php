<?php

$id_event = $_POST['id_event'];
$verified_by = $_POST['verified_by'];
$kategori = $_POST['exampleSelect1'];
// $status_user = $_POST['status_user'];
// echo $kategori;
// echo $id_event;
// include database connection file
include_once("connection.php");

// if($_POST['status_user'] == '0') {
    //update  user data into table
    
    
    $result = mysqli_query($connect, "UPDATE tb_event SET status_publish='$kategori' WHERE id_event='$id_event'") or die(mysqli_error($connect));
    
    header("location:/connect-point/api/?page=kategori_acara");

// } else {
//     $result = mysqli_query($connect, "UPDATE tb_user SET status_user='$status_user', verified_by='$verified_by', verified_at=NOW() WHERE id_user='$id_user'") or die(mysqli_error($connect));
//     // echo $id_user;
// }



?>