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
    <title>Profile - Brand</title>
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
                    <h3 class="text-dark mb-4">Tugas Belum Selesai</h3>
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
                                <div class="col" >
                                
                                      
                                    </div>
                                  </div>





                            </div>

                        </div>
                        <!-- form input mulai dari sini -->
                                            <div class="table-responsive">
                                                    <table class="table-sm table-bordered">
                                                        <thead class="thead-dark">
                                                          <tr align="center" >
                                                            <th>No</th>
                                                            <th>Uraian Tugas</th>
                                                            <th>Penanggung Jawab</th>
                                                            <th>Tanggal Akhir</th>
                                                            <th>Status Tugas</th>
                                                            <th>Sisa Hari</th>
                                                           
                                                          </tr>
                                                        </thead>

                                                        <?php

// $query = "select Id,Bulan, sum(Pendapatan) as total from coba group by Bulan order by Id Asc";
$query = "select *from tugas WHERE `Status`='Belum Selesai'and `Penanggungjawab`='".$_SESSION['Jabatan']."' and `KodeDesa`='".$_SESSION['KodeDesa']."' order by TanggalAkhir ASC"; // Tampilkan semua data tugas
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

        <tr>
        <td><?php echo $No?></td>
        <td><?php echo $data['UraianTugas']?></td>
        <td><?php echo $data['Penanggungjawab']?></td>
        <?php 
          $date=$data['TanggalAkhir']
        ?>
        <td><?php echo formatTanggal ($date) ?></td>
        <td><?php echo $data['Status']?></td>


        <?php 
        //hitung sisa hari
          $date1=date_create(date('d-m-Y'));
          $date2=date_create($date);
          $diff=date_diff($date1,$date2);
        ?>

        <td> <?php echo  $diff->format("%R%a Hari") ?></td>

       
      </tr>

</div>
<?php
}

}
?>    


                                                

                                            </table>
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