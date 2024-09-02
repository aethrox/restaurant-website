<!DOCTYPE html>
<html lang="tr"></html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Restoran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body class="bg-dark">

    <?php
      session_start();
      if(isset($_SESSION['user_id']) || isset($_SESSION['user_name'])) { header("Location: /web-project/pages/profile"); }
      // Eğer kullanıcı giriş yapmışsa profil sayfasına yönlendir 
    ?>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand me-3" href="/web-project">Restoran</a>
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
        <div class="login-register-container">
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/login/">Giriş Yap</a>
          </button>
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/register/">Kayıt Ol</a>
          </button>
        </div>
      </div>
    </nav>

    <!-- Body -->

    <div class="container m-auto w-75 position-absolute top-50 start-50 translate-middle text-light">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                    Kayıt Ol
                  </p>

                  <form action="/web-project/php/register.php" method="post" class="mx-1 mx-md-4" onsubmit="return validateForm()">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Ahmetcan" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">E-posta</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ahmetcan@gmail.com" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password">Şifre</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="*********" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Şifreyi Tekrarla</label>
                        <input type="password" id="re-password" class="form-control" placeholder="*********" required />
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-start mb-4">
                      <input class="form-check-input me-2" type="checkbox" value="" id="agreeCheck" required />
                      <label class="form-check-label" for="agreeCheck">
                        Hizmet Şartları'ndaki tüm beyanları kabul ediyorum
                        <a class="link-danger" style="text-decoration: none;" href="#!">Hizmet Şartları</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg">Kayıt Ol</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <!-- Copyright -->
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm Hakları Saklıdır
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
      <!-- Copyright -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
