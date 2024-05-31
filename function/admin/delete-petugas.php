<?php
session_start();
require 'function.php';

$id = decryptID($_GET['data']);

$sql = "DELETE FROM tb_petugas WHERE id_petugas = '$id'";
$result = mysqli_query($_CONN,$sql);

if($result){

    $_SESSION['alert'] = "TRUE";
    $_SESSION['message'] = "Data Petugas berhasil dihapus";
    header("Location: ../../admin/data-petugas.php");
    exit();
}else{

    $_SESSION['alert'] = "TRUE";
    $_SESSION['message'] = "Data Petugas gagal dihapus (".mysqli_error($_CONN).")";
    header("Location: ../../admin/data-pengaduan.php");
    exit();
}
