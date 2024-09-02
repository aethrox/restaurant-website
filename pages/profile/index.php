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

    <?php 
      session_start();
      if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) header("Location: /web-project/pages/login/"); 
    ?>

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

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Profil Sayfası</h5>
                        <?php
                        // Varsayılan olarak bir veritabanı bağlantısı olduğunu varsayalım
                        // Veritabanından kullanıcı verilerini alın
                        require_once '../../php/db.php';
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT username, email, password FROM users WHERE id = $user_id";
                        $result = mysqli_query($conn, $query);
                        $user = mysqli_fetch_assoc($result);

                        // Formda kullanıcı verilerini görüntüleyin
                        ?>
                        <form action="php/update_profile.php" method="POST">
                          <div class="form-group">
                            <label for="name">Kullanıcı İsmi:</label>
                            <input type="text" class="form-control" id="name" name="username" value="<?php echo $user['username']; ?>">
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="password">Şifre:</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                          </div>
                          <br>
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                          <button type="submit" name="update" class="btn btn-primary">Bilgileri Güncelle</button>
                        </form>

                        <br>

                        <div class="delete-profile-container">
                          <form action="php/delete_profile.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                          <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Hesabınızı silmek istediğinize emin misiniz?')">Hesabı Sil</button>
                          </form>
                        </div>

                        <?php
                        if (isset($_GET['update'])) {
                          $updateStatus = $_GET['update']; // update parametresini al
                          if ($updateStatus == 'success') { // Eğer update parametresi success ise
                            echo '<br><div class="alert alert-success" role="alert">
                                    Güncelleme başarıyla tamamlandı.
                                  </div>';
                          } elseif ($updateStatus == 'error') { // Eğer update parametresi error ise
                            echo '<br><div class="alert alert-danger" role="alert">
                                    Güncelleme başarısız oldu.
                                  </div>';
                          }
                        }
                        ?>

                        <script>
                          setTimeout(function() { // setTimeout fonksiyonu ile belirli bir süre sonra alert silinir
                            document.querySelector('.alert').remove();
                          }, 10000); // 10 saniye sonra alert silinir
                        </script>

                    </div>
                </div>
            </div>
        </div>
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
