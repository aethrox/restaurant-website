# PHP'de yeni öğrendiklerim ve kullandıklarım

### `->`

* Nesne üyelerine (özellik ve yöntemler) erişmek için kullanılır.
* Nokta (.) operatörünün aksine nesnelerle kullanılır.
* Kod okunabilirliği ve tutarlılığı sağlar.    
* Sadece nesneler üzerinde kullanılır.
* Erişilen üyenin var olduğundan emin olun.

**Kullanım:**

```php
class Nesne {
  public $ozellik;
  public function metod() { }
}

$nesne = new Nesne();

echo $nesne->ozellik; // Nesne özelliğine erişim
$nesne->metod(); // Nesne metodu çağırma
```

<br><br>

---

<br><br>

### `fetch_assoc()`

**fetch_assoc() fonksiyonu:**

* Veritabanından veri çekmek için kullanılır.
* Tek bir satır veriyi alır ve onu ilişkilendirici bir diziye dönüştürür.
* İlişkili dizideki anahtarlar, sütun adlarına karşılık gelir.
* Değerler, her sütündaki gerçek verilere karşılık gelir.
* Artık satır kalmadıysa `null` döndürür.

**Faydaları:**

* Sütun adlarına göre veriye erişimi kolaylaştırır.
* Kod okunabilirliğini artırır.

**Dikkat Edilmesi Gerekenler:**

* Her seferinde tek bir satır getirir. Tüm satırları işlemek için tekrar tekrar çağırmanız gerekir.
* `fetch_assoc()` kullanmadan önce veritabanı bağlantınızın ve sorgunuzun başarılı olduğundan emin olun.

**Örnek:**

```php
<?php

// Veritabanına bağlanın (bilgilerinizi değiştirin)
$conn = mysqli_connect("localhost", "kullanıcı_adı", "şifre", "veritabanı");

// Sorgu çalıştırın
$result = mysqli_query($conn, "SELECT ad, eposta FROM kullanıcılar");

// Veriyi ilişkilendirici dizi olarak getirin
$kullanıcı = mysqli_fetch_assoc($result);

// Sütun adlarını kullanarak veriye erişin
echo "Ad: " . $kullanıcı["ad"] . "<br>";
echo "E-posta: " . $kullanıcı["eposta"] . "<br>";

// Bağlantıyı kapatın
mysqli_close($conn);

?>
```

<br><br>

---

<br><br>

### `$conn->query($sql) === TRUE`

**Kısa Özet:**

Bu kod satırı, `$sql` değişkeninde saklanan SQL sorgusunun veritabanında başarıyla çalıştırılıp çalıştırılmadığını kontrol eder. 

**Ayrıntılı Açıklama:**

* `$conn`: Veritabanı bağlantısını temsil eden bir nesnedir.
* `$sql`: Çalıştırılacak SQL sorgusunu içeren bir değişkendir.
* `->query()`: `$conn` nesnesinin bir yöntemidir ve SQL sorgusunu veritabanında çalıştırır.
* `=== TRUE`: Sorgunun başarılı olup olmadığını kontrol eder ve `TRUE` değeri, sorgunun başarıyla tamamlandığını gösterir.

**Kullanım Örneği:**

```php
<?php

// Veritabanına bağlanın
$conn = mysqli_connect("localhost", "username", "password", "database");

// SQL sorgusunu oluşturun
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'johndoe@example.com')";

// Sorguyu çalıştırın ve sonucu kontrol edin
if ($conn->query($sql) === TRUE) {
  echo "Yeni kullanıcı başarıyla eklendi!";
} else {
  echo "Hata: " . $conn->error;
}

// Bağlantıyı kapatın
mysqli_close($conn);

?>
```

Bu kodda, `$sql` sorgusu yeni bir kullanıcı eklemek için kullanılır. `$conn->query($sql) === TRUE` ifadesi, sorgunun başarıyla tamamlanıp tamamlanmadığını kontrol eder. Başarılı olursa, "Yeni kullanıcı başarıyla eklendi!" mesajı yazdırılır. Aksi takdirde, hata mesajı yazdırılır.

**Özetle:**

* `$conn->query($sql) === TRUE` ifadesi, veritabanı sorgularının hata ayıklama ve doğrulama için kullanılır.
* Sorgu başarısız olursa, hata mesajı yazdırmak veya gerekli işlemleri gerçekleştirmek için kullanılabilir.


<br><br>

---

<br><br>

### `require_once`

"require_once" ifadesi PHP'de **tek seferlik dosya ekleme** işlemini anlatır. İşte kısa bir özet:

* **Ne yapar?** Başka bir PHP dosyasının içeriğini bulunduğunuz sayfaya ekler.
* **Ne zaman kullanılır?** Sıkça kullandığınız fonksiyonlar, değişkenler veya kod parçacıklarını ayrı bir dosyada tutmak ve ihtiyaç duyduğunuzda o dosyayı eklemek için kullanılır.
* **Neden önemli?** Kod tekrarını önler, projenizi düzenli tutar ve kod okunabilirliğini artırır.
* **Tek seferlik ekleme:** Aynı dosyayı birden fazla `require_once` ile ekleseniz bile, dosya sadece bir kere eklenir. Bu hata oluşmasını ve gereksiz kod çalışmasını engeller.

**Kısaca:** Kodunuzu düzenli tutmak ve tekrarı önlemek için başka bir PHP dosyasını tek sefer olmak üzere sayfaya ekler.

<br><br>

---

<br><br>

### `define()`

**Ne işe yarar:** Sabit değerler oluşturmak için kullanılır. Bu değerler, programınız çalışırken değiştirilemez.

**Nasıl kullanılır:**

```php
define(isim, değer);
```

**Örnek:**

```php
define('PI', 3.14159);
echo PI; // 3.14159 yazar
```

**Faydaları:**

- Kod okunabilirliğini artırır.
- Kod bakımını kolaylaştırır.
- Sabit değerlerin kazayla değiştirilmesini önler.

**Dikkat Edilmesi Gerekenler:**

- Sabit değerler bir kez tanımlandıktan sonra değiştirilemez.
- Sabit adlarına öncü dolar işareti ($) konmaz.
