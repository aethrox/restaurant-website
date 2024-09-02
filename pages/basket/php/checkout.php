<?php
    session_start();
    require_once '../../../php/db.php';
    $basket = $_SESSION['basket_items'] ?? []; // Eğer sepet boşsa boş bir dizi oluştur
    $total = 0; // Toplam tutar
    foreach ($basket as $item) { // Sepetteki her bir ürünün fiyatı ve miktarı ile çarpıp toplam tutara ekliyoruz
        $total += $item['food_price'] * $item['quantity'];
    }
    $total = number_format($total, 2); // Toplam tutarı 2 basamaklı hale getiriyoruz
    $user_id = $_SESSION['user_id']; // Kullanıcı ID'si
    $basket_items = json_encode($basket); // Sepetteki ürünleri JSON formatına çeviriyoruz
    $date = date('Y-m-d H:i:s'); // Sipariş tarihi ve saati (Yıl-Ay-Gün Saat:Dakika:Saniye)
    if ($conn->connect_error) { // Veritabanı bağlantı hatası kontrolü
        die('Bağlantı hatası: ' . $conn->connect_error); // Bağlantı hatası varsa ekrana yazdırıyoruz
    }
    $sql = "INSERT INTO orders (user_id, basket_items, total_price, date) VALUES ('$user_id', '$basket_items', '$total', '$date')";
    // Sipariş bilgilerini veritabanına ekliyoruz
    if ($conn->query($sql) === TRUE) { // Sorgu başarılıysa sepeti boşaltıyoruz ve kullanıcıyı siparişler sayfasına yönlendiriyoruz
        $_SESSION['basket_items'] = [];
        header('Location: /web-project/pages/basket');
    } else {
        echo 'Hata: ' . $sql . '<br>' . $conn->error;
    }
    $conn->close();
?>