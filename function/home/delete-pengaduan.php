<?php
session_start();

require 'function.php';

cekLogin();

$id = decryptID($_GET['data']);

$query = "SELECT gambar FROM tb_pengaduan WHERE id_pengaduan = $id";
$result = mysqli_query($_CONN, $query);
$row = mysqli_fetch_assoc($result);
$namaGambar = $row["gambar"];
 

// Menghapus file gambar dari sistem file server
$file_path = "../../img-laporan/$namaGambar";
if (file_exists($file_path)) {
    unlink($file_path);
}else{
    header("Location: ../../daftar-pengaduan.php");
    exit();
}

$query = "DELETE FROM tb_pengaduan WHERE id_pengaduan = $id";
$result = mysqli_query($_CONN,$query);

if($result){

    $_SESSION['alert'] = "TRUE";
    $_SESSION['message'] = "Pengaduan anda berhasil dihapus";
    header("Location: ../../daftar-pengaduan.php");
    exit();
}else{

    $_SESSION['alert'] = "TRUE";
    $_SESSION['message'] = "Pengaduan anda gagal dihapus";
    header("Location: ../../daftar-pengaduan.php");
    exit();

}