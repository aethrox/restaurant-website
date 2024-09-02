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

    <?php 
      session_start();
      if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) header("Location: /web-project/pages/login/"); 
      elseif($_SESSION['user_role'] != "admin") header('Location: /web-project'); 
    ?>

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
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/web-proje">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/sayfalar/menu">Menüler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/sayfalar/sefler/">Şeflerimiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-proje/sayfalar/iletisim/">İletişim</a>
            </li> -->
          </ul>
        </div>
        <!-- <div class="login-register-container">
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-proje/sayfalar/giris/"
              >Giriş Yap</a
            >
          </button>
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-proje/sayfalar/kayit/"
              >Kayıt Ol</a
            >
          </button>
        </div> -->
      </div>
    </nav>

    <!-- Body -->

    <div class="container w-75 position-absolute top-50 start-50 translate-middle">
      <h1 class="text-center mb-5">Yönetici Paneli</h1>
      <div class="row">
        <div class="col-12">
          <a href="/web-project/pages/panel/php/add.php" class="btn btn-dark w-100 mb-3"
            >Kullanıcı Ekle</a
          >
          <a href="/web-project/pages/panel/php/list.php" class="btn btn-dark w-100 mb-3"
            >Kullanıcıları Listele</a
          >
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <!-- Telif Hakkı -->
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm Hakları Saklıdır
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
      <!-- Telif Hakkı -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
