<?php
    function formulaireContact($file){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if( strlen($_POST['message'])>=5 && !empty($_POST['nom']) && !empty($_POST['prenom']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                if($_POST['raison']=='Service comptable' || $_POST['raison']=='Support technique' || $_POST['raison']=='Autre'){
                    $civilite = $_POST['civilite'];
                    $nom = ($_POST['nom']);
                    $prenom = ($_POST['prenom']);
                    $email = htmlspecialchars($_POST['email']);
                    $raison = $_POST['raison'];
                    $message = htmlspecialchars($_POST['message']);

                    $data=array($civilite,$nom,$prenom,$email,$raison,$message);

                    file_put_contents(
                        $file,
                        implode(' ',$data)."\n",
                        FILE_APPEND
                    );

                    echo "
                    <div class='reponseFormContact'>
                    <h4>Merci pour votre message, $civilite $nom</h4>
                    <p>Prénom: $prenom</p>
                    <p>Email: $email</p>
                    <p>Raison du contact: $raison</p>
                    <p>Message: $message</p>
                    </div>
                    ";
                }
            }
        }
    }
        ?>