<?php
// Slaat een ticketbestelling op (formulier op bestellen.html)
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: bestellen.html');
    exit;
}

$velden = ['name', 'lastname', 'email', 'birthdate', 'mobile', 'address'];
$data = [];
foreach ($velden as $veld) {
    $data[$veld] = trim($_POST[$veld] ?? '');
    if ($data[$veld] === '') {
        toon_melding('Niet alles ingevuld', 'Vul alle velden in en probeer het opnieuw.');
    }
}

if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    toon_melding('Ongeldig e-mailadres', 'Controleer je e-mailadres en probeer het opnieuw.');
}

try {
    // Prepared statement: de invoer komt nooit in de SQL zelf
    $stmt = $dbh->prepare("INSERT INTO bestelen (name, lastname, email, birthdate, mobile, address) VALUES (:name, :lastname, :email, :birthdate, :mobile, :address)");
    $stmt->execute($data);
    toon_melding('Bedankt voor je bestelling!', "Je ticket is besteld, {$data['name']}. We sturen de bevestiging naar {$data['email']}.");
} catch (PDOException $e) {
    error_log($e->getMessage());
    toon_melding('Er ging iets mis', 'Je bestelling kon niet worden opgeslagen. Probeer het later opnieuw.');
}
