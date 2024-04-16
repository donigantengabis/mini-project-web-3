<?php
session_start(); // Mulai sesi untuk menyimpan informasi login

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
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
$sql = "SELECT * FROM users";
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
    <title>Halaman Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .logout-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .logout-btn a {
            color: #fff;
            background-color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .logout-btn a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
        <h2>Data Akun</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data akun.</td></tr>";
            }
            ?>
        </table>
        <div class="logout-btn">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
