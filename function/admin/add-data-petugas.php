<?php

session_start();
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $level = $_POST['level'];


        if ($password != $password2) {

            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Konfirmasi Password anda tidak sesuai";

            header("Location: ../../admin/add-data-petugas.php");
            exit();
        } else {

            // Validasi email belum terdaftar
            $sql_check_akun = "SELECT * FROM tb_petugas WHERE username = '$username'";
            $result_check_akun = mysqli_query($_CONN, $sql_check_akun);

            if (mysqli_num_rows($result_check_akun) > 0) {
                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "Petugas telah terdatar";
    
                header("Location: ../../admin/add-data-petugas.php");
                exit();

            }else{

                if (strlen($password) < 8) {

                    $_SESSION['alert'] = "TRUE";
                    $_SESSION['message'] = "Password minimal 8 karakter";
    
                    header("Location: ../../admin/add-data-petugas.php");
                    exit();
                } else {
                    
                $new_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO tb_petugas (nama,username,password,level) VALUES ('$nama', '$username', '$new_password','$level')";

                mysqli_query($_CONN,$query);

                    if(mysqli_affected_rows($_CONN) > 0){
                        $_SESSION['alert'] = "TRUE";
                        $_SESSION['message'] = "Data Petugas Berhasil Ditambahkan";
                        header("Location: ../../admin/data-petugas.php");
                        exit();
                    }

                        $_SESSION['alert'] = "TRUE";
                        $_SESSION['message'] = "Data Gagal Ditambahkan";
                        header("Location: ../../admin/add-data-petugas.php");
                        exit();
              
                    }
                }

            }
        }   
