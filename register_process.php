<?php
// Memeriksa apakah form pendaftaran telah disubmit
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

    // Query untuk memeriksa apakah username sudah digunakan
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        // Jika username sudah digunakan, kembali ke halaman registrasi dengan pesan kesalahan
        echo "Username sudah digunakan. Silakan coba dengan username lain.";
    } else {
        // Jika username tersedia, tambahkan pengguna baru ke database
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($insert_query) === TRUE) {
            // Registrasi berhasil, arahkan ke halaman login
            header("Location: login.php");
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
}
?>
