<?php

include '../function/koneksi.php';
include '../function/home/function.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT*FROM tb_user WHERE email = '$email'";
$cek_user_email = mysqli_query($_CONN, $query);

if(mysqli_num_rows($cek_user_email) > 0){

    $row = mysqli_fetch_assoc($cek_user_email);
    $passwordHash = $row['password'];
    

    if(password_verify($password,$passwordHash)){

        $id = $row['id_user'];
        $encrypted_id = encryptID($id);

        $_SESSION['is_login'] = TRUE;
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $encrypted_id;

        header("Location: ../index.php");
        exit();

    }else{
        $_SESSION['alert_danger'] = "TRUE";
        $_SESSION['message'] = "Password anda salah";

        header("Location: ../login.php");
        exit();
    }

}else{
    $_SESSION['alert_danger'] = "TRUE";
    $_SESSION['message'] = "Email anda tidak terdaftar";

    header("Location: ../login.php");
    exit();
}