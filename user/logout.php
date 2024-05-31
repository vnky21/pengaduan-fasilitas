<?php
// Mulai sesi
session_start();

// Hapus session "email" dan "is_login"
unset($_SESSION['email']);
unset($_SESSION['is_login']);

// Hancurkan semua data sesi
session_destroy();

// Alihkan ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: ../index.php");
exit();
?>