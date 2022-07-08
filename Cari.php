<?php
session_start();
if (!isset($_SESSION["Login"])){
	header("Location:index.php");
	exit;


}



include "00_KoneksiDatabase.php";
 
?>


<html>
<head>
	<title>Bootstrap Part 1 : Pengertian dan Cara Menggunakan Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>




<body>

<div class="jumbotron text-center" style="height: 180">
  <h1>APLIKASI AGENDA DESA</h1>
  <p>Desa Tanjung Mulia Kecamatan Bahar Selatan</p>
</div>


	<div class="container">


<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end" >

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="Beranda.php">Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="TugasSelesai.php">Tugas sudah Selesai</a>
    </li>
   

 </ul>
</nav>

<p></p>

  <h4>Daftar Kegiatan Desa</h4>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr >
        <th>No</th>
        <th>Uraian Tugas</th>
        <th>Penanggung Jawab</th>
        <th>Tanggal Akhir</th>
        <th>Status Tugas</th>
        <th>Pilihan</th>
      </tr>
    </thead>

<?php
$Penanggungjawab=$_POST["Penanggungjawab"];
// $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
$query = "select *from tugas WHERE `Penanggungjawab`Like '%$Penanggungjawab%'"; // Tampilkan semua data tugas
$sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

?>

<?php
$i=0;
$No=0; //Variabel untuk menampilkan nomor urut barang di struk
 while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
 $No ++;

?>


    <tbody>

      	
        <td><?php echo $No?></td>
        <td><?php echo $data['UraianTugas']?></td>
        <td><?php echo $data['Penanggungjawab']?></td>
        <td><?php echo $data['TanggalAkhir']?></td>
        <td><?php echo $data['Status']?></td>

        <td  width=16% align="center"><a class="pilihan" href='UbahStatus.php?Id=<?php echo $data['Id']; ?>'> <img src="images/Ikon_ubah.png"></a> <a class="pilihan" href='UbahStatus.php?Id=<?php echo $data['Id']; ?>'> <img src="images/Ikon_selesai.png"></a>  <a class="pilihan" href="HapusData.php ?Id=<?php echo $data['Id'] ?>"><img src="images/Ikon_hapus.png"></a>  </td>
      </tr>

</div>
<?php
}

}
?>    
</tbody>
</table>

</div>
</body>

<form action="TambahTugas.php" action="Post">

<button type="submit" class="btn-sm btn-success">Tambah Tugas</button>	
</form>

tpppp
