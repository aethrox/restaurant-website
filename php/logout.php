<?php
    session_start(); // Session'ı başlat

    // Session'daki kullanıcı bilgilerini sil
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_role']);
    unset($_SESSION['basket_items']);

    // unset() - silme işlemi yapar ve değişkeni yok eder

    session_destroy(); // Session'ı sonlandır

    header('Location: /web-project'); // Yönlendir
?>
