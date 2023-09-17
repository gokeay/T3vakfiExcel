<?php
// Veritabanı bağlantısı
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "t3vakfi";

// Veritabanına bağlantı oluşturma
$conn = new mysqli($serverName, $username, $password, $dbname);

// Bağlantı hata kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// İsim ve tip verilerini formdan al
$isim = $_POST['isim'];
$tip = $_POST['tip'];

// Rastgele, benzersiz 6 haneli bir kullanıcı ID oluştur
function generateRandomUserID($conn) {
    $unique = false;
    $userID = "";
    while (!$unique) {
        $userID = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $checkQuery = "SELECT COUNT(*) as count FROM kullanicilar WHERE kullaniciID = '$userID'";
        $result = $conn->query($checkQuery);
        if ($result && $result->fetch_assoc()['count'] == 0) {
            $unique = true;
        }
    }
    return $userID;
}

// Benzersiz bir kullanıcı ID oluştur
$kullaniciID = generateRandomUserID($conn);

// Veritabanına kullanıcıyı ekle
$sql = "INSERT INTO kullanicilar (kullaniciID, isim, tip) VALUES ('$kullaniciID', '$isim', '$tip')";

if ($conn->query($sql) === TRUE) {
    echo "Kullanıcı başarıyla eklendi. Kullanıcı ID: $kullaniciID";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
