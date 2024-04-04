<?php
// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sambungkan ke database (sesuaikan dengan detail koneksi Anda)
    $servername = "sql308.infinityfree.com";
    $username = "if0_36302101";
    $password = "rfviBv3md7GE";
    $dbname = "if0_36302101_webtvkabel";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil nilai yang dikirimkan melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username dan password cocok
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Periksa apakah ada baris yang cocok
    if ($result->num_rows > 0) {
        // Login berhasil, redirect ke halaman dashboard
        header("Location: dahlogin.php");
    } else {
        // Login gagal, kembali ke halaman login dengan pesan error
        echo "Username atau password salah.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
