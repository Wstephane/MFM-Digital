<?php session_start();

// Sanitisation

$firstname_people = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$name_people = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Validation


// if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['confidentialite']) && !empty($_POST['contact']) && !empty($_POST['donneePartenaire'])) {

// } else {
//     include 'modal.php';
// }

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

try
{
	// Connect to MySQL
    $dbhost = 'localhost';
    $dbname = 'Hyundai';
    $dbusername = 'root';
    $dbpassword = 'root';

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

    $stmt = $link->prepare("INSERT INTO formulaire (date_apply, email, firstname_people, name_people, opt_email, opt_phone, opt_poste, phone, street, street_number, city, postal_code)
                            VALUES (:date_apply, :email, :firstname_people, :name_people, :opt_email, :opt_phone, :opt_poste, :phone, :street, :street_number, :city, :postal_code)");

    $dt = date("Y-m-d H:i:s");
    $stmt->bindParam(':date_apply', $dt);
    $stmt->bindParam(':firstname_people', $firstname_people);
    $stmt->bindParam(':name_people', $name_people);
    $stmt->bindParam(':email', $email);

    $stmt->bindParam(':opt_email', $opt_email);
    $stmt->bindParam(':opt_phone', $opt_phone);
    $stmt->bindParam(':opt_poste', $opt_poste);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':street_number', $street_number);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':postal_code', $postal_code);


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