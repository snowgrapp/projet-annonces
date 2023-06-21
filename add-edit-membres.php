<?php

require_once 'functions.php';

if (!empty($_POST)) {
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $cp = !empty($_POST['cp']) ? $_POST['cp'] : null;
    $ville = $_POST['ville'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $surnom = $_POST['surnom'] ?? '';
    $hash_ = $_POST['hash_'] ?? '';

    $db = connect();


    // Un membre n'a un ID que si ses infos sont déjà enregistrées en BDD, donc on vérifie s'il  le membre a un ID.
    if (empty($_POST['id'])) {
        $hashedPassword = password_hash($_POST['hash_'], PASSWORD_DEFAULT);
        $isActif = 1; // Remplacez la valeur par celle que vous souhaitez utiliser

        $createMembreQuery = mysqli_prepare($db, "INSERT INTO membres (prenom, nom, adresse, cp, ville, date_naissance, mail, telephone, surnom, hash_, is_actif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($createMembreQuery, "ssssssssssi", $prenom, $nom, $adresse, $cp, $ville, $date_naissance, $mail, $telephone, $surnom, $hashedPassword, $isActif);
        


        if (!mysqli_stmt_execute($createMembreQuery)) {
            $type = 'error';
            $message = 'Membre non ajouté: ' . mysqli_error($db);
        } elseif (!mysqli_stmt_affected_rows($createMembreQuery)) {
            $type = 'error';
            $message = 'Membre non ajouté';
        } else {
            $type = 'success';
            $message = 'Membre ajouté';
        }


    } else {
        // Le membre existe, on met à jour ses informations

        // Récupération de l'ID du membre
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $updateMembreQuery = mysqli_prepare($db, "UPDATE membres SET prenom=?, nom=?, adresse=?, cp=?, ville=?, date_naissance=?, mail=?, telephone=?, surnom=?, hash_=? WHERE id=?");
        mysqli_stmt_bind_param($updateMembreQuery, "ssssssssssi", $prenom, $nom, $adresse, $cp, $ville, $date_naissance, $mail, $telephone, $surnom, $hash_, $id);
        if (!mysqli_stmt_execute($updateMembreQuery)) {
            $type = 'error';
            $message = 'Membre non mis à jour: ' . mysqli_error($db);
        } elseif (!mysqli_stmt_affected_rows($updateMembreQuery)) {
            $type = 'error';
            $message = 'Membre non mis à jour';
        } else {
            $type = 'success';
            $message = 'Membre mis à jour';
        }

    }

    // Fermeture des connexions à la BDD
    mysqli_close($db);

    // Redirection vers la page principale des membres en passant le message et son type en variables GET
    header('location:' . 'membres.php?type=' . $type . '&message=' . $message);
}