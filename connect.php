<?php
$host = 'local';
$dbname = 'Talentenschow';
$user = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['birthdate']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
            
            // Gegevens opschonen
            $name = htmlspecialchars($_POST['name']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $birthdate = $_POST['birthdate'];
            $mobile = htmlspecialchars($_POST['mobile']);
            $address = htmlspecialchars($_POST['address']);

            // E-mail valideren
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Ongeldig e-mailadres!");
            }

            // SQL-query met prepared statements
            $sql_insert = "INSERT INTO bestelen (name, lastname, email, birthdate, mobile, address) VALUES (:name, :lastname, :email, :birthdate, :mobile, :address)";
            $stmt_insert = $dbh->prepare($sql_insert);
            $stmt_insert->bindParam(':name', $name);
            $stmt_insert->bindParam(':lastname', $lastname);
            $stmt_insert->bindParam(':email', $email);
            $stmt_insert->bindParam(':birthdate', $birthdate);
            $stmt_insert->bindParam(':mobile', $mobile);
            $stmt_insert->bindParam(':address', $address);
            $stmt_insert->execute();

            echo "Bestelling succesvol geplaatst!";
        } else {
            echo "Vul alle velden in!";
        }
    }
} catch (PDOException $e) {
    echo "Fout: " . $e->getMessage();
}
?>
