<?php
  session_start();

  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  if(isset($_SESSION['username']) && isset($_SESSION['role'])){
  if($_SESSION['role'] == 'admin'){
    header("Location: admin/index.php");
  } elseif($_SESSION['role'] == 'pengguna'){
    header("Location: pengguna/index.php");
    exit();
  }
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">

          <div class="col-md-5">
            <img src="assets/image/gambar-1.jpg" alt="login" class="login-card-img">
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <p class="login-card-description">Silakan masuk dengan akun anda</p>

              <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']); 
                    ?>
                </div>
              <?php endif; ?>

              <form action="proses_login.php" method="POST">

                <div class="form-group">
                  <label for="username" class="sr-only">Username</label>
                  <input type="text" name="username" id="username" 
                         class="form-control" placeholder="Username" 
                         required autofocus>
                </div>

                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" 
                         class="form-control" placeholder="Password" 
                         required>
                </div>

                <div class="form-group mb-4">
                  <p>Belum punya akun? <a href="register.php"> Register </a></p>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">
                    Login
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>