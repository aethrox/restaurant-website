<?php 
    session_start();
    $_SESSION['basket_items'] = []; // Sepeti boşalt
    header('Location: /web-project/pages/basket'); // Sepet sayfasına yönlendir
?>