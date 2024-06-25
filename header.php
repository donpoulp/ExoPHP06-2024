<!-- header -->
<?php session_start();
$id_session = session_id();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if($_GET['page']=='contact'){
    echo "<title>Contact-page</title>";
    }
    if($_GET['page']=='home'){
        echo "<title>Home-page</title>";
        }
    ?>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body>
    <header id="Header">
        <nav>
            <ul>
                <li><a href="index.php?page=home">Accueil</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </nav>
        <h1>Bienvenue sur le site du BOSS</h1>
    </header>