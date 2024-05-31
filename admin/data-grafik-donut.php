<?php

require '../function/koneksi.php';

$year = date("Y"); // Mendapatkan tahun sekarang
$sql = "SELECT status, COUNT(*) as total FROM tb_pengaduan GROUP BY status";
$result = mysqli_query($_CONN, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
