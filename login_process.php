<?php
session_start(); // Mulai sesi untuk menyimpan informasi login

// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sambungkan ke database (sesuaikan dengan detail koneksi Anda)
    $servername = "localhost";
    $username = "id22050217_doni";
    $password = "Doni#12345";
    $dbname = "id22050217_webtvkabel";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil nilai yang dikirimkan melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Ambil nilai role dari form

    // Query untuk memeriksa apakah username dan password cocok dan sesuai role
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
    $result = $conn->query($sql);

    // Periksa apakah ada baris yang cocok
    if ($result->num_rows > 0) {
        // Login berhasil, simpan informasi login dalam sesi
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect ke halaman yang sesuai berdasarkan role
        if ($role == "teknisi") {
            header("Location: halaman_teknisi.php");
        } elseif ($role == "admin") {
            header("Location: halaman_admin.php");
        } else {
            header("Location: dahlogin.php");
        }
        exit(); // Pastikan keluar dari skrip setelah mengarahkan pengguna
    } else {
        // Login gagal, kembali ke halaman login tanpa pesan error
        header("Location: login.php");
        exit(); // Pastikan keluar dari skrip setelah mengarahkan pengguna
    }

    // Tutup koneksi
    $conn->close();
}
?>
