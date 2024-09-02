<?php 
    require_once '../../../php/db.php';
    session_start(); // Session'ı başlat
    $id = $_POST['id'];
    
    // Kullanıcıya ait siparişleri sil
    $deleteOrdersSql = "DELETE FROM orders WHERE user_id=$id";
    $conn->query($deleteOrdersSql); // Sorguyu çalıştır
    
    // Kullanıcıyı silme sorgusu
    $deleteUserSql = "DELETE FROM users WHERE id=$id"; 
    
    if ($conn->query($deleteUserSql) === TRUE) { // Sorgu başarılıysa ana sayfaya yönlendir
        session_destroy(); // Session'ı sonlandır
        header("Location: ./redirect.php?delete=success"); // ?delete=success parametresi ile silme işlemi başarılı olduğunu belirt
    } else {
        header("Location: ./redirect.php?delete=error"); // ?delete=error parametresi ile silme işlemi başarısız olduğunu belirt
    }
    
    $conn->close(); // Bağlantıyı kapat
?>