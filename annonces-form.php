<?php

// Import des fonctions
require_once 'functions.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un abo. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if (isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $db = connect();
    $annonceQuery = mysqli_prepare($db, "SELECT * FROM annonces WHERE id=?");
    mysqli_stmt_bind_param($annonceQuery, "i", $id);
    if (!mysqli_stmt_execute($annonceQuery))
        echo mysqli_error($db);
    else{
        $annonceResult=mysqli_stmt_get_result($annonceQuery);
        $annonce = mysqli_fetch_assoc($annonceResult);
    }
    mysqli_close($db);
}

$annonces=getAnnonces();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categories.php' class='btn btn-secondary m-2 active' role='button'>Categories</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Annonces Formumaire</h1>
</div>
<div class='row'>
    <form method='post' action='add-edit-annonces.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $annonce['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='titre'>Titre</label>
            <input type='text' name='titre' class='form-control' id='titre' placeholder='Saisir le titre' required autofocus value='<?= isset($annonce['titre']) ? htmlentities($annonce['titre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description'>Description</label>
            <input type='text' name='description_annonce' class='form-control' id='description_annonce' placeholder='Saisir description' required value='<?= isset($annonce['description_annonce']) ? htmlentities($annonce['description_annonce'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='prix de vente'>Prix de vente</label>
            <input type='int' name='prix_vente' class='form-control' id='prix_vente' placeholder='Saisir le prix' required value='<?= isset($annonce['prix_vente']) ? htmlentities($annonce['prix_vente'])  : '' ?>'>
        </div>
        
        
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>