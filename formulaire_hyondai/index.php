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
            <form id="formulaire" method="POST" action="formulaire.php">
                <p>Prénom :</p>
                <input type="text" name="firstname">
                <p>Nom :</p>
                <input type="text" name="name">
                <p>E-mail :</p>
                <input type="email" id="email" name="email">
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
                        <li><input type="checkbox" name="opt_email" value="1">E-mail</li>
                        <li><input type="checkbox" name="opt_phone" value="2">Téléphone</li>
                        <li><input type="checkbox" name="opt_poste" value="3">La poste</li>
                    </ul>
                </div>
                <p>Attention, si on ne reçoit pas un opt-in, on ne sera plus capable de vous contacter.</p>
                <input id="submit" type="submit" value="Envoyer">
            </form>
        </div>
    </section>

    <div id="modal" class="modal-content">
        <div clas="Modal-Body">
            <p>Le formulaire a été envoyer, merci pour vos réponses.</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        // Validation du formulaire et Regex
        $(function() {
            $("#formulaire").validate({
                rules: {
                    "firstname": {
                        minlength: 2,
                        maxlength: 30,
                        regex: /^(?=.*?[A-Za-z])[A-Za-z+]+$/
                    },
                    "name": {
                        minlength: 2,
                        maxlength: 30,
                        regex: /^(?=.*?[A-Za-z])[A-Za-z+]+$/
                    },
                    "email": {
                        required: true,
                        email: true,
                        regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    },
                    "confidentialite": {
                        required: true
                    },
                    "contact": {
                        required: true
                    },
                    "donneePartenaire": {
                        required: true
                    }
                }
            })
            
            $.extend(jQuery.validator.messages, {
                required: "Ce champs est obligatoire",
                email: "Merci de mettre une adresse e-mail valide",
                minlength: $.validator.format("Veuillez entrer minimun {0} caractères."),
                maxlength: $.validator.format("Veuillez entrer maximum {0} caractères."),   
            });

            jQuery.validator.addMethod(
                "regex",
                function(value, element, regexp) {  
                    if (regexp.constructor != RegExp)
                        regexp = new RegExp(regexp);
                    else if (regexp.global)
                        regexp.lastIndex = 0;
                    return this.optional(element) || regexp.test(value);
                },"Erreur, merci de mettre des caractères accepter"
            );
            // Activer la Modal
            $("#modal").hide('slow');

            
        });

    </script>
</body>
</html>