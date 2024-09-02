<?php
    require_once '../../../php/db.php';
    // db.php dosyasını dahil et
    // Bu dosya, veritabanı bağlantısını sağlar ve $conn değişkenini içerir.
    // Bu değişken, veritabanı bağlantısını temsil eder.
    // "require_once" dosyanın sadece bir kez dahil edilmesini sağlar.

    $id = $_GET['id'];
    // id parametresini al
    // id parametresi, silinecek kullanıcının id'sini içerir.

    $sql = "DELETE FROM users WHERE id=$id";
    // DELETE - Belirtilen koşula uyan kayıtları siler.
    // "users" tablosundan "id" değeri "$id" olan kaydı sil.

    if ($conn->query($sql) === TRUE) { // sorguyu çalıştır ve sonucu kontrol et (TRUE ise)
        header('Location: list.php'); // list.php sayfasına yönlendir.
    } else {
        echo "Kayıt silinirken hata oluştu: " . $conn->error; // hata varsa ekrana yazdır
    }

    $conn->close(); // bağlantıyı kapat

?>