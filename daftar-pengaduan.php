<?php 
require 'function/home/function.php';


include 'template/home/header.php';
include 'template/home/navbar.php';

cekLogin();

$dataPengaduan = getPengaduan($_SESSION['id']);

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
        
        <?php if(!isset($_SESSION['alert'])) {
          $_SESSION['alert'] = FALSE;
        } ?>

        <?php if($_SESSION['alert'] == TRUE) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
            unset($_SESSION['alert']);; 
            endif; ?> 
  
          <div class="section-header">
            <h2>Daftar Pengaduan Anda</h2>
            <p>Silahkan isi pengaduan anda melalui form di bawah ini, lengkapi dengan foto pengaduan anda.</p>
          </div>
  
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Isi Pengaduan</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            
            <?php 
            $i = 1;
            foreach($dataPengaduan as $dp) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $dp['isi']; ?></td>
                <td><?= date('d F Y', strtotime($dp['tgl_pengaduan'])); ?></td>
                <td><?php if($dp['status'] == 1) : ?>
                  <span class="badge bg-warning text-dark">Proses</span>
                  <?php elseif($dp['status'] == 2) : ?>
                  <span class="badge bg-success">Sudah Ditanggapi</span>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="detail-pengaduan.php?data=<?= encryptID($dp['id_pengaduan']); ?>" class="btn btn-primary">Detail</a>
                  <?php if($dp['status'] == 1) : ?>
                  <a href="function/home/delete-pengaduan.php?data=<?= encryptID($dp['id_pengaduan']); ?>" onclick="confirm('Anda Yakin Hapus Data!')" class="btn btn-danger">Hapus</a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
             
            </tbody>
          </table>
  
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php 

include 'template/home/footer.php';

?>
