<?php
    session_start();
    $food_id = isset($_GET['food_id']) ? $_GET['food_id'] : null; // food_id kontrol edilir
    if (!$food_id) { // food_id yoksa hata döndür ve işlemi sonlandır
        echo json_encode(['status' => 'error', 'message' => 'Geçersiz food_id']); // Geçersiz food_id hatası
        exit;
    }
    
    $basket = $_SESSION['basket_items'] ?? []; // Sepet kontrol edilir eğer yoksa boş bir dizi oluşturulur
    $new_basket = []; // Yeni bir sepet oluşturulur

    foreach ($basket as $item) { // Her bir sepet öğesi için
        if ($item['food_id'] == $food_id) { // Öğe seçilen öğe ile eşleşiyorsa
            if ($item['quantity'] > 1) { // Öğeden birden fazla varsa, miktarı bir azalt
                $item['quantity'] -= 1; 
            } else { // Öğeden sadece bir tane varsa, sepetten kaldır
                continue;
            }
        }
        $new_basket[] = $item; // Seçilen öğe dışındaki diğer öğeleri yeni sepete ekle
    }

    $_SESSION['basket_items'] = $new_basket; // Sepeti güncelle
    header('Location: /web-project/pages/basket'); // Sepet sayfasına yönlendir
?>
