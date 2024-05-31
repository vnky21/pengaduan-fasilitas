<?php

$url = $_GET['status'];
if($url === 'proses'){
    $status = 1;
    $header = "Data Pengaduan Proses";

}elseif ($url === 'ditanggapi'){
    $status = 2;
    $header = "Data Pengaduan Telah Ditanggapi";
}else{
    header("Location: index.php");
    exit;
}


include '../template/admin/header.php';
$data = getPengaduanByStatus($status);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $header; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan Mahasiswa</h6>
    </div>
    
    <div class="card-body">
    <?php if(!isset($_SESSION['alert'])) {
          $_SESSION['alert'] = FALSE;
        } ?>

        <?php if($_SESSION['alert'] == TRUE) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php 
            unset($_SESSION['alert']);; 
            endif; ?> 

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Gambar</th>
                <th scope="col">Isi Pengaduan</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            
            <?php 
            $i = 1;
            foreach($data as $dp) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><a href="../img-laporan/<?= $dp['gambar']; ?>" target="_blank"><img src="../img-laporan/<?= $dp['gambar']; ?>" style="max-width: 150px;" alt="das"></a></td>
                <td><?= $dp['isi']; ?></td>
                <td><?= date('d F Y', strtotime($dp['tgl_pengaduan'])); ?></td>
                <td><?php if($dp['status'] == 1) : ?>
                  <span class="badge bg-warning text-dark">Proses</span>
                  <?php elseif($dp['status'] == 2) : ?>
                  <span class="badge bg-success text-white">Sudah Ditanggapi</span>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="detail-pengaduan.php?data=<?= encryptID($dp['id_pengaduan']); ?>&status=<?= $url; ?>" class="btn btn-primary"><i class="bi bi-chat-square-text-fill"></i></a>
                  <?php if($dp['status'] == 1) : ?>
                  <a href="function/home/delete-pengaduan.php?data=<?= encryptID($dp['id_pengaduan']); ?>" onclick="confirm('Anda Yakin Hapus Data!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
             
            </tbody>
            </table>
        </div>
    </div>
</div>



<?php
include '../template/admin/footer.php';
?>
