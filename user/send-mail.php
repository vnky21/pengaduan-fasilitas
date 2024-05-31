<?php
// Load PHPMailer
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';
require '../lib/PHPMailer/src/Exception.php';

// Buat objek PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    // Buat objek PHPMailer
    $mail = new PHPMailer();

    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Ganti dengan server SMTP yang sesuai
    $mail->SMTPAuth = true;
    $mail->Username = 'expertwing31@gmail.com'; // Ganti dengan username/email SMTP Anda
    $mail->Password = '21522152'; // Ganti dengan password SMTP Anda
    $mail->SMTPSecure = 'tls'; // Ganti dengan ssl atau tls sesuai kebutuhan
    $mail->Port = 587; // Ganti dengan port SMTP yang sesuai

    // Konfigurasi email
    $mail->setFrom('expertwing31@gmail.com', 'UNITAMA FacilityCare'); // Ganti dengan alamat email dan nama pengirim
    $mail->addAddress('vankystar7@gmail.com', 'Vanky'); // Ganti dengan alamat email dan nama penerima
    $mail->Subject = 'Subject of the Email';
    $mail->Body = 'This is the HTML message body';
    $mail->AltBody = 'This is the plain text message body for non-HTML mail clients';

    // Kirim email
    $mail->send();
    echo 'Email berhasil dikirim.';
} catch (Exception $e) {
    echo 'Email gagal dikirim. Pesan kesalahan: ', $mail->ErrorInfo;
}

?>
