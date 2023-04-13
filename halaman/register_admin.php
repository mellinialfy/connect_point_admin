<?php
    //menyertakan file program connection.php pada register
    include "connection.php";
    //inisialisasi session
    session_start();
    
    $error = '';
    
    //mengecek apakah form registrasi di submit atau tidak
    // if(isset($_POST['fullname']) ){
        //cara sederhana mengamankan dari sql injection
        $fullname     = stripslashes($_POST['fullname']);
        $fullname     = mysqli_real_escape_string($connect, $fullname);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($connect, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $rpassword   = stripslashes($_POST['rpassword']);
        $rpassword   = mysqli_real_escape_string($connect, $rpassword);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        // if(!empty(trim($fullname)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($rpassword))){
            
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $rpassword){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if(cek_email($email,$connect) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    
                    //insert data ke database
                    $query = "INSERT INTO tb_admin (nama_lengkap,email_admin, password_admin, created_at) VALUES ('$fullname','$email','$pass', NOW())";
                    $result   = mysqli_query($connect, $query) or die (mysqli_error($connect));
                //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                if ($result) {
                    // $_SESSION['email'] = $email;
                    
                    // header('Location: index.php');
                    echo "Register berhasil. Silakan lakukan Log in";
                 
                //jika gagal maka akan menampilkan pesan error
                } else {
                    $error =  'Register Admin Gagal';
                    echo $error;
                }
            }else{
                    $error =  'Email sudah terdaftar';
                    echo $error;
            }
        }else{
            $error = 'Password tidak sama';
            echo $error;
        }
         
    // }else {
        // $error =  'Data tidak boleh kosong';
    // }
    
// } 
//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cek_email($email,$connect){
    $email = mysqli_real_escape_string($connect, $email);
    $query = "SELECT * FROM tb_admin WHERE email_admin = '$email'";
    if( $result = mysqli_query($connect, $query) ) return mysqli_num_rows($result);
}
?>