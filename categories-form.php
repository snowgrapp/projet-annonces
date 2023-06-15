<?php

// Import des fonctions
require_once 'functions.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un abo. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if (isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $db = connect();
    $categorieQuery = mysqli_prepare($db, "SELECT * FROM categories WHERE id=?");
    mysqli_stmt_bind_param($categorieQuery, "i", $id);
    if (!mysqli_stmt_execute($categorieQuery))
        echo mysqli_error($db);
    else{
        $categorieResult=mysqli_stmt_get_result($categorieQuery);
        $categorie = mysqli_fetch_assoc($categorieResult);
    }
    mysqli_close($db);
}

$categories=getCategories();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categories.php' class='btn btn-secondary m-2 active' role='button'>Categories</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Categories Form</h1>
</div>
<div class='row'>
    <form method='post' action='add-edit-categories.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $categorie['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='nom'>Nom</label>
            <input type='text' name='nom_categorie' class='form-control' id='nom_categorie' placeholder='Saisir nom' required autofocus value='<?= isset($categorie['nom_categorie']) ? htmlentities($categorie['nom_categorie']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description'>Description</label>
            <input type='text' name='description_categorie' class='form-control' id='description_categorie' placeholder='Saisir description' required value='<?= isset($categorie['description_categorie']) ? htmlentities($categorie['description_categorie'])  : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>