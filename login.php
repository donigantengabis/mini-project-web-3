<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <!-- Custom CSS File -->
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="login_process.php" method="post">
        <input type="text" name="username" placeholder="Masukkan username Anda">
        <input type="password" name="password" placeholder="Masukkan password Anda">
        <div class="roles">
          <label for="user">User</label>
          <input type="radio" id="user" name="role" value="user" checked>
          <label for="teknisi">Teknisi</label>
          <input type="radio" id="teknisi" name="role" value="teknisi">
          <label for="admin">Admin</label>
          <input type="radio" id="admin" name="role" value="admin">
        </div>
        <input type="submit" class="button" value="Login">
        <!-- Tombol back untuk menu utama -->
        <a href="index.html" class="button-back">Back to Main Menu</a>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account? <label for="check">Signup</label></span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="register_process.php" method="post">
        <input type="text" name="username" placeholder="Create your username">
        <input type="password" name="password" placeholder="Create a password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <input type="submit" class="button" value="Signup">
        <!-- Tombol back untuk menu utama -->
        <a href="index.html" class="button-back">Back to Main Menu</a>
      </form>
      <div class="signup">
        <span class="signup">Already have an account? <label for="check">Login</label></span>
      </div>
    </div>
  </div>
</body>
</html>
