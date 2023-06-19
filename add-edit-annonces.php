<?php

require_once 'functions.php';

if (!empty($_POST)) {
    // Récupération des champs du formulaire
    $titre = $_POST['titre'] ?? '';
    $description_annonce = $_POST['description_annonce'] ?? '';
    $prix_vente = $_POST['prix_vente'] ?? '';

    $db = connect();

    // Si un abo a un ID, il est déjà enregistré en BDD, donc on le met à jour, sinon on le crée.
    if (empty($_POST['id'])) {
        $createAnnonceQuery = mysqli_prepare($db, "INSERT INTO annonces (titre, description_annonce, prix_vente) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($createAnnonceQuery, "sss", $titre, $description_annonce, $prix_vente);
        if (!mysqli_stmt_execute($createAnnonceQuery)) {
            $type = 'error';
            $message = 'Annonce non ajouté: ' . mysqli_error($db);
        } elseif (!mysqli_stmt_affected_rows($createAnnonceQuery)) {
            $type = 'error';
            $message = 'Annonce non ajouté';
        } else {
            $type = 'success';
            $message = 'Annonce ajouté';
        }
    } else {
        // L'abonnement existe en BDD, on le met à jour
        // Récupération de l'ID de l'abo
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        $updateAnnonceQuery = mysqli_prepare($db, "UPDATE annonces SET titre=?, description_annonce=?, prix_vente=? WHERE id=?");
        mysqli_stmt_bind_param($updateAnnonceQuery, "sssi", $titre, $description_annonce, $prix_vente, $id);
        if (!mysqli_stmt_execute($updateAnnonceQuery)) {
            $type = 'error';
            $message = 'Annonce non mis à jour: ' . mysqli_error($db);
        } elseif (!mysqli_stmt_affected_rows($updateAnnonceQuery)) {
            $type = 'error';
            $message = 'Annonce non mis à jour';
        } else {
            $type = 'success';
            $message = 'Annonce mis à jour';
        }
    }
    // Fermeture des connexions à la BDD    mysqli_close($db);
    mysqli_close($db);

    // Redirection vers la page principale des abos en passant le message et son type en variables GET
    header('location:' . 'annonces.php?type=' . $type . '&message=' . $message);
}