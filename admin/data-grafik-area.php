<?php

require '../function/koneksi.php';

$year = date("Y"); // Mendapatkan tahun sekarang
$sql = "SELECT DATE_FORMAT(tgl_pengaduan, '%M') as bulan, COUNT(*) as total FROM tb_pengaduan WHERE YEAR(tgl_pengaduan) = '$year' GROUP BY MONTH(tgl_pengaduan)";
$result = mysqli_query($_CONN, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
