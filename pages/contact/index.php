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
              <a class="nav-link" href="/web-project">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/menu">Menüler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/chefs/">Şeflerimiz</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="/web-project/pages/contact/"
                >İletişim</a
              >
            </li>
          </ul>
        </div>
        <?php
        session_start();

        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
          $user_name = $_SESSION['user_name'];
          $profilePicture = "/web-project/images/profile-pictures/test.jpeg";
          if($_SESSION['user_role'] == 'admin') {
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
    <?php
    if (isset($_GET['mail'])) {
      $mailStatus = $_GET['mail']; 
      if ($mailStatus == 'success') { // Mail gönderildiğinde başarılı mesajı gösterir.
        echo '<div id="success-alert" class="alert alert-success text-center" role="alert">
                Mail gönderildi!
              </div>';
      } elseif ($mailStatus == 'error') { // Mail gönderilemediğinde hata mesajı gösterir.
        echo '<div id="error-alert" class="alert alert-danger text-center" role="alert">
                Mail gönderilemedi!
              </div>';
      }
    }
    ?>

    <script>
      setTimeout(function() { // Sayfa yenilendiğinde alert'lerin kapanmasını sağlar.
        document.getElementById('success-alert').remove();
        document.getElementById('error-alert').remove();
      }, 5000); // 5 saniye sonra alert'ler kapanır.
    </script>

    <section class="bg-light py-3 py-md-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
            <h2 class="mb-4 display-5 text-center">İletişim</h2>
            <p class="text-secondary mb-5 text-center">
                Restoranımızda Türk mutfağının eşsiz güveç yemekleri, özel mezeleri, kömürde pişen tavukları ve en lezzetli et ve balıkları deneyebilirsiniz.
            <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle" />
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-lg-center">
          <div class="col-12 col-lg-9">
        <div class="bg-white border rounded shadow-sm overflow-hidden">
          <form action="php/send.php" method="post">
            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
          <div class="col-12">
            <label for="fullname" class="form-label">Ad Soyad <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="" placeholder="Abdullah Yılmaz" required>
          </div>
          <div class="col-12 col-md-6">
            <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
              </span>
              <input type="email" class="form-control" id="email" name="email" value="" placeholder="ornek@ornek.com" required>
            </div>
          </div>
          <!-- <div class="col-12 col-md-6">
            <label for="phone" class="form-label">Telefon Numarası</label>
            <div class="input-group">
              <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
              </span>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="+90 555-555-5555" value="">
            </div>
          </div> -->
          <div class="col-12">
            <label for="message" class="form-label">Mesaj <span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Mesajınız..." required></textarea>
          </div>
          <div class="col-12">
            <div class="d-grid">
              <button class="btn btn-dark" type="submit">Gönder</button>
            </div>
          </div>
            </div>
          </form>
        </div>
          </div>
        </div>
      </div>
    </section>

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
