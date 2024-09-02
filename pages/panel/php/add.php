
<?php
  require_once '../../../php/db.php';
  // db.php dosyasını çağır ve içeriğini al
  // Bu dosya, veritabanı bağlantısını sağlar ve $conn adında bir değişken içerir.
  // Bu değişken, veritabanı bağlantısını temsil eder.
  // "require_once" dosyanın yalnızca bir kez çağrılmasını sağlar.

  if(isset($_POST['submit'])) {
      // form submit edildiğinde çalışacak kodlar
      // $_POST, formdan gönderilen verileri içerir
      // $_POST['submit'], formda submit butonuna basıldığında değeri oluşur
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];

      $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
      // INSERT INTO - Yeni bir kayıt ekler
      // "users" tablosuna "username", "email", "password", "role" değerlerini ekle
      // VALUES - Eklenecek değerleri belirtir
      // '$username', '$email', '$password', '$role' - Değerler

      if ($conn->query($sql) === TRUE) {
          // Eğer sorgu başarılıysa list.php sayfasına yönlendir ve işlemi bitir.
          header("Location: list.php");
          exit();
      } else {
          echo "Hata: " . $sql . "<br>" . $conn->error; // hata varsa ekrana yazdır
      }
  }

  $conn->close(); // bağlantıyı kapat
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Restoran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand me-2" href="/web-project">Restoran</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel">Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel/php/add.php">Kullanıcı Ekle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel/php/list.php">Kullanıcıları Listele</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/web-proje">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/pages/menu">Menüler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/pages/sefler/">Şeflerimiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/pages/iletisim/">İletişim</a>
            </li> -->
          </ul>
        </div>
        <!-- <div class="login-register-container">
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-proje/pages/giris/"
              >Giriş Yap</a
            >
          </button>
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-proje/pages/kayit/"
              >Kayıt Ol</a
            >
          </button>
        </div> -->
      </div>
    </nav>

    <!-- Body -->

    <div class="container w-75 position-absolute top-50 start-50 translate-middle">
      <h1 class="text-center mb-5">Kullanıcı Ekle</h1>
      
        <form action="add.php" method="post">
            <div class="mb-3">
            <label for="username" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Ahmetcan" required>
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">E-posta</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="ahmetcan@gmail.com" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
            </div>
            <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">Kullanıcı</option>
            </select>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Gönder</button>
    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm Hakları Saklıdır
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
