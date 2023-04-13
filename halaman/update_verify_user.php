<?php

$id_user = $_POST['id_user'];
$verified_by = $_POST['verified_by'];
$message_reason = $_POST['message_reason'];
$status_user = $_POST['status_user'];

// include database connection file
include_once("connection.php");

if($_POST['status_user'] == '0') {
    //update  user data into table
    $result = mysqli_query($connect, "UPDATE tb_user SET status_user='$status_user', verified_by='$verified_by', verify_reason='$message_reason', verified_at=NOW() WHERE id_user='$id_user'") or die(mysqli_error($connect));
    
    header("location:/connect-point/api/?page=tenant&id=$id_user");

} else {
    $result = mysqli_query($connect, "UPDATE tb_user SET status_user='$status_user', verified_by='$verified_by', verified_at=NOW() WHERE id_user='$id_user'") or die(mysqli_error($connect));
    // echo $id_user;
}



?>