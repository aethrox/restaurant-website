<?php
    session_start();
    // session_start(), bir GET veya POST isteği aracılığıyla aktarılan veya bir çerez aracılığıyla aktarılan 
    // bir oturum tanımlayıcısına dayalı olarak bir oturum oluşturur veya mevcut oturumu devam ettirir.

    require_once('db.php');
    // db.php dosyasını çağır ve içeriğini al
    // Bu dosya, veritabanı bağlantısını sağlar ve $conn adında bir değişken içerir.
    // Bu değişken, veritabanı bağlantısını temsil eder.
    // "require_once" dosyanın yalnızca bir kez çağrılmasını sağlar.

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($username) && isset($email) && isset($password)) {
        // isset(), belirtilen değişkenin tanımlı olup olmadığını kontrol eder.

        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
        // INSERT INTO - Belirtilen tabloya yeni bir kayıt ekler.
        // "VALUES" - Eklenecek değerleri belirtir.
        // "role" değeri varsayılan olarak "user" belirlenir.
        // $username, $email ve $password değerleri formdan gelen verilerdir.

        $result = mysqli_query($conn, $sql);
        // mysqli_query(), belirtilen sorguyu belirtilen veritabanı bağlantısında çalıştırır.
        // $conn - veritabanı bağlantısını temsil eder.
        // $sql - çalıştırılacak sorgu.
        // $result - sorgunun sonucunu tutar.
        // Eğer sorgu başarılıysa TRUE, başarısızsa FALSE döner.

        if($result) {
            // Eğer sorgu başarılıysa ekrana yazdır ve işlemi bitir.
            // header(), belirtilen URL'ye yönlendirir.
            // "Location: /web-project/pages/login" - login sayfasına yönlendir.
            header('Location: /web-project/pages/login');
        } else {
            echo "Kayıt olurken bir hata oluştu. Lütfen tekrar deneyin.";
            header('Location: /web-project/pages/register');
        }
    }
?>