<?php

require '../function/koneksi.php';
session_start();

$nim = $_POST['nim'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
// Cek apakah email mengandung kata "@mhs.akba.ac.id"
if (strpos($email, "@mhs.akba.ac.id") !== FALSE) {

    if (!ctype_digit($nim) && strlen($nim) !== 11) {
        $_SESSION['alert'] = "TRUE";
        $_SESSION['message'] = "NIM anda tidak valid";
        header("Location: ../register.php");
        exit();

    } else {
        if ($password != $password2) {
            $_SESSION['alert'] = "TRUE";
            $_SESSION['message'] = "Konfirmasi Password anda tidak sesuai";

            header("Location: ../register.php");
            exit();
        } else {
            // Validasi email belum terdaftar
            $sql_check_akun = "SELECT * FROM tb_user WHERE email = '$email' OR nim = '$nim'";
            $result_check_akun = mysqli_query($_CONN, $sql_check_akun);

            if (mysqli_num_rows($result_check_akun) > 0) {
                $_SESSION['alert'] = "TRUE";
                $_SESSION['message'] = "Email atau NIM telah terdatar";
    
                header("Location: ../register.php");
                exit();

            }else{

                if (strlen($password) < 8) {

                    $_SESSION['alert'] = "TRUE";
                    $_SESSION['message'] = "Password minimal 8 karakter";
    
                    header("Location: ../register.php");
                    exit();
                } else {
                    
                $new_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO tb_user VALUES ('','$nim','$email','$new_password','1')";

                mysqli_query($_CONN,$query);

                    if(mysqli_affected_rows($_CONN) > 0){
                        $_SESSION['alert'] = "TRUE";
                        $_SESSION['message'] = "Akun telah berhasil terdatar";
    
                        header("Location: ../login.php");
                        exit();
                    }

                        $_SESSION['alert'] = "TRUE";
                        $_SESSION['message'] = "Akun gagal terdatar";
    
                        header("Location: ../register.php");
                        exit();
              
                    }
                }

            }
        }   
            
    }else {
        $_SESSION['alert'] = "TRUE";
        $_SESSION['message'] = "Email valid dengan domain @mhs.akba.ac.id.";

        header("Location: ../register.php");
        exit();
    } 
    
?>
