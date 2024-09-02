<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Restoran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand me-2" href="/web-project">Restoran</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel">Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel/php/add.php">Kullanıcı Ekle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/web-project/pages/panel/php/list.php">Kullanıcıları Listele</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/web-project">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/menu">Menüler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/chefs/">Şeflerimiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-project/pages/contact/">İletişim</a>
            </li> -->
          </ul>
        </div>
        <!-- <div class="login-register-container">
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/login/"
              >Giriş Yap</a
            >
          </button>
          <button type="button" class="btn btn-dark">
            <a class="nav-link" href="/web-project/pages/register/"
              >Kayıt Ol</a
            >
          </button>
        </div> -->
      </div>
    </nav>

    <!-- Body -->

    <div class="container position-absolute top-50 start-50 translate-middle">
      <h1 class="text-center mb-5">Kullanıcıları Listele</h1>

      <div class="mb-3">
      <form action="" method="GET">
        <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Kullanıcı adı veya e-posta ile ara">
        <button class="btn btn-dark" type="submit">Ara</button>
        </div>
      </form>
      </div>

      <?php 
      require_once '../../../php/db.php'; 
      // db.php dosyasını çağır ve içeriğini al
      // Bu dosya, veritabanı bağlantısını sağlar ve $conn adında bir değişken içerir.
      // Bu değişken, veritabanı bağlantısını temsil eder.
      // "require_once" dosyanın yalnızca bir kez çağrılmasını sağlar.
      
      // Arama parametresinin ayarlanıp ayarlanmadığını kontrol edin
      if(isset($_GET['search'])) {
        $search = $_GET['search'];
        // search parametresini al

        $sql = "SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
        // "users" tablosundan "username" veya "email" değeri "$search" olan kayıtları getir.
        // LIKE - Belirtilen bir kalıpla eşleşen bir değer arar.
        // % - Herhangi bir karakter dizisini temsil eder.
      } else {
        // Eğer search parametresi belirtilmemişse tüm kullanıcıları getir.
        $sql = "SELECT * FROM users";
      }
      
      $result = $conn->query($sql); 
      // sorguyu çalıştır ve sonucu result değişkenine ata.
      // query() - Bir sorguyu veritabanında çalıştırır.

      if ($result->num_rows > 0) { // num_rows dönen satır sayısını döndürür.
        // “->” bir metoda veya nesnenin bir özelliğine erişmek için kullanılır.
        // fetch_assoc() - Bir sonuç kümesinden bir satır alır ve bir ilişkisel diziyi döndürür.
        echo "<table class='table table-striped'>"; // table-striped - Çizgili tablo satırları
        echo "<thead>";
        echo "<tr class='text-center'>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Kullanıcı Adı</th>";
        echo "<th scope='col'>E-posta</th>";
        echo "<th scope='col'>Rol</th>";
        echo "<th scope='col'>İşlem</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while($row = $result->fetch_assoc()) { 
          // sonuçları dizi olarak al ve row değişkenine ata
          // fetch_assoc() - Bir sonuç kümesinden bir satır alır ve bir ilişkisel diziyi döndürür.
          echo "<tr class='text-center'>";
          echo "<th scope='row'>" . $row["id"] . "</th>";
          echo "<td>" . $row["username"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td class='text-uppercase'>" . $row["role"] . "</td>";
          echo "
                <td>
                  <a class='btn btn-dark w-50' href='edit.php?id=" . $row["id"] . "'>Düzenle</a>
                  <a class='btn btn-dark w-25' href='delete.php?id=" . $row["id"] . "'>Sil</a>
                </td>
              "; 
              // id parametresi, düzenlenecek veya silinecek kullanıcının id'sini içerir.
              // id parametresini al ve edit.php ve delete.php sayfalarına yönlendir.

          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
      } else {
        echo "0 sonuç";
      }
      $conn->close(); // Bağlantıyı kapatır.
      ?>

    </div>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2020 Tüm hakları saklıdır.
        <a class="text-body" href="/web-project">Restoran</a>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
