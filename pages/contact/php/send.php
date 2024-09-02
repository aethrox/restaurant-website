<?php
// https://github.com/PHPMailer/PHPMailer?tab=readme-ov-file bu linkten PHPMailer'ı indirip projeme ekledim.
// Bu dosyayı PHPMailer'ı kullanarak mail göndermek için oluşturdum.
// sendgrid.net üzerinden mail gönderimi yapabilmek için sendgrid hesabı oluşturup API key aldım. 
// Bu API key'i kullanarak mail gönderimi yaptım.



use PHPMailer\PHPMailer\PHPMailer; // PHPMailer sınıfını kullanabilmek için ekliyoruz.
use PHPMailer\PHPMailer\SMTP; // SMTP sınıfını kullanabilmek için ekliyoruz. 
use PHPMailer\PHPMailer\Exception; // Exception sınıfını kullanabilmek için ekliyoruz.

require '../../../PHPMailer/src/Exception.php'; // PHPMailer'ın Exception sınıfını ekliyoruz.
require '../../../PHPMailer/src/PHPMailer.php'; // PHPMailer'ın PHPMailer sınıfını ekliyoruz.
require '../../../PHPMailer/src/SMTP.php'; // PHPMailer'ın SMTP sınıfını ekliyoruz.

if ($_SERVER["REQUEST_METHOD"] == "POST"){ // Formdan veri gelip gelmediğini kontrol ediyoruz.
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $mesaj = $_POST["message"];

    $mail = new PHPMailer(true); // PHPMailer sınıfından bir nesne oluşturuyoruz.

    try {
        //Server settings (SMTP ayarları)
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        // Debug modu şu işe yarar: Eğer mail gönderiminde bir hata olursa bu hata mesajını gösterir.
        $mail->CharSet = 'UTF-8'; // Türkçe karakter sorunu yaşamamak için UTF-8 kullanıyoruz.
        $mail->isSMTP(); // SMTP kullanarak mail göndermek istiyorsanız true yapın
        $mail->Host       = 'smtp.sendgrid.net';  // Kullandığınız mail servisinin SMTP sunucusu
        $mail->SMTPAuth   = true; // SMTP doğrulama kullanmak istiyorsanız true yapın
        $mail->Username   = '-';  // Gönderici mail adresi
        $mail->Password   = '-';  // Gönderici mail şifresi
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Güvenli bağlantı için ssl kullanabilirsiniz
        $mail->Port       = 465; // SMTP sunucunuzun bağlantı noktası

        // Alıcılar
        $mail->setFrom($email, $fullname);  // Gönderici bilgileri
        $mail->addAddress("kaand3mirel@gmail.com");  // Alıcının mail adresi

        // İçerik
        $mail->isHTML(true); 
        $mail->Subject = 'Yeni Mesaj';
        $mail->Body    = $mesaj;
        $mail->AltBody = $mesaj; // HTML desteklemeyen istemciler için düz metin

        $mail->send(); // Mail gönderme işlemi
        // echo 'Mesaj başarıyla gönderildi.';
        header("Location: /web-project/pages/contact?mail=success"); // Mesaj gönderildikten sonra contact sayfasına yönlendirme
    } catch (Exception $e) { // Hata durumunda
        // echo "Mesaj gönderilemedi. Hata: {$mail->ErrorInfo}"; // Hata mesajı göster
        header("Location: /web-project/pages/contact?mail=error"); // Hata durumunda contact sayfasına yönlendirme
    }
}
?>
