<?php include('header.php'); ?>
<main>
    <section id="CONTACT">
        <h2>Page de contact</h2>

        <div>
            <form class="formulaireContact" action="index.php?page=contact" method="POST">
                <label for="civilite">Civilité:</label>
                <select name="civilite" id="civilite">
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="Mademoiselle">airbus A242</option>
                </select>

                <label for="nom">Nom:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['nom'])){
                        echo "<p class='wrong'>Entré un nom valide</p>";
                    }
                }
                ?>
                <input type="text" id="nom" name="nom">

                <label for="prenom">Prénom:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['prenom'])){
                        echo "<p class='wrong'>Entré un prenom valide</p>";
                    }
                }
                ?>
                <input type="text" id="prenom" name="prenom">

                <label for="email">Email:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        echo "<p class='wrong'>Entré un email valide</p>";
                    }
                }
                ?>
                <input type="email" id="email" name="email">

                <label>Raison du contact:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['raison'])){
                        if($_POST['raison']!='Service comptable' || $_POST['raison']!='Support technique' || $_POST['raison']!='Autre'){
                            echo "<p class='wrong'>Selectionner l'un des 3 choix</p>";
                        }
                    }
                }
                ?>
                <input type="radio" id="service_comptable" name="raison" value="Service comptable">
                <label for="service_comptable">Service comptable</label>
                <input type="radio" id="support_technique" name="raison" value="Support technique">
                <label for="support_technique">Support technique</label>
                <input type="radio" id="autre" name="raison" value="Autre">
                <label for="autre">Autre</label>

                <label for="message">Message:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if ( strlen($_POST['message'])<5){
                        echo '<p class="wrong">message trop court</p>';
                    }
                }
                ?>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if( strlen($_POST['message'])>=5 && !empty($_POST['nom']) && !empty($_POST['prenom']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                if($_POST['raison']=='Service comptable' || $_POST['raison']=='Support technique' || $_POST['raison']=='Autre'){
                    $civilite = $_POST['civilite'];
                    $nom = ($_POST['nom']);
                    $prenom = ($_POST['prenom']);
                    $email = htmlspecialchars($_POST['email']);
                    $raison = $_POST['raison'];
                    $message = htmlspecialchars($_POST['message']);

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
        ?>
    </section>
</main>

<?php include('footer.php'); ?>