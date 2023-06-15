<?php

// Import des fonctions
require_once 'functions.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un membre. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer le membre avec l'id spécifié. 
if (isset($_GET['id'])) {
    $db = connect();

    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $membreQuery = mysqli_prepare($db, "SELECT * FROM membres WHERE id=?");
    mysqli_stmt_bind_param($membreQuery, "i", $id);
    if (!mysqli_stmt_execute($membreQuery))
        echo mysqli_error($db);
    else{
        $membreResult=mysqli_stmt_get_result($membreQuery);
        $membre = mysqli_fetch_assoc($membreResult);
    }
    mysqli_close($db);
}

// Récupérer les abos 
$membres = getMembres();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categories.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Membre Form</h1>
</div>
<div class='row'>
    <form method='post' action='add-edit-membres.php'>
        <!--  Ajouter l'ID s'il existe mais mettre le champs en caché -->
        <input type='hidden' name='id' value='<?= $membre['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='prenom'>Prénom</label>
            <input type='text' name='prenom' class='form-control' id='prenom' placeholder='Saisir prénom' required autofocus value='<?= isset($membre['prenom']) ? htmlentities($membre['prenom']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='nom'>Nom</label>
            <input type='text' name='nom' class='form-control' id='nom' placeholder='Saisir nom' required value='<?= isset($membre['nom']) ? htmlentities($membre['nom'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='adresse'>Adresse</label>
            <input type='text' name='adresse' class='form-control' id='adresse' placeholder='Saisir adresse' required value='<?= isset($membre['adresse']) ? htmlentities($membre['adresse']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='cp'>Code postal</label>
            <input type='text' name='cp' class='form-control' id='cp' placeholder='Saisir code postal' required autofocus value='<?= isset($membre['cp']) ? htmlentities($membre['cp']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='ville'>Ville</label>
            <input type='text' name='ville' class='form-control' id='ville' placeholder='Saisir ville' required value='<?= isset($membre['ville']) ? htmlentities($membre['ville'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='date_naissance'>Date de naissance</label>
            <input type='date' name='date_naissance' class='form-control' id='date_naissance' placeholder='Saisir date_naissance' required value='<?= isset($membre['date_naissance']) ? htmlentities($membre['date_naissance']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='mail'>Mail</label>
            <input type='mail' name='mail' class='form-control' id='mail' placeholder='Saisir mail' required autofocus value='<?= isset($membre['mail']) ? htmlentities($membre['mail']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='tel'>Telephone</label>
            <input type='tel' name='telephone' class='form-control' id='telephone' placeholder='Saisir telephone' required value='<?= isset($membre['telephone']) ? htmlentities($membre['telephone'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='surnom'>Surnom</label>
            <input type='text' name='surnom' class='form-control' id='surnom' placeholder='Saisir surnom' required value='<?= isset($membre['surnom']) ? htmlentities($membre['surnom'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='mdp'>Mot de passe</label>
            <input type='text' name='hash_' class='form-control' id='hash_' placeholder='Saisir mdp' required value='<?= isset($membre['hash_']) ? htmlentities($membre['hash_'])  : '' ?>'>
        </div>
        <div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>

