<?php
session_start();

require 'function.php';
include '../koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT*FROM tb_petugas WHERE username = '$username'";
$cek_user_username = mysqli_query($_CONN, $query);

if(mysqli_num_rows($cek_user_username) > 0){

    $row = mysqli_fetch_assoc($cek_user_username);
    $passwordHash = $row['password'];
    

    if(password_verify($password,$passwordHash)){
        
        if($row['level'] == '1'){
            $_SESSION['level'] = $row['level'];

        }else{
            $_SESSION['level'] = $row['level'];
        }
        
        $id = $row['id_petugas'];
        $encrypted_id = encryptID($id);

        $_SESSION['is_login_admin'] = TRUE;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['id'] = $encrypted_id;
        header("Location: ../../admin/index.php");
        exit();

    }else{
        $_SESSION['alert'] = "TRUE";
        $_SESSION['message'] = "Password anda salah";

        header("Location: ../../admin/login.php");
        exit();
    }

}else{
    $_SESSION['alert'] = "TRUE";
    $_SESSION['message'] = "Username anda tidak terdaftar";

    header("Location: ../../admin/login.php");
    exit();
}