<?php
session_start();
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = decryptID($_POST['id_pengaduan']);
    $tanggapan = $_POST['tanggapan'];
    $tanggal_hari_ini = date("Y-m-d");
    $id_petugas = decryptID($_SESSION['id']);

    $sql = "INSERT INTO tb_tanggapan (id_pengaduan,tanggapan,tgl_tanggapan,id_petugas) VALUES ('$id','$tanggapan','$tanggal_hari_ini','$id_petugas')";
    $result = mysqli_query($_CONN,$sql);

    if($result){
        $sqlUpdated = "UPDATE tb_pengaduan SET status = '2' WHERE id_pengaduan = '$id'";
        $result = mysqli_query($_CONN,$sqlUpdated);
        
        $_SESSION['alert'] = "TRUE";
        $_SESSION['message'] = "Pengaduan Berhasil Ditanggapi";
        header("Location: ../../admin/data-pengaduan.php?status=proses");
        exit();
    }

}

?>