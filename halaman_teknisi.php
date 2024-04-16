<?php
session_start(); // Mulai sesi untuk menyimpan informasi login

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'teknisi') {
    // Jika tidak, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Koneksi ke database (sesuaikan dengan detail koneksi Anda)
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

// Ambil data akun dari tabel users
$sql = "SELECT * FROM pemasangan_tv";
$result = $conn->query($sql);

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pendaftaran Pemasangan TV Kabel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: block;
            width: 100px;
            margin: 20px auto 0;
            text-align: center;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran Pemasangan TV Kabel</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Jenis Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Periksa apakah ada baris data
                if ($result->num_rows > 0) {
                    // Loop melalui setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['paket'] . "</td>";
                        echo "<td>" . $row['jenis_pembayaran'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.html">Sign Out</a>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
$mysqli->close();
?>
