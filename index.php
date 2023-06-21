<?php
require_once("functions.php");
include 'header.php';


if (isset($_SESSION['id'])) {
  
    $buttonText = "Déconnexion";
    $buttonLink = "deconnexion.php";
    $additionalButtons = "";
    $sessionInfo = $_SESSION;

} else {
  
    $buttonText = "Connexion";
    $buttonLink = "connexion.php";
    $additionalButtons = "<a class='btn btn-primary btn-lg' href='contact.php' role='button'>Contact </a>";
    $sessionInfo = null;
}

?>

<div class='row'>
    <div class='jumbotron bg-light m-2 p-2'>
        <h1 class='display-4'>Geo Trouve-Tout!</h1>
        <hr class='my-4'>
        <p>Cliquez sur l'un des boutons ci-dessous pour obtenir une liste des membres ou des types d'abonnements</p>
        <p class='lead'>
            <a class='btn btn-primary btn-lg' href='membres.php' role='button'>Membres </a>
            <a class='btn btn-primary btn-lg' href='categories.php' role='button'>Catégories </a>
            <a class='btn btn-primary btn-lg' href='annonces.php' role='button'>Annonces </a>
            <a class='btn btn-primary btn-lg' href='<?php echo $buttonLink; ?>' role='button'><?php echo $buttonText; ?></a>
            <?php echo $additionalButtons; ?>
        </p>
        <?php var_dump($sessionInfo); ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>