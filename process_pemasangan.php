<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "id22050217_doni";
$password = "Doni#12345";
$dbname = "id22050217_webtvkabel";

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap data dari form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$paket = $_POST['paket'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];

// Query untuk memasukkan data ke dalam tabel
$query = "INSERT INTO pemasangan_tv (nama, no_hp, alamat, paket, jenis_pembayaran) VALUES ('$nama', '$no_hp', '$alamat', '$paket', '$jenis_pembayaran')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permintaan Tersimpan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url("aset/bgpeng3.jpg");
      text-align: center;
    }
    .container {
      margin-top: 100px;
    }
    .message {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .button {
      padding: 10px 20px;
      background-color: #646e78;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
    }
    .button:hover {
      background-color: #8d98a7;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="message">
      Permintaan Anda telah berhasil disimpan.
    </div>
    <a href="dahlogin.php" class="button">Kembali ke Dashboard</a>
  </div>
</body>
</html>
