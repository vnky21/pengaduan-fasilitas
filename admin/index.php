<?php 


include 'data-index.php';
include '../template/admin/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Total Data Laporan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rowTotalPengaduan['total'] ?> Data</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-megaphone-fill" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Data Laporan Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rowPengaduanHariIni['total']; ?> Data</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-calendar2-event-fill" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Laporan Belum Ditanggapi
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rowBelumDItanggapi['total']; ?> Data</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-archive-fill" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Mahasiswa
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rowDataMahasiswa['total'] ?> Akun</div>
                    </div>
                    <div class="col-auto">
                    
                    <i class="bi bi-people-fill" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Total Pengaduan per Bulan dalam Tahun <?= date('Y')?></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart" width="500" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Sudah Ditanggapi vs Belum Ditanggapi</h6>
            
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Belum Ditanggapi
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Sudah Ditanggapi
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!-- /.container-fluid -->

<?php include '../template/admin/footer.php'; ?>