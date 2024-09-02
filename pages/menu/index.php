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
              <a class="nav-link active" aria-current="page" href="/web-project/pages/menu">Menüler</a>
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
      <div class="row mt-5">
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 1</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺10</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="1">
                <input type="hidden" name="food_name" value="Yemek 1">
                <input type="hidden" name="food_price" value="10">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 2</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺12</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="2">
                <input type="hidden" name="food_name" value="Yemek 2">
                <input type="hidden" name="food_price" value="12">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 3</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺15</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="3">
                <input type="hidden" name="food_name" value="Yemek 3">
                <input type="hidden" name="food_price" value="15">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 4</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺8</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="4">
                <input type="hidden" name="food_name" value="Yemek 4">
                <input type="hidden" name="food_price" value="8">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 5</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺10</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="5">
                <input type="hidden" name="food_name" value="Yemek 5">
                <input type="hidden" name="food_price" value="10">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 6</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺12</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="6">
                <input type="hidden" name="food_name" value="Yemek 6">
                <input type="hidden" name="food_price" value="12">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 7</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺15</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="7">
                <input type="hidden" name="food_name" value="Yemek 7">
                <input type="hidden" name="food_price" value="15">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 8</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺10</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="8">
                <input type="hidden" name="food_name" value="Yemek 8">
                <input type="hidden" name="food_price" value="10">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="/web-project/images/menu/food1.jpg" alt="Kart resmi">
            <div class="card-body">
              <h5 class="card-title">Yemek 9</h5>
              <p class="card-text">Aradığım şey bu, Türk mutfağından lezzetli ve sıcak bir yemek!</p>
              <p class="card-text"><b>Fiyat:</b> ₺12</p>
              <form method="POST" action="/web-project/pages/menu/index.php">
                <input type="hidden" name="food_id" value="9">
                <input type="hidden" name="food_name" value="Yemek 9">
                <input type="hidden" name="food_price" value="12">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                  <button type="submit" class="btn btn-dark">Sepete Ekle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    if (isset($_SESSION['user_id'])) {
      if (isset($_POST['food_id']) && isset($_POST['food_name']) && isset($_POST['food_price']) && isset($_POST['quantity'])) {
        // Eğer form gönderilmişse  
        $food_id = $_POST['food_id'];
        $food_name = $_POST['food_name'];
        $food_price = $_POST['food_price'];
        $quantity = $_POST['quantity'];

        $basket = $_SESSION['basket_items'] ?? []; // Eğer sepet boşsa boş bir dizi oluştur

        $item = ['food_id' => $food_id, 'food_price' => $food_price, 'food_name' => $food_name, 'quantity' => $quantity]; 
        // Eklenecek öğeyi oluştur 

        // Kontrol etmek için sepetin içindeki öğeleri döngüye al
        $existingItemIndex = -1; // Eğer öğe sepetin içinde bulunamazsa -1 olarak kalacak
        foreach ($basket as $index => $basketItem) { // Sepetteki her bir öğe için 
          if ($basketItem['food_id'] == $food_id) { // Eğer öğe zaten sepette varsa
            $existingItemIndex = $index; // Öğenin indeksini kaydet
            break; // Döngüyü sonlandır
          }
        }

        if ($existingItemIndex >= 0) { // Eğer öğe sepette varsa 
          // Ürün sepette zaten var, miktarı güncelleyin 
          $basket[$existingItemIndex]['quantity'] += $quantity; 
        } else {
          // Ürün sepette mevcut değil, ekleyin 
          $basket[] = $item;
        }

        // Öğeleri güncel sepete kaydet
        $_SESSION['basket_items'] = $basket;
      }
    } else {
      echo "<script>
        if(confirm('Menüyü görmek için giriş yapmanız gerekmektedir. Giriş yapmak istiyor musunuz?')) {
          window.location.href = '/web-project/pages/login';
        } else {
          window.location.href = '/web-project';
        }
        </script>";
    }
    ?>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start">
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
