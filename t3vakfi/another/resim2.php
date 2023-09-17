<?php
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

// HTML formundan gelen verileri alma
$isim = $_POST["isim"];

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

// Veritabanına veri ekleme
$sql = "INSERT INTO resim (isim, resim) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $isim, $image_url);

if ($stmt->execute()) {
    echo "Veri başarıyla eklendi.";
} else {
    echo "Veri eklenirken hata oluştu: " . $stmt->error;
}

// Bağlantıyı kapat
$stmt->close();
$conn->close();
?>
