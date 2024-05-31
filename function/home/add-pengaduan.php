<?php
session_start();

require 'function.php';
require '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = decryptID($_SESSION['id']);

    // Cek apakah data untuk tanggal hari ini sudah ada di database
    $tanggal_hari_ini = date("Y-m-d");
    $query = "SELECT COUNT(*) as total_data FROM tb_pengaduan WHERE tgl_pengaduan = '$tanggal_hari_ini' AND id_user = '$id_user'";
    $result = mysqli_query($_CONN, $query);
    $data = mysqli_fetch_assoc($result);
    $total_data_hari_ini = $data['total_data'];

    if ($total_data_hari_ini >= 2) {
            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Hanya bisa melaporkan pengaduan maksimal 2 per hari";

            header("Location: ../../pengaduan.php");
            exit();
    }


    // Proses data yang diunggah
    if (isset($_FILES['gambar']) && isset($_POST['isi'])) {
        $gambar = $_FILES['gambar']['name'];
        $isi = mysqli_real_escape_string($_CONN, $_POST['isi']);
        $status = 1;

        $max_file_size = 2 * 1024 * 1024; // 2MB dalam bytes

        if ($_FILES["gambar"]["size"] > $max_file_size) {
            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Ukuran gambar maksimal 2 MB";

            header("Location: ../../pengaduan.php");
            exit();
        }
        
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        $uploaded_extension = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));
            
        if (!in_array($uploaded_extension, $allowed_extensions)) {

            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "File yang diunggah harus berupa gambar (JPG, JPEG, atau PNG)";
            header("Location: ../../pengaduan.php");
            exit();
        }

        
        $tanggal_hari_ini = date("Y-m-d");
        

        // Upload gambar ke folder tertentu
        $tmp_file = $_FILES["gambar"]["tmp_name"];

        $target_dir = "../../img-laporan/";
        $extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $target_file = $target_dir . $filename;

        
            // Jika berhasil diunggah, masukkan data ke database
            $query = "INSERT INTO tb_pengaduan (isi,gambar,tgl_pengaduan,status,id_user) VALUES ('$isi','$filename', '$tanggal_hari_ini','$status','$id_user')";

            if (mysqli_query($_CONN, $query)) {
                move_uploaded_file($tmp_file, $target_file);

                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "Pengaduan anda akan segera diproses";
                header("Location: ../../daftar-pengaduan.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($_CONN);
            }
    
    }
            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Wajib mengisi gambar dan isi";
            header("Location: ../../pengaduan.php");
            exit();

  
    }