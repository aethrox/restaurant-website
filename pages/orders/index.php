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
            <div class="col-12">
            <h1 class="text-center my-5">Siparişler</h1>
            <?php
            require_once '../../php/db.php'; // Veritabanı bağlantı dosyası
            $user_id = $_SESSION['user_id']; // Kullanıcı ID'si
            $sql = "SELECT * FROM orders WHERE user_id = '$user_id'"; // Kullanıcının siparişlerini getir
            $result = $conn->query($sql); // Sorguyu çalıştır ve sonucu al
            if ($result->num_rows > 0) { // Eğer sonuç 0'dan büyükse yani sipariş varsa 
            while ($row = $result->fetch_assoc()) { // Sonucu dizi olarak al ve döngüye sok 
                ?>
                <!--
                    LİSTE AÇILIP KAPANMIYOR
                    DÜZELTİLDİ
                -->
                <!-- Siparişlerin listelendiği alan -->
                <div class="accordion mt-5" id="accordionExample">
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $row['id']; ?>">

                <button 
                    class="accordion-button collapsed" 
                    type="button" 
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse<?php echo $row['id']; ?>"
                    aria-expanded="false" 
                    aria-controls="collapse<?php echo $row['id']; ?>"> <!-- Sipariş ID'si ile collapse ID'sini eşleştir -->
                    Sipariş ID: <?php echo $row['id']; ?>
                </button>

                </h2>
                <div id="collapse<?php echo $row['id']; ?>" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="heading<?php echo $row['id']; ?>" 
                    data-bs-parent="#accordionExample">

                <div class="accordion-body">
                    <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Yemek ID</th>
                            <th scope="col">Yemek Adı</th>
                            <th scope="col">Miktar</th>
                            <th scope="col">Toplam Fiyat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $basket_items = json_decode($row['basket_items'], true); // Siparişteki yemekleri diziye çevir. true ile diziye çeviriyoruz.
                        // json_decode() fonksiyonu ile JSON formatındaki veriyi diziye çeviriyoruz.
                        // json_decode($json, true) şeklinde kullanırsak, diziye çevirir.
                        // json_decode($json) şeklinde kullanırsak, nesneye çevirir.
                        
                        foreach ($basket_items as $item) { // Siparişteki yemekleri döngüye sok
                        echo '<tr>';
                        echo '<td>' . $item['food_id'] . '</td>';
                        echo '<td>' . $item['food_name'] . '</td>';
                        echo '<td>' . $item['quantity'] . '</td>';
                        echo '<td>' . $item['food_price'] * $item['quantity'] . '</td>';
                        echo '</tr>';
                    } 
                    ?>
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                    <h6>Toplam Fiyat: <?php echo $row['total_price']; ?> </h6>
                    <h6>Sipariş Tarihi: <?php echo $row['date']; ?> </h6>
                    </div>
                </div>
                </div>
                </div>
                </div>
                <?php
            }
            } else { 
            ?>
            <div class="alert alert-info" role="alert">
                <b>TR</b>: Sipariş geçmişiniz boş. Sipariş geçmişinizi görmek için sipariş vermeye başlayın.
            </div>
            <a href="/web-project/pages/menu" class="btn btn-dark">Menüye Git</a>
            <?php 
            } 
            ?>
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
