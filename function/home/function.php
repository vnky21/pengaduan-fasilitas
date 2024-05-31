<?php 

$_CONN = mysqli_connect('localhost','root','','app_pengaduan_fasilitas');

function encryptID($id) {
    return base64_encode($id);
}

function decryptID($encrypted_id) {
    return base64_decode($encrypted_id);
}

function cekLogin(){
    if(!isset($_SESSION['email'])){
        header("Location: index.php");
        exit;
    }
}

function getPengaduan($id){

    global $_CONN;
    $id_user = decryptID($id);

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_pengaduan WHERE id_user = $id_user";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}

function getDetailPengaduan($id){

    global $_CONN;
    $id_pengaduan = decryptID($id);

    // Kueri SQL untuk mengambil semua data dari tb_pengaduan dan tb_tanggapan
    $sql = "SELECT * FROM tb_pengaduan LEFT JOIN tb_tanggapan ON tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan WHERE tb_pengaduan.id_pengaduan = $id_pengaduan";

    $result = mysqli_query($_CONN, $sql);

// Mengubah hasil kueri menjadi array asosiatif
    $dataArray = mysqli_fetch_assoc($result);
    

    return $dataArray;
}

