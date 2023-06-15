<?php

require_once 'functions.php';

if (!empty($_POST)) {
    // Récupération des champs du formulaire
    $nom_categorie = $_POST['nom_categorie'] ?? '';
    $description_categorie = $_POST['description_categorie'] ?? '';

    // Création de l'objet BDD
    $db = connect();

    // Si un abo a un ID, il est déjà enregistré en BDD, donc on le met à jour, sinon on le crée.
    if (empty($_POST['id'])) {
        $createCategorieQuery = mysqli_prepare($db, "INSERT INTO categories (nom_categorie, description_categorie) VALUES (?, ?)");
        mysqli_stmt_bind_param($createCategorieQuery, "ss", $nom_categorie, $description_categorie);
        if (!mysqli_stmt_execute($createCategorieQuery)){
               $type = 'error';
                $message = 'Categorie non ajouté: '. mysqli_error($db);
        }
        elseif (!mysqli_stmt_affected_rows($createCategorieQuery)){
            $type = 'error';
            $message = 'Categorie non ajouté';
        }else{
            $type = 'success';
            $message = 'Categorie ajouté';
        }
    } else {
         // L'abonnement existe en BDD, on le met à jour
        // Récupération de l'ID de l'abo
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        $updateCategorieQuery = mysqli_prepare($db, "UPDATE categories SET nom_categorie=?, description_categorie=? WHERE id=?");
        mysqli_stmt_bind_param($updateCategorieQuery, "ssi", $nom_categorie, $description_categorie, $id);
        if (!mysqli_stmt_execute($updateCategorieQuery)){
               $type = 'error';
                $message = 'Categorie non mis à jour: '. mysqli_error($db);
        }
        elseif (!mysqli_stmt_affected_rows($updateCategorieQuery)){
            $type = 'error';
            $message = 'Categorie non mis à jour';
        }else{
            $type = 'success';
            $message = 'Categorie mis à jour';
        }
    }
    // Fermeture des connexions à la BDD    mysqli_close($db);
    mysqli_close($db);

    // Redirection vers la page principale des abos en passant le message et son type en variables GET
    header('location:' . 'categories.php?type=' . $type . '&message=' . $message);
}