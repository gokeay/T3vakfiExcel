<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['kullaniciID'])) {
        header("Location: /t3vakfi/another/giris.html");
        exit;
    }

    // Kullanıcı ID'sini alın
    $kullaniciID = $_SESSION['kullaniciID'];

    // Veritabanı bağlantısı
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "t3vakfi";

    // Veritabanına bağlantı oluşturma
    $conn = new mysqli($serverName, $username, $password, $dbname);

    // Bağlantı hatasını kontrol etme
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Formdan gelen verileri alın
    $saat = $_POST['saat'];
    $yerBilgisi = $_POST['yerBilgisi'];
    $

    // Diğer verileri de almak gerekiyorsa buraya ekleyebilirsiniz.

    // SQL sorgusunu oluşturun ve verileri tabloya ekleyin
    $sql = "INSERT INTO tablo_adi (kullaniciID, saat, yerBilgisi) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $kullaniciID, $saat, $yerBilgisi);

    if ($stmt->execute()) {
        echo "Veri başarıyla kaydedildi.";
        header("Location: /t3vakfi/tesekkurler.html");
    } else {
        echo "Veri kaydedilirken bir hata oluştu: " . $stmt->error;
    }

    // Bağlantıyı kapatın
    $stmt->close();
    $conn->close();
}
?>
