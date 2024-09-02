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
            </li>
          </ul>
        </div>
        <?php
        session_start();

        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) { // Kullanıcı giriş yapmışsa
          $user_name = $_SESSION['user_name']; // Kullanıcı adını al ve $user_name değişkenine ata
          $profilePicture = "/web-project/images/profile-pictures/test.jpeg";
          if($_SESSION['user_role'] == 'admin') { // Eğer kullanıcı admin ise
            echo '<div class="profile-container d-flex justify-content-end">
                    <div class="profile-info w-75 d-flex justify-content-center align-items-center">
                      <div class="profile-menu dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                          Menü
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="/web-project/pages/basket">Sepet</a></li>
                          <li><a class="dropdown-item" href="/web-project/pages/orders/">Siparişler</a></li>
                          <li><a class="dropdown-item" href="/web-project/pages/panel/">Panel</a></li>
                          <li><a class="dropdown-item" href="/web-project/pages/profile/">Profil</a></li>
                          <li><a class="dropdown-item" href="/web-project/php/logout.php">Çıkış Yap</a></li>
                        </ul>
                      </div>
                      <span class="profile-name fs-5 mx-3">' . $user_name . '</span>
                      <img src="' . $profilePicture . '" alt="Profil Resmi" style="width: 20%;" class="rounded">
                    </div>
                  </div>';
          } else {
            echo '<div class="profile-container d-flex justify-content-end">
                    <div class="profile-info w-75 d-flex justify-content-center align-items-center">
                      <div class="profile-menu dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                          Menü
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="/web-project/pages/basket">Sepet</a></li>
                          <li><a class="dropdown-item" href="/web-project/pages/orders/">Siparişler</a></li>
                          <li><a class="dropdown-item" href="/web-project/pages/profile/">Profil</a></li>
                          <li><a class="dropdown-item" href="/web-project/php/logout.php">Çıkış Yap</a></li>
                        </ul>
                      </div>
                      <span class="profile-name fs-5 mx-3">' . $user_name . '</span>
                      <img src="' . $profilePicture . '" alt="Profil Resmi" style="width: 20%;" class="rounded">
                    </div>
                  </div>';
          }
        } else {
          echo '<div class="login-register-container">
                  <button type="button" class="btn btn-dark">
                    <a class="nav-link" href="/web-project/pages/login/">Giriş Yap</a>
                  </button>
                  <button type="button" class="btn btn-dark">
                    <a class="nav-link" href="/web-project/pages/register/">Kayıt Ol</a>
                  </button>
                </div>';
        }
        ?>
      </div>
    </nav>

    <!-- Body -->

    <div class="container w-75 position-absolute top-50 start-50 translate-middle bg-dark text-light p-5 rounded-5">
      <h1 class="text-center">Restorana Hoş Geldiniz</h1>
      <br />
      <p class="text-center">
        Ailemize ait olan restoranımız, topluluğa 20 yıldan fazla süredir hizmet vermektedir. Damak tadınızı tatmin edecek çeşitli yemekler sunuyoruz.
      </p>
      <p class="text-center">
        Şeflerimiz size en iyi yemek deneyimini sunmaya adanmıştır. Yemeklerimizde sadece en taze malzemeleri kullanıyor ve yemeklerimizin kalitesiyle gurur duyuyoruz.
      </p>
      <p class="text-center">
        Hızlı bir atıştırmalık veya tam bir öğün arıyorsanız, herkes için bir şeylerimiz var. Bugün bizi ziyaret edin ve neden en iyi restoran olduğumuzu görün!
      </p>
      <br />
      <div class="text-center">
        <button type="button" class="btn btn-danger">
          <a class="nav-link" href="/web-project/pages/menu">Menülerimizi Görüntüle</a>
        </button>
      </div>
    </div>

    <style>
      .bg-image { /* Arka Plan Resmi */
        background-image: url('/web-project/images/bg.png');
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>

    <!-- Arka Plan Resmi -->
    <div class="bg-image"></div>

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
