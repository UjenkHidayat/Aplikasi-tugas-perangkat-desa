<?php
session_start();
if (!isset($_SESSION["Login"])){
	header("Location:index.php");
	exit;


}

include "00_KoneksiDatabase.php";

$Id=$_GET['Id'];

$QueryUbah = mysqli_query($connection," UPDATE `tugas` SET `Status`='Selesai' WHERE Id=$Id" );

if(QueryHapus){
 header("location:TugasBelumSelesai.php"); // Redirectke halaman index.php

 }
else{
echo "Perubahan Data Telah Gagal!";
header("Location:TugasBelumSelesai.php");
}
    
?>









