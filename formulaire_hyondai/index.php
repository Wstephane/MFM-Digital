<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice Formulaire php</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <section>
        <div>
            <form method="POST" action="formulaire.php">
                <p>Prénom :</p>
                <input type="text" name="firstname">
                <p>Nom :</p>
                <input type="text" name="name">
                <p>E-mail :</p>
                <input type="text" name="email">
                <div>
                    <input type="checkbox" name="confidentialite">Oui, j’accepte la <a href="https://www.hyundai.be/fr/legal.html">déclaration de confidentialité</a> de Hyundai.
                </div>
                <div>
                    <input type="checkbox" name="contact">Oui, je souhaite être tenu au courant des événements à venir, des promotions exclusives et des offres intéressantes concernant les produits et/ou les services proposés par Hyundai. J'accepte que l’on me contacte pour des fins de marketing.
                </div>
                <div>
                    <input type="checkbox" name="donneePartenaire">Oui, j'accepte de transférer mes données personnelles au partenaire Hyundai afin de recevoir des offres intéressantes concernant les services financiers (assurance, financement, etc.). Ci-dessous, j'indique mes canaux de communication préférés.
                </div>
                <div>
                    <p>Ci-dessous, j'indique mes canaux de communication préférés.</p>
                    <input type="checkbox" name="tout">e-mail, téléphone et la poste
                    <ul>
                        <li><input type="checkbox" name="choix1" value="1">e-mail</li>
                        <li><input type="checkbox" name="choix2" value="2">téléphone</li>
                        <li><input type="checkbox" name="choix3" value="3">la poste</li>
                    </ul>
                </div>
                <p>Attention, si on ne reçoit pas un opt-in, on ne sera plus capable de vous contacter.</p>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </section>
</body>
</html>