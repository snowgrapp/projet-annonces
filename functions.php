



<?php

session_start(); // Démarre la session (doit être appelé avant toute sortie HTML)

// Connexion à la base de données et renvoie l'objet PDO
function connect() {
    // hôte
    $hostname = 'localhost';

    // nom de la base de données
    $dbname = 'projet_annonces';

    // identifiant et mot de passe de connexion à la BDD
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        die('Erreur : ' . mysqli_connect_error()); // Terminer l'exécution en cas d'erreur de connexion
    }
    return $conn;
}

// Récupération d'un membre en fonction de l'adresse e-mail
function getMembreByMail($mail) {
    try {
        $db = connect();
        $query = mysqli_prepare($db, 'SELECT * FROM membres WHERE mail = ?');
        mysqli_stmt_bind_param($query, "s", $mail);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        if (mysqli_num_rows($result) > 0) {
            // Renvoie toutes les informations de l'utilisateur
            return mysqli_fetch_assoc($result);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
}

// Fonction de connexion de l'utilisateur
function loginUser() {
    $mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL); // Ne pas utiliser filter_var ici
    $membre = getMembreByMail($mail);
    if ($membre) {
        if (password_verify($_POST['hash_'], $membre['hash_'])) {
            /* Vérifier l'état du compte utilisateur ici si nécessaire
            if ($membre['actif']) {
                $_SESSION['is_login'] = true;
                $_SESSION['is_actif'] = $membre['actif'];
                $_SESSION['id'] = $membre['id'];
                return array("success", "Connexion réussie :)");
            } else {
                return array("error", "Veuillez activer votre compte");
            }*/
            $_SESSION['is_login'] = true; 
            $_SESSION['id'] = $membre['id'];
            return array("success", "Connexion réussie :)");
        } else {
            return array("error", "Mauvais identifiants");
        }
    } else {
        return array("error", "Mauvais identifiants");
    }
}

?>
