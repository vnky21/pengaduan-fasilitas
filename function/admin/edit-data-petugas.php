<?php

session_start();
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id_old = $_POST['id_petugas'];
    $id = decryptID($_POST['id_petugas']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


        if ($password != $password2 && strlen($password) < 8) {

            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Reset password gagal";

            header("Location: ../../admin/edit-data-petugas.php?data='$id_old'");
            exit();
        } else {

            $sql_cek_petugas = "SELECT*FROM tb_petugas WHERE id_petugas = '$id' AND username = '$username'";
            $cek_petugas = mysqli_query($_CONN, $sql_cek_petugas);

            if(mysqli_num_rows($cek_petugas) > 0){      
                
                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "ID akun tidak ditemukan";

                header("Location: ../../admin/edit-data-petugas.php?data='$id_old'");
                exit();
            }else{

                $new_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE tb_petugas SET password = '$new_password' WHERE id_petugas = '$id'";

                mysqli_query($_CONN, $sql);

                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "Reset password berhasil";

                header("Location: ../../admin/data-petugas.php");
                exit();

            }
            

        }

    }
    