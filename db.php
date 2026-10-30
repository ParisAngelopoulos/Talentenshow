<?php
// Databaseverbinding, gedeeld door connect.php (tickets) en aanmelden.php (deelnemers)
// On the web host, db_config.php (written on deploy, not in git) holds the login; locally XAMPP defaults
$c = is_file(__DIR__ . '/db_config.php') ? require __DIR__ . '/db_config.php' : [];
$host = $c['host'] ?? 'localhost';
$dbname = $c['database'] ?? 'talentenshow';
$user = $c['user'] ?? 'root';
$password = $c['password'] ?? '';

$dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Laat een bedankpagina (of fout) zien in de stijl van de site
function toon_melding($titel, $tekst) {
    ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TalentenShow</title>
</head>
<body>
    <nav>
        <div class="logo"><a href="index.html"><img src="Images/logo.png" alt="Logo"></a></div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="bestellen.html">Bestellen</a></li>
            <li><a href="aanmelden.html">Aanmelden</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1><?php echo htmlspecialchars($titel); ?></h1>
        <p><?php echo htmlspecialchars($tekst); ?></p>
        <p><a href="index.html">Terug naar de homepage</a></p>
    </div>
</body>
</html>
    <?php
    exit;
}
