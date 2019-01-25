<?php session_start();

// Récupération et Sanitisation

$gender = $_POST['gender'];
$firstname_people = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$name_people = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
$street = filter_var($_POST['street'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$street_number = filter_var($_POST['street_number'], FILTER_SANITIZE_NUMBER_INT);
$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$postal_code = filter_var($_POST['postal_code'], FILTER_SANITIZE_NUMBER_INT);



$tout = (empty($_POST['tout'])) ? 0 : 1;
if (!empty($tout)) {
    $opt_email = 1;
    $opt_phone = 1;
    $opt_poste = 1;
} else {
    $opt_email = (empty($_POST['opt_email'])) ? 0 : 1;
    $opt_phone = (empty($_POST['opt_phone'])) ? 0 : 1;
    $opt_poste = (empty($_POST['opt_poste'])) ? 0 : 1;
}

	// Connect to MySQL
try
{
    $dbhost = 'localhost';
    $dbname = 'Hyundai';
    $dbusername = 'root';
    $dbpassword = 'root';

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

    $stmt = $link->prepare("INSERT INTO formulaire (date_apply, gender, firstname_people, name_people, email, phone, street, street_number, city, postal_code, opt_email, opt_phone, opt_poste)
                            VALUES (:date_apply, :gender, :firstname_people, :name_people, :email, :phone, :street, :street_number, :city, :postal_code, :opt_email, :opt_phone, :opt_poste)");

    $dt = date("Y-m-d H:i:s");
    $stmt->bindParam(':date_apply', $dt);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':firstname_people', $firstname_people);
    $stmt->bindParam(':name_people', $name_people);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':street_number', $street_number);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':opt_email', $opt_email);
    $stmt->bindParam(':opt_phone', $opt_phone);
    $stmt->bindParam(':opt_poste', $opt_poste);


    // insertion d'une ligne
    $stmt->execute();
    $_SESSION['flash'] = Modal;
    header('Location: index.php');
    exit;

}

catch(Exception $e)
{
        "En cas d'erreur, on affiche un message et on arrête tout";
        die('Erreur : '.$e->getMessage());
}

?>