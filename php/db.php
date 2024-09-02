<?php

    require_once 'config.php';

    // $pdo = new PDO("mysql:host=localhost;dbname=restaurant;charset=UTF8", "root", "");

    // if($pdo) {
    //     echo "Bağlantı başarılı";
    // } else {
    //     echo "Bağlantı başarısız";
    //}
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if(!$conn) {
        die('Bağlantı başarısız: ' . mysqli_connect_error());
        echo "Bağlantı başarısız";
    }

?>