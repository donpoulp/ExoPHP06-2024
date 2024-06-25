<?php include('header.php'); 
if(isset($_POST['envoyer'])){
$_SESSION['civilite']=$_POST['civilite'];
$_SESSION['nom']=$_POST['nom'];
$_SESSION['prenom']=$_POST['prenom'];
$_SESSION['email']=$_POST['email'];
$_SESSION['raison']=$_POST['raison'];
$_SESSION['message']=$_POST['message'];
}
?>
<main>
    <section id="CONTACT">
        <h2>Page de contact</h2>

        <div>
            <form class="formulaireContact" action="index.php?page=contact" method="POST">
                <label for="civilite">Civilité:</label>
                <select name="civilite" id="civilite">
                    <option value="<?php echo $_SESSION['civilite'] ?>"><?php echo $_SESSION['civilite'] ?></option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="airbus A242">airbus A242</option>
                </select>

                <label for="nom">Nom:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['nom'])){
                        echo "<p class='wrong'>Entré un nom valide</p>";
                    }
                }
                ?>
                <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'] ?>">

                <label for="prenom">Prénom:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['prenom'])){
                        echo "<p class='wrong'>Entré un prenom valide</p>";
                    }
                }
                ?>
                <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'] ?>">

                <label for="email">Email:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        echo "<p class='wrong'>Entré un email valide</p>";
                    }
                }
                ?>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>">

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
                <input type="radio" id="service_comptable" name="raison" value="Service comptable" <?php if($_SESSION['raison']=='Service comptable'){echo 'checked';} ?>>
                <label for="service_comptable">Service comptable</label>
                <input type="radio" id="support_technique" name="raison" value="Support technique" <?php if($_SESSION['raison']=='Support technique'){echo 'checked';} ?>>
                <label for="support_technique">Support technique</label>
                <input type="radio" id="autre" name="raison" value="Autre" <?php if($_SESSION['raison']=='Autre'){echo 'checked';} ?>>
                <label for="autre">Autre</label>

                <label for="message">Message:</label>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if ( strlen($_POST['message'])<5){
                        echo '<p class="wrong">message trop court</p>';
                    }
                }
                ?>
                <textarea id="message" name="message" rows="4" cols="50"><?php echo $_SESSION['message']?></textarea>

                <button type="submit" name="envoyer">Envoyer</button>
            </form>
        </div>

        <?php
        include('fonction.php');
        $file='fichier.txt';
        formulaireContact($file);
        ?>
    </section>
</main>

<?php include('footer.php'); ?>