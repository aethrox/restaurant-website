<!-- BU SAYFA ARTIK KULLANILMIYOR ! -->
<?php
    header("Location: /web-project"); // Bu sayfa kullanılmadığı için anasayfaya yönlendiriyoruz
    exit;
?>
<!-- Bazı sayfaların yapım aşamasında olduğunu belirtmek için kullanılan sayfaydı burası -->

<!DOCTYPE html>
<html>
<head>
    <title>Sayfa Yapım Aşamasında</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        
        .animation {
            animation: rotate 1s 2; /* 2 kere 1 saniye döndürme */
        }
        
        @keyframes rotate {
            0% {
                transform: rotatex(0deg); /* x ekseni etrafında döndürme 0 derece */
                
            }
            100% {
                transform: rotatex(360deg); /* x ekseni etrafında döndürme 360 derece */
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="animation"><b class="text-info"><?php echo $_GET['page'] ?></b> Sayfası Yapım Aşamasında</h1>
                <br />
                <p>Bu sayfa üzerinde çalışıyoruz. Lütfen daha sonra tekrar kontrol edin!</p>
                <br />
                <a href="/web-project" class="btn btn-info">Anasayfaya Geri Dön</a>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
