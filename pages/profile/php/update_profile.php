<?php
    require_once '../../../php/db.php';
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id=$id"; // Güncelleme sorgusu
    if ($conn->query($sql) === TRUE) { // Sorgu başarılıysa profil sayfasına yönlendir
        header("Location: ./redirect.php?update=success"); // ?update=success parametresi ile güncelleme başarılı olduğunu belirt
    } else {
        header("Location: ./redirect.php?update=error"); // ?update=error parametresi ile güncelleme başarısız olduğunu belirt
    }

    $conn->close(); // Bağlantıyı kapat
?>