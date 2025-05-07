<?php
require_once '../koneksi.php';
require_once 'session.php';

if (sudah_login()) {
  header('Location: index.php');
  exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    header('Location: index.php');
    exit();
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login - Toko Buku</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-light">
  <div class="mt-3" "style width: 500px; margin: auto;">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center mb-3">Login Toko Buku</h4>
            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="POST">
              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>