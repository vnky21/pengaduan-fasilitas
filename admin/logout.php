<?php
// Mulai sesi
session_start();

// Hapus session "email" dan "is_login"
unset($_SESSION['nama']);
unset($_SESSION['id']);
unset($_SESSION['is_login_admin']);

// Hancurkan semua data sesi
session_destroy();

// Alihkan ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: login.php");
exit();
?>