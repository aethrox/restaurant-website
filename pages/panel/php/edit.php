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
              <a class="nav-link active" aria-current="page" href="/web-project">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/menu">Menüler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/chefs/">Şeflerimiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/contact/">İletişim</a>
            </li> -->
          </ul>
        </div>
        <!-- <div class="login-register-container">
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/login/"
              >Giriş Yap</a
            >
          </button>
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/register/"
              >Kayıt Ol</a
            >
          </button>
        </div> -->
      </div>
    </nav>

    <!-- Body -->

    <div class="container w-75 position-absolute top-50 start-50 translate-middle">
      <h1 class="text-center mb-5">Kullanıcı Düzenle <?php echo "ID: ".$_GET['id']; ?></h1>

      <?php
        require_once '../../../php/db.php'; 
        // db.php dosyasını çağır ve içeriğini al
        // Bu dosya, veritabanı bağlantısını sağlar ve $conn adında bir değişken içerir.
        // Bu değişken, veritabanı bağlantısını temsil eder.
        // "require_once" dosyanın yalnızca bir kez çağrılmasını sağlar.

        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = "SELECT * FROM users WHERE id = $id";
          // SELECT - Belirtilen koşula uyan kayıtları getirir.
          // "users" tablosundan "id" değeri "$id" olan kaydı getir.
          // WHERE - Koşul belirtir.

          $result = $conn->query($sql); 
          // sorguyu çalıştır ve sonucu result değişkenine ata
          // "query()" fonksiyonu, sorguyu çalıştırır ve sonucu döndürür.

          if ($result->num_rows > 0) {
            // "->" işareti sonucu dizi olarak almak için kullanılır
            // "$result->num_rows" sonuç sayısını verir
            // "$result->num_rows > 0" sonuç sayısı 0'dan büyükse demektir.
            $row = $result->fetch_assoc(); // sonuçları dizi olarak al ve row değişkenine ata
            $username = $row["username"];
            $email = $row["email"];
            $role = $row["role"];
          } else {
            echo "Kullanıcı bulunamadı";
          }
        }

        if(isset($_POST['update'])) { 
          // form submit edildiğinde çalışacak kodlar.
          // isset() - Belirtilen değişkenin tanımlı olup olmadığını kontrol eder.
          // $_POST['update'] - Formdan gönderilen veriler içerisinde "update" adında bir değişken var mı diye kontrol eder.
          $id = $_POST['id'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $role = $_POST['role'];

          $sql = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$id";
          // UPDATE - Belirtilen koşula uyan kayıtları günceller.
          // "users" tablosundaki "id" değeri "$id" olan kaydın "username", "email" ve "role" değerlerini güncelle.
          // SET - Belirtilen sütunları günceller.
          // WHERE - Koşul belirtir.
          // $id - güncellenecek kullanıcının id'si

          if ($conn->query($sql) === TRUE) { 
            // sorguyu çalıştır ve başarılı olursa ekrana yazdır
            // query() - Bir sorguyu veritabanında çalıştırır.

            header("Location: /web-project/pages/panel/php/list.php");
          } else {
            echo "Kayıt güncellenirken hata oluştu: " . $conn->error; // hata varsa ekrana yazdır
          }
        }

        $conn->close(); // bağlantıyı kapat
      ?>

      <form method="POST"> 
        <!-- method="POST" - Form verilerini gönderir -->
        <!-- action="" - Form verilerini gönderdiğinde sayfanın kendine yönlendir -->
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="mb-3">
          <label for="username" class="form-label">Kullanıcı Adı</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-posta</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">Kullanıcı</option>
            </select>
            </div>
        <button type="submit" class="btn btn-dark" name="update">Güncelle</button>
      </form>
    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm hakları saklıdır
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
