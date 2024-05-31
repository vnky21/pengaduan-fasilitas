<?php

$url = $_GET['status'];
if($url === 'proses'){
    $status = 1;

}elseif ($url === 'ditanggapi'){
    $status = 2;

}else{
    header("Location: index.php");
    exit;
}

include '../template/admin/header.php';
if($url === 'proses'){
    $data = getPengaduanProsesById($_GET['data']);

}elseif ($url === 'ditanggapi'){
    $data = getPengaduanDitanggapiById($_GET['data']);

}


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan Mahasiswa</h6>
        </div>
        <div class="card-body">

            <div class="card">
                <img src="../img-laporan/<?= $data['gambar']; ?>" style="max-width: 550px;"
                    class="card-img-top img-thumbnail" alt="Gambar Pengaduan">
                <div class="card-body">
                    <p class="card-text"><b>Isi Pengaduan </b> <br>
                        <?= $data['isi'] ?></p>
                    <p class="card-text"><b>Tanggal Pengaduan: </b>
                        <?= date('d F Y', strtotime($data['tgl_pengaduan'])); ?></p>
                    <p class="card-text">Status:
                        <?php if($data['status'] == 1) : ?>
                        <span class="badge bg-warning text-dark">Proses</span>
                        <?php elseif($data['status'] == 2) : ?>
                        <span class="badge bg-success text-white">Sudah Ditanggapi</span>
                        <?php endif; ?>
                    </p>
                    <hr>
                    <h5>Tanggapan:</h5>
                    <?php if($url == 'ditanggapi') : ?>
                    <p><?= $data['tanggapan']; ?></p>
                    <p class="card-text"><b>Tanggal: </b> <?= date('d F Y', strtotime($data['tgl_tanggapan'])); ?></p>

                    <?php else: ?>
                    <p>Silahkan Isi Tanggapan!</p>
                    <form method="POST" action="../function/admin/beri-tanggapan.php">
                        <input type="hidden" name="id_pengaduan" value="<?= encryptID($data['id_pengaduan']); ?>">
                        <textarea name="tanggapan" class="form-control" id="" cols="30" rows="4"></textarea>
                        <button class="btn btn-success mt-3 btn-block">Beri Tanggapan <i
                                class="bi bi-reply-all-fill"></i></button>
                    </form>
                    <?php endif; ?>


                </div>
            </div>
            <button onclick="goBack()" class="btn btn-primary mt-3"><i class="bi bi-arrow-left-circle"></i>
                Kembali</button>

            <script>
                function goBack() {
                    window.history.go(-1);
                }
            </script>
        </div>
    </div>



    <?php
include '../template/admin/footer.php';
?>