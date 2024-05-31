<?php

$_CONN = mysqli_connect('localhost','root','','app_pengaduan_fasilitas');

$sqlTotalPengaduan = 'SELECT COUNT(*) as total FROM tb_pengaduan';
$resultTotalPengaduan = mysqli_query($_CONN,$sqlTotalPengaduan);
$rowTotalPengaduan = mysqli_fetch_assoc($resultTotalPengaduan);


$tanggal_hari_ini = date('Y-m-d');
$sqlPengaduanHariIni = "SELECT COUNT(*) as total FROM tb_pengaduan WHERE tgl_pengaduan = '$tanggal_hari_ini'";
$resultPengaduanHariIni = mysqli_query($_CONN,$sqlPengaduanHariIni);
$rowPengaduanHariIni = mysqli_fetch_assoc($resultPengaduanHariIni);

$sqlBelumDItanggapi = "SELECT COUNT(*) as total FROM tb_pengaduan WHERE status = '1'";
$resultBelumDItanggapi = mysqli_query($_CONN,$sqlBelumDItanggapi);
$rowBelumDItanggapi = mysqli_fetch_assoc($resultBelumDItanggapi);

$sqlDataMahasiswa = "SELECT COUNT(*) as total FROM tb_user";
$resultDataMahasiswa = mysqli_query($_CONN,$sqlDataMahasiswa);
$rowDataMahasiswa = mysqli_fetch_assoc($resultDataMahasiswa);

// Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
$sql = "SELECT * FROM tb_pengaduan ORDER BY id_pengaduan DESC LIMIT 5";

$resultDataPengaduan = mysqli_query($_CONN, $sql);
$dataPengaduanTerbaru = mysqli_fetch_all($resultDataPengaduan , MYSQLI_ASSOC);

