<?php
if (isset($_POST['food_id']) && isset($_POST['food_name']) && isset($_POST['food_price'])) { // Eğer form gönderilmişse
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];

    if (isset($_SESSION['user_id'])) { // Eğer kullanıcı giriş yapmışsa 
        $basket = $_SESSION['basket_items'] ?? []; // Eğer sepet boşsa boş bir dizi oluştur

        $item = ['food_id' => $food_id, 'food_name' => $food_name, 'food_price' => $food_price]; // Eklenecek ürünü oluştur 

        $basket[] = $item; // Sepete ürünü ekle
        $_SESSION['basket_items'] = $basket; // Sepeti güncelle
    } 
}
?>