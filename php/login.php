<?php
    session_start();
    require_once('db.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($email) && isset($password)) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // Sonuçları dizi olarak al
            // mysqli_fetch_assoc() - Sonuçları dizi olarak alır

            // Kullanıcı kimliğini ve adını oturum değişkenlerinde saklama
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['basket_items'] = [];
            header('Location: /web-project');
            // echo "<script>alert('Giriş başarılı!')</script>";
            // echo "<script>console.log('".json_encode($_SESSION)."')</script>"; // TEST EDİLİYOR
        } else {
            echo "<script>
                    if(confirm('Kayıt olmak istiyor musunuz?')) window.location.href = '/web-project/pages/register';
                    else window.location.href = '/web-project/pages/login';
                </script>";
        }
    }
?>
