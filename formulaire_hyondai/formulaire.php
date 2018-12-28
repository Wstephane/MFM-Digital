<?php

// Sanitisation

$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// var_dump($name);

// Validation

if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['confidentialite']) && !empty($_POST['contact']) && !empty($_POST['donneePartenaire'])) {
    
}

$tout = (empty($_POST['tout'])) ? 0 : 1;
if (!empty($tout)){
    $choix1 = 1;
    $choix2 = 1;
    $choix3 = 1;
} else {
    $choix1 = (empty($_POST['choix1'])) ? 0 : 1;
    $choix2 = (empty($_POST['choix2'])) ? 0 : 1;
    $choix3 = (empty($_POST['choix3'])) ? 0 : 1;
}

print_r($_POST);

try
{
	// On se connecte à MySQL
    $dbhost = 'localhost';
    $dbname = 'Hyundai';
    $dbusername = 'root';
    $dbpassword = 'root';

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

    $statement = $link->prepare('INSERT INTO formulaire (date, firstname, name, email, opt_email, opt_phone, opt_poste)
    VALUES (:date, :firstname, :name, :email, :opt_email, :opt_phone, :opt_poste)');

    $statement->execute([
    'date' => NOW(),
    'firstname' => $firstname,
    'name' => $name,
    'email' => $email,
    'opt_email' => $choix1,
    'opt_phone' => $choix2,
    'opt_poste' => $choix3,
    ]);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>