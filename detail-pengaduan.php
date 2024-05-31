<?php 
require 'function/home/function.php';


include 'template/home/header.php';
include 'template/home/navbar.php';

cekLogin();

$data = getDetailPengaduan($_GET['data']);
?>
  <main id="main">

  

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
      </div>
    </div><!-- End Breadcrumbs -->
    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
        
          <div class="section-header">
            <h2>Daftar Pengaduan Anda</h2>
            <p>Silahkan isi pengaduan anda melalui form di bawah ini, lengkapi dengan foto pengaduan anda.</p>
          </div>
  
          <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div class="card">
                <img src="img-laporan/<?= $data['gambar']; ?>" class="card-img-top" alt="Gambar Pengaduan">
                    <div class="card-body">
                        
                        <p class="card-text"><b>Isi Pengaduan </b> <br>
                         <?= $data['isi'] ?></p>
                        <p class="card-text"><b>Tanggal Pengaduan: </b> <?= date('d F Y', strtotime($data['tgl_pengaduan'])); ?></p>
                        <p class="card-text">Status: 
                            <?php if($data['status'] == 1) : ?>
                                <span class="badge bg-warning text-dark">Proses</span>
                            <?php elseif($data['status'] == 2) : ?>
                                <span class="badge bg-success text-white">Sudah Ditanggapi</span>
                            <?php endif; ?>
                        </p>        
                        <hr>
                        <h5>Tanggapan:</h5>
                        <?php if($data['tanggapan'] !== NULL) : ?>
                        <p><?= $data['tanggapan']; ?></p>
                        <p class="card-text"><b>Tanggal: </b> <?= date('d F Y', strtotime($data['tgl_tanggapan'])); ?></p>
                        <?php else: ?>
                        <p>Pengaduan Belum Ditanggapi</p>
                        <?php endif; ?>
                        
                    </div>
                </div>
                <a href="daftar-pengaduan.php" class="btn btn-primary mt-3">Kembali</a>
                
            </div>
        </div>
  
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php 

include 'template/home/footer.php';

?>
