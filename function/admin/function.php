<?php 

$_CONN = mysqli_connect('localhost','root','','app_pengaduan_fasilitas');

function encryptID($id) {
    return base64_encode($id);
}

function decryptID($id) {
    return base64_decode($id);
}

function cekLogin(){
    if(!isset($_SESSION['nama']) && $_SESSION['is_login_admin'] != TRUE){
        header("Location: login.php");
        exit;
    }
}

function getPengaduanByStatus($status){

    global $_CONN;

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_pengaduan WHERE status = '$status' ORDER BY id_pengaduan DESC";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}

function getPengaduanProsesById($id){

    global $_CONN;
    $id_pengaduan = decryptID($id);

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_pengaduan WHERE id_pengaduan = '$id_pengaduan'";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_assoc($result);
    

    return $dataArray;
}

function getPengaduanDitanggapiById($id){

    global $_CONN;
    $id_pengaduan = decryptID($id);

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_pengaduan INNER JOIN tb_tanggapan ON tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan WHERE tb_pengaduan.id_pengaduan = $id_pengaduan";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_assoc($result);
    

    return $dataArray;
}

function getDataPetugas(){
    global $_CONN;

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_petugas";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}

function getDataPetugasById($id){
    global $_CONN;

    $id = decryptID($id);

    $sql = "SELECT*FROM tb_petugas WHERE id_petugas = '$id'";
    $result = mysqli_query($_CONN,$sql);

    $dataArray = mysqli_fetch_assoc($result);

    return $dataArray;
}

function getDataUser(){
    global $_CONN;

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_user";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}

function getDataUserById($id){
    global $_CONN;

    $id = decryptID($id);

    $sql = "SELECT*FROM tb_user WHERE id_user = '$id'";
    $result = mysqli_query($_CONN,$sql);

    $dataArray = mysqli_fetch_assoc($result);

    return $dataArray;
}