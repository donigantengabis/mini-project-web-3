<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan ke halaman login
header("Location: index.html");
exit();
?>
