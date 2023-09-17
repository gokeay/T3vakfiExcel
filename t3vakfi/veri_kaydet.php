<?php
session_start();
if (!isset($_SESSION['kullaniciID'])) {
    // Oturumda kullaniciID yoksa, giriş yapmadan geldiği için başka bir işlem yapabilirsiniz.
    // Örneğin, tekrar giriş yapmalarını isteyebilirsiniz.
    // veya başka bir sayfaya yönlendirebilirsiniz.
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
$krizDurumu = $_POST['krizDurumu'];
$altKrizDurumu = isset($_POST['altKrizDurumu']) ? $_POST['altKrizDurumu'] : "-";
$yer = $_POST['yer'];
$durumBilgisi = $_POST['durumBilgisi'];
$altDurumBilgisi = isset($_POST['altDurumBilgisi']) ? $_POST['altDurumBilgisi'] : "-";
$saatSaat = isset($_POST['saatSaat']) ? $_POST['saatSaat'] : null;
$saatDakika = isset($_POST['saatDakika']) ? $_POST['saatDakika'] : null;
$adet = $_POST['adet'];

// Yüklenen resim dosyasını bir sunucu dizinine kaydetme
$upload_dir = "D:/Xampp/htdocs/t3vakfi/resimler/"; // Kayıt edilecek klasör
$upload_file = $upload_dir . basename($_FILES["resim"]["name"]);

if (move_uploaded_file($_FILES["resim"]["tmp_name"], $upload_file)) {
    echo "Resim başarıyla yüklendi ve veritabanına kaydedildi.";
} else {
    echo "Resim yüklenirken hata oluştu.";
}

// Resmin URL'sini veritabanına kaydetme
$image_url = "http://localhost/t3vakfi/resimler/" . basename($_FILES["resim"]["name"]);

// SQL sorgusunu oluşturun ve verileri tabloya ekleyin
$sql = "INSERT INTO firma (kullaniciID, krizDurumu, altKrizDurumu, yer, durumBilgisi, altDurumBilgisi, saatSaat, saatDakika, adet, resim) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssiiss", $kullaniciID, $krizDurumu, $altKrizDurumu, $yer, $durumBilgisi, $altDurumBilgisi, $saatSaat, $saatDakika, $adet, $image_url);

if ($stmt->execute()) {
    echo "Veri başarıyla kaydedildi.";
    header("Location: /t3vakfi/tesekkurler.html");
} else {
    echo "Veri kaydedilirken bir hata oluştu: " . $stmt->error;
}

// Bağlantıyı kapatın
$stmt->close();
$conn->close();
?>
