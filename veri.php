<?php
// SQLite veritabanı dosyasına bağlanma
$db = new SQLite3('my_database.db');

// Veritabanında 'dates' tablosunu oluşturma (eğer yoksa)
$db->exec("CREATE TABLE IF NOT EXISTS dates (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT
)");

// Eğer form submit edilirse, veritabanına tarih kaydediyoruz
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Bugünün tarihini alıyoruz
    $todayDate = date('Y-m-d H:i:s'); // 'Y-m-d H:i:s' formatında (Örnek: 2025-01-25 12:34:56)

    // Veritabanına tarih kaydetme
    $stmt = $db->prepare("INSERT INTO dates (date) VALUES (:date)");
    $stmt->bindValue(':date', $todayDate, SQLITE3_TEXT);
    $stmt->execute();

    // Kayıt başarılı mesajı
    $message = "Bugünün tarihi kaydedildi: " . $todayDate;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarih Kaydetme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f7f7f7;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #e7f7e7;
            border-left: 5px solid #4CAF50;
        }
    </style>
</head>
<body>

    <h1>Tarih Kaydetme Formu</h1>

    <!-- Tarih kaydetme formu -->
    <form method="POST" action="">
        <button type="submit">Tarihi Kaydet</button>
    </form>

    <!-- Eğer tarih kaydedildiyse, mesajı göster -->
    <?php if (isset($message)): ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

</body>
</html>

<?php
// Veritabanı bağlantısını kapatma
$db->close();
?>
