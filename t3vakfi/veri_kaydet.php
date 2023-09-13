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

// Formdan gelen verileri alın
$krizDurumu = $_POST['krizDurumu'];
$altKrizDurumu = isset($_POST['altKrizDurumu']) ? $_POST['altKrizDurumu'] : null;
$yer = $_POST['yer'];
$durumBilgisi = $_POST['durumBilgisi'];
$altDurumBilgisi = isset($_POST['altDurumBilgisi']) ? $_POST['altDurumBilgisi'] : "-";

$damacanaAdet = isset($_POST['damacanaAdet']) ? $_POST['damacanaAdet'] : "-";


$saatSaat = isset($_POST['saatSaat']) ? $_POST['saatSaat'] : null;
$saatDakika = isset($_POST['saatDakika']) ? $_POST['saatDakika'] : null;
$adet = $_POST['adet'];
$resim = file_get_contents($_FILES['resim']['tmp_name']);

// SQL sorgusunu oluşturun ve verileri tabloya ekleyin
$sql = "INSERT INTO firma (krizDurumu, altKrizDurumu, yer, durumBilgisi, altDurumBilgisi, damacanaAdet, saatSaat, saatDakika, adet, resim) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssisiii", $krizDurumu, $altKrizDurumu, $yer, $durumBilgisi, $altDurumBilgisi, $damacanaAdet, $saatSaat, $saatDakika, $adet, $resim);

if ($stmt->execute()) {
    echo "Veri başarıyla kaydedildi.";
} else {
    echo "Veri kaydedilirken bir hata oluştu: " . $stmt->error;
}

// Bağlantıyı kapatın
$stmt->close();
$conn->close();
?>
