<?php
    session_start();

    // GET isteğinden ürün ID'sini al
    $productId = isset($_GET['food_id']) ? $_GET['food_id'] : null;

    // Ürünü sepetten kaldır
    if (isset($_SESSION['basket_items'])) {
        foreach ($_SESSION['basket_items'] as $key => $item) { 
            // Sepetteki her bir ürünü kontrol et ve ürün ID'si eşleşiyorsa sepetten kaldır
            if (isset($item['food_id']) && $item['food_id'] == $productId) { 
                unset($_SESSION['basket_items'][$key]); // Ürünü sepetten kaldır (diziden çıkar)
                // unset() fonksiyonu, belirtilen dizideki belirtilen anahtara sahip öğeyi kaldırır.
            }
        }
    }

    header('Location: /web-project/pages/basket'); // Sepet sayfasına yönlendir
?>