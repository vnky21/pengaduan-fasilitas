<?php

include '../template/admin/header.php';
$data = getDataUser();

if($_SESSION['level'] == '2'){
  echo "<script>
  window.location.replace('index.php');
        </script>";
  exit;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data User</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User UNITAMA FacilityCare+</h6>
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

        <a href="add-data-petugas.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle"></i> Tambah Data</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            
            <?php 
            $i = 1;
            foreach($data as $dp) : ?>
              <tr>
                <th scope="row"><?= $i++; ?>.</th>
                <td><?= $dp['email'] ?></td>
                <td><?= $dp['nim'] ?></td>
                <td>
                  <a href="edit-data-user.php?data=<?= encryptID($dp['id_user']); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                  
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