<?php
session_start();


if(isset($_POST['Login'])){
$Username=$_POST["Username"];
$Password=$_POST["Password"];



include "00_KoneksiDatabase.php";


$result= mysqli_query($connection,"Select * from `user` Where `Username`='$Username'");
if(mysqli_num_rows($result)===1){

//periksa apakah username ada di database?

	$row=mysqli_fetch_assoc($result);


	// periksa apakah pasword sudah benar
	
	if($Password==$row["Password"]){
		// set seeion login menjadi true
		$_SESSION["Login"]=true;

	
			//tambahkan pengkondisian disini...
			//Ambil data level pengguna kemudian jika level nya admin maka arahkan ke halaman dashboard admin
			//Jika levelnya perangkat maka arahkan ke halaman dashboard perangkat
			$query = "select *from `user` Where `Username`='$Username'"; // Tampilkan semua data tugas
			$sql = mysqli_query($connection, $query);
			 while($data = mysqli_fetch_array($sql)){
			 	$NamaPengguna=$data['Username'];
			 	$LevelPengguna=$data['Level'];
			 	$KodeDesa=$data['KodeDesa'];
			 	$Jabatan=$data['Jabatan'];

			 	
			 	$_SESSION["Username"]=$NamaPengguna;
				$_SESSION["KodeDesa"]=$KodeDesa;
				$_SESSION["Jabatan"]=$Jabatan;
				


			 	if ($LevelPengguna =='Administrator'){
			 		header("Location:dashboard.php");	
			 	}
			 	else {
			 		header("Location:dashboard_Perangkat.php");
			 	}


			 }


			//header("Location:dashboard.php");
		exit;

		}


	}

	$error=true;

	}
?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<body>

<div class="jumbotron text-center">
  <h1>APLIKASI AGENDA DESA</h1>
  <p>Desa Tanjung Mulia Kecamatan Bahar Selatan</p>
</div>

<div class="container" style="width: 350">
 


 <?php if (isset($error)):?>

<div class="alert alert-danger">
  <strong>Maaf!</strong> Username atau Password salah!
</div>
<?php endif; ?>
	

 <form action="" method="Post">
	<div class="form-group">
  		<label for="usr">Username:</label>
  		<input type="text" class="form-control" id="Username" name="Username">
	</div>
	
	<div class="form-group">
  		<label for="pwd">Password:</label>
  		<input type="password" class="form-control" id="Password" name="Password">
	</div>

	<div class="row">
		<div class="col-md"/><input type="submit" name="Login" class="btn btn-danger" value="Login"></div>

</form>		


	</div>




</div>



</body>
</html>