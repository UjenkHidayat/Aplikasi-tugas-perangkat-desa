<?php
session_start();
if (!isset($_SESSION["Login"])){
	header("Location:index.php");
	exit;


}

include "00_KoneksiDatabase.php";

$Id=$_GET['Id'];

$QueryHapus = mysqli_query($connection," delete From `tugas` where `Id`=$Id" );

if(QueryHapus){
 header("location:TugasBelumSelesai.php"); // Redirectke halaman index.php
  echo $Uraian;
 }
else{
echo "Perubahan Data Telah Gagal!";
header("Location:TugasBelumSelesai.php");
}
    
?>









