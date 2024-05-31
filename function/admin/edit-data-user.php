<?php

session_start();
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id_old = $_POST['id_user'];
    $id = decryptID($_POST['id_user']);
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


        if ($password != $password2 && strlen($password) < 8) {

            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Reset password gagal";

            header("Location: ../../admin/edit-data-user.php?data='$id_old'");
            exit();
        } else {

            $sql_cek_user = "SELECT*FROM tb_user WHERE id_user = '$id' AND nim = '$nim'";
            $cek_user = mysqli_query($_CONN, $sql_cek_user);

            if(mysqli_num_rows($cek_user) > 0){      
                
                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "ID akun tidak ditemukan";

                header("Location: ../../admin/edit-data-user.php?data='$id_old'");
                exit();
            }else{

                $new_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE tb_user SET password = '$new_password' WHERE id_user = '$id'";

                mysqli_query($_CONN, $sql);

                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "Reset password berhasil";

                header("Location: ../../admin/data-user.php");
                exit();

            }
            

        }

    }
    