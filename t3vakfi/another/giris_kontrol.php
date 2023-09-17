<?php
session_start();
// Veritabanı bağlantısı
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "t3vakfi";

// POST isteği ile gelen Kullanıcı ID'sini alın
$kullaniciID = $_POST['kullaniciID'];

// Veritabanına bağlantı oluşturma
$conn = new mysqli($serverName, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Kullanıcı ID'sini kullanarak veritabanında sorgulama yapın
$sql = "SELECT * FROM kullanicilar WHERE kullaniciID = '$kullaniciID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kullanıcı ID'si bulundu, kullanıcıyı form sayfasına yönlendirin
    $_SESSION['kullaniciID'] = $kullaniciID;
    header("Location: /t3vakfi/firma.html");
} else {
    // Kullanıcı ID'si bulunamadı, hata mesajı gösterin veya başka bir işlem yapın
    echo "Geçersiz Kullanıcı ID. Lütfen tekrar deneyin.";
}

// Veritabanı bağlantısını kapatın
$conn->close();
?>
