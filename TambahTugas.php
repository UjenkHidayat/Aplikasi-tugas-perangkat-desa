<?php
session_start();
if (!isset($_SESSION["Login"])){
    header("Location:index.php");
    exit;

//$Level=$_SESSION["Level"];

}



include "00_KoneksiDatabase.php";
 
?>

<?php 

if(isset($_POST['Simpan'])){
$Uraian=$_POST["Uraian"];
$PenanggungJawab=$_POST["PenanggungJawab"];
$TanggalAkhir=$_POST["TanggalAkhir"];



$QueryInput = mysqli_query($connection," Insert Into `tugas` (`Id`, `UraianTugas`, `TanggalAkhir`, `Penanggungjawab`, `Status`) VALUES (NULL, '$Uraian','$TanggalAkhir', '$PenanggungJawab', 'Belum Selesai')" );




 if(QueryInput){
 header("location:TugasBelumSelesai.php"); // Redirectke halaman index.php
  echo $Uraian;
 }
else{
echo "Perubahan Data Telah Gagal!";
header("Location:TambahTugas.php");
}
    

}



 
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tambah Tugas - Agenda Desa</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-calendar-alt"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>agenda desa</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="TambahTugas.php"><i class="fas fa-edit"></i><span>Buat Tugas Baru</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="TugasBelumSelesai.php"><i class="fas fa-clipboard-list"></i><span>Tugas Belum Selesai</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="TugasSelesai.php"><i class="far fa-check-circle"></i><span>Tugas Selesai</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                
                         
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Ujang RH</span><img class="border rounded-circle img-profile" src="assets/img/avatars/aku.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Tugas Baru</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Rincian Tugas</p>
                                        </div>
                                        <div class="card-body">




                                            <!-- form input mulai dari sini -->
                                            <form action="" method="Post">

                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="Uraian"><strong>Uraian Tugas</strong></label>
                                                            <input class="form-control" type="text" id="Uraian" name="Uraian" uraian="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="PenanggungJawab"><strong>Penanggung Jawab</strong></label>
                                                            <input class="form-control" type="text" name="PenanggungJawab" id="PenanggungJawab">
                                                        </div>


                                                        <label for="TanggalAkhir"><strong>Tanggal Akhir</strong><br></label><input class="form-control d-lg-flex m-auto justify-content-lg-center align-items-lg-end"  type="date" name="TanggalAkhir">
                                                    </div>
                                                </div>

                                                <div class="form-group"></div>
                                              
                                                <input type="submit" name="Simpan" value="Simpan" class="btn-sm btn-primary">

                                                <?php echo "Kode Desa = ".$_SESSION['KodeDesa'];?>
                                            </form>         



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Ujang Rahmat Hidayat | Tanjung Mulia</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>