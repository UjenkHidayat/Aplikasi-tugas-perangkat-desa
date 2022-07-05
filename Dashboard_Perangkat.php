<?php
session_start();
if (!isset($_SESSION["Login"])){
    header("Location:index.php");
    exit;


}



include "00_KoneksiDatabase.php";



 
?>

<?php
#
# Function Format Tanggal by SmartDevTala
#
function formatTanggal($date){
 // ubah string menjadi format tanggal
 return date('d-m-Y', strtotime($date));
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Agenda Desa</title>
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
                    <li class="nav-item"><a class="nav-link" href="Dashboard_Perangkat.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="TambahTugasPerangkat.php"><i class="fas fa-edit"></i><span>Buat Tugas Baru</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="TugasBelumDisetujui.php"><i class="fas fa-clipboard-list"></i><span>Tugas Belum Disetujui</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="TugasBelumSelesaiPerangkat.php"><i class="fas fa-clipboard-list"></i><span>Tugas Belum Selesai</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="TugasSelesaiPerangkat.php"><i class="far fa-check-circle"></i><span>Tugas Selesai</span></a></li>
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
                                </div>
                            </li>
                           
                            
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard Perangkat Desa</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Tugas belum selesai</span></div>

                                            <?php
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasBelum = "select count(UraianTugas) as `Jumlah`from `tugas` where `Status`='Belum Selesai'  and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasBelum); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                            //if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                                            while($data = mysqli_fetch_array($sql)){
                                            
                                           ?>




                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data['Jumlah'];?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                            <?php }?>


                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Tugas Sudah Selesai</span></div>


                                            <?php
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasSelesai = "select count(UraianTugas) as `Jumlah`from `tugas` where `Status`='Selesai'  and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasSelesai); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                            //if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                                            while($data = mysqli_fetch_array($sql)){
                                            
                                           ?>


                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data['Jumlah'];?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <?php }?>


                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>tugas terlewatkan</span></div>

                                              <?php
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTerlewat = "select count(UraianTugas) as `Jumlah`from `tugas` where `TanggalAkhir` < curdate() and status ='Belum Selesai'  and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTerlewat); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                            //if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                                            while($data = mysqli_fetch_array($sql)){
                                            
                                           ?>

                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php echo $data['Jumlah'];?></span></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }?>

                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Total tugas</span></div>

                                            <?php
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas`  where `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                            //if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                                            while($data = mysqli_fetch_array($sql)){
                                            
                                           ?>

                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data['Jumlah'];?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <?php }?>

                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Grafik Tugas Belum Selesai</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                     <?php // hitung jumlah tugas sekdes untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Sekdes' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugassekdes=$data['Jumlah'];
                                           }
                                           ?>


                                              <?php // hitung jumlah tugas kaur keuangan untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Keuangan' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskaurkeuangan=$data['Jumlah'];
                                           }
                                           ?>

                                            <?php // hitung jumlah tugas kaur renca untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Perencanaan' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskaper=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kaur umum untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Umum' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskarum=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kasi pem untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Pemerintahan' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskapem=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kasi pelayanan untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Pelayanan' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskapel=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kesra renca untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Kesra' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskesra=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kaur renca untuk ditampilkan pada grafik batang
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kadus' and `Status`='Belum Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugaskadus=$data['Jumlah'];
                                           }
                                           ?>




                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Sekdes&quot;,&quot;Kaur Keuangan&quot;,&quot;Kaur Renca&quot;,&quot;Kaur Umum&quot;,&quot;Kasi Pem&quot;,&quot;Kasi Pelayanan&quot;,&quot;Kasi Kesra&quot;,&quot;Kadus 1&quot;,&quot;Kadus 2&quot;,&quot;Kadus 3&quot;,&quot;Kadus 4&quot;,&quot;Kadus 5 &quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Jumlah Tugas&quot;,&quot;backgroundColor&quot;:&quot;rgb(144,159,238)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;,&quot;data&quot;:


                                        [&quot;<?php echo $jumlahtugassekdes?>&quot;,&quot;<?php echo $jumlahtugaskaurkeuangan?>&quot;,&quot;<?php echo $jumlahtugaskaper?>&quot;,&quot;<?php echo $jumlahtugaskarum?>&quot;,&quot;<?php echo $jumlahtugaskapem?>&quot;,&quot;<?php echo $jumlahtugaskapel?>&quot;,&quot;<?php echo $jumlahtugaskesra?>&quot;,&quot;<?php echo $jumlahtugaskadus?> &quot;]}]}



                                        ,&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false,&quot;fontColor&quot;:&quot;#ef1414&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Grafik Tugas Selesai</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>

                                  <?php // hitung jumlah tugas sekdes untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Sekdes' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaisekdes=$data['Jumlah'];
                                           }
                                           ?>


                                              <?php // hitung jumlah tugas kaur keuangan untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Keuangan' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikaurkeuangan=$data['Jumlah'];
                                           }
                                           ?>

                                            <?php // hitung jumlah tugas kaur renca untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Perencanaan' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikaper=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kaur umum untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kaur Umum' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikarum=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kasi pem untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Pemerintahan' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikapem=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kasi pelayanan untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Pelayanan' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikapel=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kesra renca untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kasi Kesra' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikesra=$data['Jumlah'];
                                           }
                                           ?>

                                              <?php // hitung jumlah tugas kaur renca untuk ditampilkan pada grafik Donat
                                            // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                            $TugasTotal = "select count(UraianTugas) as `Jumlah`from `tugas` where `PenanggungJawab`='Kadus' and `Status`='Selesai'"; // Tampilkan semua data tugas
                                            $sql = mysqli_query($connection, $TugasTotal); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                           
                                            while($data = mysqli_fetch_array($sql)){
                                                $jumlahtugasselesaikadus=$data['Jumlah'];
                                           }
                                           ?>

                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Sekdes&quot;,&quot;Kaur Keuangan&quot;,&quot;Kaur Perencanaan&quot;,&quot;Kaur Umum&quot;,&quot;Kasi Pemerintahan&quot;,&quot;Kasi Pelayanan&quot;,&quot;Kasi Kesra&quot;,&quot;Kadus&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#FE7C7C&quot;,&quot;#F97DB8&quot;,&quot;#11c1ee&quot;,&quot;#955EFB&quot;,&quot;#F8C506&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:
                                        [&quot;<?php echo $jumlahtugasselesaisekdes?>&quot;,&quot;<?php echo $jumlahtugasselesaikaurkeuangan?>&quot;,&quot;<?php echo $jumlahtugasselesaikaper?>&quot;,&quot;<?php echo $jumlahtugasselesaikarum?>&quot;,&quot;<?php echo $jumlahtugasselesaikapem?>&quot;,&quot;<?php echo $jumlahtugasselesaikapel?>&quot;,&quot;<?php echo $jumlahtugasselesaikesra?>&quot;,&quot;<?php echo $jumlahtugasselesaikadus?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas></div>
                                    <div class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>&nbsp;Sekdes</span><span class="mr-2"><i class="fas fa-circle text-success"></i>&nbsp;Kaur keuangan</span><span class="mr-2"><i class="fas fa-circle" style="color: #FE7C7C"></i>&nbsp;kaur Perencanaan</span><br><span class="mr-2"><i class="fas fa-circle" style="color: #F97DB8"></i>&nbsp;kaur Umum</span><span class="mr-2"><i class="fas fa-circle" style="color: #11c1ee"></i>&nbsp;kasi Pemeritahan</span><span class="mr-2"><i class="fas fa-circle" style="color: #955EFB"></i>&nbsp;kasi Pelayanan</span><span class="mr-2"><i class="fas fa-circle" style="color: #F8C506"></i>&nbsp;kasi Kesra</span><span class="mr-2"><i class="fas fa-circle" style="color: #CECFCF"></i>&nbsp;kadus</span></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Tugas Dalam Waktu Dekat</h6>
                                </div>
                                <div class="card-body">
                                   <?php 
                                    // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                    
                                   
                                    $query = "select *from tugas WHERE `Status`='Belum Selesai' and `TanggalAkhir` between curdate() and curdate()+7  and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC "; // Tampilkan semua data tugas
                                    $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
                                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                    ?>

                                   <?php
                                    $i=0;
                                    $No=0; //Variabel untuk menampilkan nomor urut barang di struk
                                     while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                     $No ++;

                                    ?>
                                    
                                     

                                     <?php 
                                        $date=$data['TanggalAkhir'];
     
                                         //hitung sisa hari
                                      $date1=date_create(date('d-m-Y'));
                                      $date2=date_create($date);
                                      $diff=date_diff($date1,$date2);
                                    ?>

                                    <h4 class="small font-weight-bold"><?php echo $data['UraianTugas']?><span class="float-right"><?php echo  $diff->format("%R%a Hari") ?></span></h4><hr><?php }?>

                                </div>
                            </div>
                        </div>
                    </div>

                                        <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Tugas Yang Terlewat</h6>
                                </div>
                                <div class="card-body">
                                   <?php 
                                    // $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
                                 
                                   
                                    $query = "select *from tugas WHERE `Status`='Belum Selesai' and `TanggalAkhir` < curdate()  and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
                                    $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
                                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                    ?>

                                   <?php
                                    $i=0;
                                    $No=0; //Variabel untuk menampilkan nomor urut barang di struk
                                     while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                     $No ++;

                                    ?>
                                    
                                     

                                     <?php 
                                        $date=$data['TanggalAkhir'];
     
                                         //hitung sisa hari
                                      $date1=date_create(date('d-m-Y'));
                                      $date2=date_create($date);
                                      $diff=date_diff($date1,$date2);
                                    ?>

                                    <h4 class="small font-weight-bold"><?php echo $data['UraianTugas']?><span class="float-right"><?php echo  $diff->format("%R%a Hari") ?></span></h4><hr><?php }?>

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