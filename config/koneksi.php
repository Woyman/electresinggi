<?php 

$db = "elektre_singgi";

$konek = mysqli_connect('localhost', 'root','', $db);

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>