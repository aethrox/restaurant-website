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
      // Eğer kullanıcı giriş yapmamışsa giriş sayfasına yönlendir
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
              <a class="nav-link active" aria-current="page" href="/web-project"
                >Ana Sayfa</a
              >
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

    <div class="container mt-5">
      <h1 class="text-center my-5">Sepet</h1>
      <?php 
        if(count($_SESSION['basket_items']) == 0){ // Sepette hiç ürün yoksa uyarı mesajı göster
            echo '<div class="alert alert-info" role="alert">
                <b>Sepetiniz boş.</b> Lezzetli yemeklerin tadını çıkarmak için sepetinize ürün eklemeye başlayın.
              </div>';
            echo '<a href="/web-project/pages/menu" class="btn btn-dark">Menüye Git</a>';
        } else { ?>
      <div class="row mt-5">
        <div class="col-8">
          <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">İsim</th>
                <th scope="col">Fiyat</th>
                <th scope="col">Adet</th>
                <th scope="col">Toplam</th>
                <th scope="col">İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_SESSION['basket_items'])) { // Sepet öğeleri varsa
                $basket_items = $_SESSION['basket_items'];
                foreach ($basket_items as $item) {
                  $total = $item['food_price'] * $item['quantity']; // Toplam fiyat hesaplanır ve toplam değişkenine eklenir
                  echo '<tr>
                          <td>' . $item['food_name'] . '</td>
                          <td>' . $item['food_price'] . '</td>
                          <td>' . $item['quantity'] . '</td>
                          <td>' . $total . '</td>
                          <td>
                            <a href="/web-project/pages/basket/php/delete_item.php?food_id=' . $item['food_id'] . '" class="btn btn-danger">Sil</a>
                            <a href="/web-project/pages/basket/php/delete_all_items.php?food_id='.$item['food_id'].'" class="btn btn-danger">Hepsini Sil</a>
                          </td>
                        </tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Toplam Fiyat</h5>
              <?php
              if (isset($_SESSION['basket_items'])) {
                $basket_items = $_SESSION['basket_items'];
                $total = 0;
                foreach ($basket_items as $item) {
                  $total += $item['food_price'] * $item['quantity']; // Toplam fiyat hesaplanır ve toplam değişkenine eklenir
                  // ürün fiyatı * ürün miktarı
                }
                echo '<p class="card-text">' . $total . '₺</p>';
              } else {
                echo '<p class="card-text">0₺</p>';
              }
              ?>
              <div class="d-flex justify-content-between">
                <form action="/web-project/pages/basket/php/checkout.php" method="post">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <input type="hidden" name="basket_items" value="<?php echo json_encode($_SESSION['basket_items']); ?>">
                  <input type="hidden" name="total_price" value="<?php echo $total; ?>">
                  <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                  <button type="submit" class="btn btn-dark">Sipariş ver</button>
                </form>
                <a href="/web-project/pages/basket/php/empty_basket.php" class="btn btn-dark">Sepeti Boşalt</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm hakları saklıdır.
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
