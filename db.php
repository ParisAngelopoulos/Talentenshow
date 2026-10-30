<?php
// Databaseverbinding, gedeeld door connect.php (tickets) en aanmelden.php (deelnemers)
// The database is a SQLite file in private/ (not reachable from the web). The first time it is
// missing, it is created from private/database.sql with the example data, so no setup is needed.
$file = __DIR__ . '/private/database.sqlite';
$new = !is_file($file);

$dbh = new PDO('sqlite:' . $file);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($new) {
    $dbh->exec(file_get_contents(__DIR__ . '/private/database.sql'));
}

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
        <a class="logo" href="index.html"><img src="Images/logo.png" alt="TalentenShow"></a>
        <ul class="nav-links" style="display:flex">
            <li><a href="index.html">Home</a></li>
            <li><a href="bestellen.html">Tickets</a></li>
            <li><a href="aanmelden.html">Meedoen</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="melding">
            <h1><?php echo htmlspecialchars($titel); ?></h1>
            <p><?php echo htmlspecialchars($tekst); ?></p>
            <a href="index.html" class="btn">Terug naar de homepage</a>
        </div>
    </div>
</body>
</html>
    <?php
    exit;
}
