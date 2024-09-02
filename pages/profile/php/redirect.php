<?php
if(isset($_GET['delete'])) {
    $deleteStatus = $_GET['delete'];
    if($deleteStatus == 'success') {
        // Hesap silme başarılı ise bu sayfayı göster
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Hesap Silindi</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <style>
                .full-height {
                    height: 100vh; /* Tam sayfa yüksekliği */
                }
            </style>
        </head>
        <body>
            <div class="container full-height d-flex flex-column justify-content-center align-items-center">
                <h1 style="text-align: center;">Hesabınız başarıyla silindi!</h1>
                <p style="text-align: center;">10 saniye içinde anasayfaya yönlendirileceksiniz..</p>
                <div class="spinner-border text-danger" role="status" style="display: block; margin: 0 auto;">
                    <span class="sr-only"></span>
                </div>
            </div>

            <script>
            setTimeout(function(){
                window.location.href = "/web-project";
            }, 10000); // 10 saniye sonra anasayfaya yönlendirme
            </script>
        </body>
        </html>
        <?php
    } elseif($deleteStatus == 'error') {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Hesap Silme Hatası</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <style>
                .full-height {
                    height: 100vh; /* Tam sayfa yüksekliği */
                }
            </style>
        </head>
        <body>
            <div class="container full-height d-flex flex-column justify-content-center align-items-center">
                <h1 style="text-align: center;">Hesap silme işlemi sırasında bir hata oluştu!</h1>
                <p style="text-align: center;">Lütfen daha sonra tekrar deneyin veya destek ekibimizle iletişime geçin.</p>
                <div>
                    <a href="/web-project/pages/profile" class="btn btn-dark">Profil Sayfasına Geri Dön</a>
                    <a href="/web-project/pages/contact" class="btn btn-info">İletişim'e geç.</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
}

if (isset($_GET['update'])){
    $updateStatus = $_GET['update'];
    if($updateStatus == 'success') {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Profil Güncellendi</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <style>
                .full-height {
                    height: 100vh; /* Tam sayfa yüksekliği */
                }
            </style>
        </head>
        <body>
            <div class="container full-height d-flex flex-column justify-content-center align-items-center">
                <h1 style="text-align: center;">Profiliniz başarıyla güncellendi!</h1>
                <p style="text-align: center;">10 saniye içinde profil sayfasına yönlendirileceksiniz..</p>
                <div class="spinner-border text-success" role="status" style="display: block; margin: 0 auto;">
                    <span class="sr-only"></span>
                </div>
            </div>

            <script>
            setTimeout(function(){
                window.location.href = "/web-project/pages/profile";
            }, 10000); // 10 saniye sonra profil sayfasına yönlendirme
            </script>
        </body>
        </html>
        <?php
    } elseif($updateStatus == 'error') {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Profil Güncelleme Hatası</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <style>
                .full-height {
                    height: 100vh; /* Tam sayfa yüksekliği */
                }
            </style>
        </head>
        <body>
            <div class="container full-height d-flex flex-column justify-content-center align-items-center">
                <h1 style="text-align: center;">Profil güncelleme işlemi sırasında bir hata oluştu!</h1>
                <p style="text-align: center;">Lütfen daha sonra tekrar deneyin veya destek ekibimizle iletişime geçin.</p>
                <div>
                    <a href="/web-project/pages/profile" class="btn btn-dark">Profil Sayfasına Geri Dön</a>
                    <a href="/web-project/pages/contact" class="btn btn-info">İletişim'e geç.</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
}
?>
