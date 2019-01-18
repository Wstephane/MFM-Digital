<?php session_start();
?>
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
    <section class="img">
        <div class="logo">
            <img src="img/Hyundai_Logo.jpg" alt="Logo Hyundai" width="540px" height="174px">
        </div>
        <div>
            <img src="img/banner.jpg" alt="Bannière de présentation" width="540px" height="388px">
        </div>
    </section>
    <section class="form">
        <h1>Inscrivez-vous maintenant et restez dans la famille Hyundai</h1>
        <div>
            <form id="formulaire" method="POST" action="formulaire.php">
                <div class="genre">
                    <input class="homme" type="radio" name="genre" value="1" checked>
                    <label for="Homme">Homme</label>
                    <input class="femme" type="radio" name="genre" value="2">
                    <label for="Femme">Femme</label>
                </div>
                <div class="champs">
                    <div class="prenom">
                        <p>Prénom :</p>
                        <input type="text" name="firstname">
                    </div>
                    <div class="nom">
                        <p>Nom :</p>
                        <input type="text" name="name">
                    </div>
                    <div class="e-mail">
                        <p>E-mail :</p>
                        <input id="email" type="email" name="email">
                    </div>
                </div>
                <div class="confidentialite">
                    <input id="confi" type="checkbox" name="confidentialite">Oui, j’accepte la <a href="https://www.hyundai.be/fr/legal.html">déclaration de confidentialité</a> de Hyundai.
                </div>
                <div class="contact">
                    <input id="cont" type="checkbox" name="contact">Oui, je souhaite être tenu au courant des événements à venir, des promotions exclusives et des offres intéressantes concernant les produits et/ou les services proposés par Hyundai. J'accepte que l’on me contacte pour des fins de marketing.
                </div>
                <div class="donneePartenaire">
                    <input id="donnee" type="checkbox" name="donneePartenaire">Oui, j'accepte de transférer mes données personnelles au partenaire Hyundai afin de recevoir des offres intéressantes concernant les services financiers (assurance, financement, etc.). Ci-dessous, j'indique mes canaux de communication préférés.
                </div>
                <div>
                    <p>Ci-dessous, j'indique mes canaux de communication préférés.</p>
                    <input class="all" type="checkbox" name="tout">E-mail, Téléphone et La poste
                    <ul>
                        <li><input class="email2" type="checkbox" name="opt_email" value="1">E-mail</li>
                        <li><input class="phone" type="checkbox" name="opt_phone" value="2">Téléphone</li>
                        <li><input class="poste" type="checkbox" name="opt_poste" value="3">La poste</li>
                    </ul>
                </div>
                <p>Attention, si on ne reçoit pas un opt-in, on ne sera plus capable de vous contacter.</p>
                <button id="submit" type="submit" value="Envoyer">Envoyer</button>
            </form>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Le formulaire a été envoyer, merci pour vos réponses.</p>
        </div>
    </div>

    <!-- Fin HTML -->

    <!-- Script jquery & Validation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        // Form & Regex Validation
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

            //Modal Activation
            $("#submit").on('click', function() {
                $(".modal").css("display", "block");
            });

            $(".close").on('click', function() {
                $(".modal").css("display", "none");
            });

            if ($("#all").on(:checked)) {
                $(".email2" || ".phone"|| ".poste").on(":checked");
            }


                // Test pour faire que si l'on clique en dehors de la modal, elle disparait.

            // $(document).ready(function() {
            //     if $(".modal").on('click', function() {
            //         $(".modal").css("display", "none");)
            //     } else {
            //         $(".modal-content").on('click', function() {
            //             $(".modal").css("display", "block");
            //         })
            //     }
                    
            //     });
            // });
            // $(window).on('click', function(event) {
            //     if (event.target == $('.modal-content')) {
            //         $(".modal").css("display", "none");
            //     }
            // });
        });
    </script>
</body>
</html>