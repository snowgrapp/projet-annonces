<?php
require_once 'functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    // Récupérer $id depuis l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $db = connect();
    $deleteMembreQuery = mysqli_prepare($db, "DELETE FROM membres WHERE id=?");
    mysqli_stmt_bind_param($deleteMembreQuery, "i", $id);
    if (!mysqli_stmt_execute($deleteMembreQuery)){
           $type = 'error';
            $message = 'Membre non supprimé : '. mysqli_error($db);
    }
    elseif (!mysqli_stmt_affected_rows($deleteMembreQuery)){
        $type = 'error';
        $message = 'Membre non supprimé';
    }else{
        $type = 'success';
        $message = 'Membre supprimé';
    }

    // Fermeture de la connexion à la BDD
    mysqli_close($db);

    // Redirection vers la page principale des membres en passant le message et son type en variables GET
    header('location:' . 'membres.php?type=' . $type . '&message=' . $message);
} else {
    //Redirection vers l'Accueil s'il n'y a pas d'ID membre 
    header('location:'. 'index.php');
}