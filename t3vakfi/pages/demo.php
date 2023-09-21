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

// Verileri SQL sorgusu ile veritabanından alın
$sql = "SELECT * FROM firma1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma1 Verileri İncele</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Verileri İncele</h1>
    <table>
        <tr>
            <th>Kullanıcı ID</th>
            <th>Kriz Durumu</th>
            <th>Kriz Derecesi</th>
            <th>Saat Saat</th>
            <th>Saat Dakika</th>
            <th>Yer</th>
            <th>İkramlık Bilgisi</th>
            <th>Çay Bilgisi</th>
            <th>Kahve Bilgisi</th>
            <th>Soğuk İçecek Bilgisi</th>
            <th>Durum Bilgisi</th>
            <th>Alt Durum Bilgisi</th>
            <th>Alt Durum Bilgisi Damacana 2</th>
            <th>Alt Durum Bilgisi Yemek 2</th>
            <th>Alt Durum Bilgisi Görevli 2</th>
            <th>Adet</th>
            <th>Resim</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['kullaniciID'] . "</td>";
                echo "<td>" . $row['krizDurumu'] . "</td>";
                echo "<td>" . $row['altKrizDurumu'] . "</td>";
                echo "<td>" . $row['saatSaat'] . "</td>";
                echo "<td>" . $row['saatDakika'] . "</td>";
                echo "<td>" . $row['yer'] . "</td>";
                echo "<td>" . $row['ikramlikBilgisi'] . "</td>";
                echo "<td>" . $row['cayBilgisi'] . "</td>";
                echo "<td>" . $row['kahveBilgisi'] . "</td>";
                echo "<td>" . $row['sogukBilgisi'] . "</td>";
                echo "<td>" . $row['durumBilgisi'] . "</td>";
                echo "<td>" . $row['altDurumBilgisi'] . "</td>";
                echo "<td>" . $row['altDurumBilgisiDamacana2'] . "</td>";
                echo "<td>" . $row['altDurumBilgisiYemek2'] . "</td>";
                echo "<td>" . $row['altDurumBilgisiGorevli2'] . "</td>";
                echo "<td>" . $row['adet'] . "</td>";
                echo "<td><a href='" . $row['resim'] . "'>" . $row['resim'] . "</a></td>";
                echo "</tr>";
                
            }
        } else {
            echo "<tr><td colspan='5'>Veri bulunamadı.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Veritabanı bağlantısını kapatma
$conn->close();
?>
