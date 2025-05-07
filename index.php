<?php
require_once 'session.php';

if (!sudah_login()) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Beranda - Toko Buku</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <h2>Halo, <?php echo $_SESSION['username'] . '.'; ?></h2>
    <h2>Selamat datang di Toko Buku!</h2>
    <p>Ini adalah halaman utama.</p>
    <a href="logout.php" class="btn btn-success">Logout</a>

  </div>

</body>

</html>