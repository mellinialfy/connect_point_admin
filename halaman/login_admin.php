<?php

include "connection.php";
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
 
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
if( isset($_SESSION['email_admin'],$_SESSION['id_admin'])) header("location:/connect-point/api/index.php");

// menghilangkan backshlases
$email = stripslashes($_POST['email']);
//cara sederhana mengamankan dari sql injection
$email = mysqli_real_escape_string($connect, $email);
 // menghilangkan backshlases
$password = stripslashes($_POST['password']);
 //cara sederhana mengamankan dari sql injection
$password = mysqli_real_escape_string($connect, $password);


//cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
// if(!empty(trim($email)) && !empty(trim($password))){

    //select data berdasarkan email dari database
    $query      = "SELECT * FROM tb_admin WHERE email_admin = '$email'";
    $result     = mysqli_query($connect, $query) or die (mysqli_error($connect));
    $rows       = mysqli_num_rows($result);
    
    if ($rows != 0) {
        $data = mysqli_fetch_assoc($result);
        $hash   = $data['password_admin'];
        if(password_verify($password, $hash)){
            $_SESSION['email_admin'] = $email;
            $_SESSION['id_admin'] = $data['id_admin'];
            $error =  'no error';
            echo $error;
            
        } else {
            $error =  'Password salah. Silakan coba lagi';
            echo $error;
        }                
    //jika gagal maka akan menampilkan pesan error
    } else {
        $error =  'Email belum terdaftar. Silakan lakukan register';
        echo $error;
    }
     
// }else {
//     $error =  'Data tidak boleh kosong !!';
// }
// } 

?>