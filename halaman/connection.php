<?php
 
$server		= "localhost"; // sesuaikan alamat server anda
$user		= "astq3554_connect_point"; // sesuaikan user web server anda
$password	= "ZfgztBB0Yv}J"; // sesuaikan password web server anda
$database	= "astq3554_connect_point"; // sesuaikan database web server anda
	
	$connect = mysqli_connect($server, $user, $password) or die ("Koneksi gagal!");
	mysqli_select_db($connect, $database) or die ("Database belum siap!");
?>