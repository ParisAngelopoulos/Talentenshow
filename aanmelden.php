<?php
// Slaat een aanmelding als deelnemer op (formulier op aanmelden.html)
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: aanmelden.html');
    exit;
}

$velden = ['name', 'lastname', 'birthdate', 'mobile', 'address', 'category'];
$data = [];
foreach ($velden as $veld) {
    $data[$veld] = trim($_POST[$veld] ?? '');
    if ($data[$veld] === '') {
        toon_melding('Niet alles ingevuld', 'Vul alle velden in en probeer het opnieuw.');
    }
}

if (!in_array($data['category'], ['Singing', 'Dancing', 'Comedy', 'Magic'], true)) {
    toon_melding('Ongeldige categorie', 'Kies een categorie uit de lijst.');
}

try {
    $stmt = $dbh->prepare("INSERT INTO aanmeldingen (name, lastname, birthdate, mobile, address, category) VALUES (:name, :lastname, :birthdate, :mobile, :address, :category)");
    $stmt->execute($data);
    toon_melding('Je bent aangemeld!', "Leuk dat je meedoet, {$data['name']}. We nemen contact met je op via {$data['mobile']}.");
} catch (PDOException $e) {
    error_log($e->getMessage());
    toon_melding('Er ging iets mis', 'Je aanmelding kon niet worden opgeslagen. Probeer het later opnieuw.');
}
