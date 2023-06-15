<?php

// Connection à la base de données et renvoie l'objet PDO
function connect() {
    // hôte
    $hostname = 'localhost';

    // nom de la base de données
    $dbname = 'projet_annonces';

    // identifiant et mot de passe de connexion à la BDD
    $username = 'root';
    $password = '';
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$conn){
        echo('Erreur : ' .mysqli_connect_error());
    }else
    return $conn;

}

// Récupération d'une liste de tous les abos existant en BDD
function getCategories() {

        $db = connect();
        $query = mysqli_query($db, "SELECT * FROM categories");
        if (!$query)
            throw new Exception(mysqli_error($db));
        else
            return mysqli_fetch_all($query,MYSQLI_ASSOC);
}



function getMembres() {

    $db = connect();
    $query = mysqli_query($db, "SELECT * FROM membres");
    if (!$query)
        throw new Exception(mysqli_error($db));
    else
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
}


function getAnnonces() {

    $db = connect();
    $query = mysqli_query($db, "SELECT * FROM annonces");
    if (!$query)
        throw new Exception(mysqli_error($db));
    else
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
}

function Loguser() {
    $mail = filter_var(filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
    $membre = getMembreBymail($mail);
    if ($membre) {
        if (password_verify($_POST['hash_'], $membre['hash_'])) {
          /* /if ($membre['actif']) {
                $_SESSION['is_login']=true;
                $_SESSION['is_actif']=$membre['actif'];
                $_SESSION['id']=$membre['id'];*/
                return array("success", "Connexion réussie :)");
           /* } else {
               return array("error", "Veuillez activer votre compte");
            }*/
        } else {
            return array("error", "Mauvais identifiants");
        }
    } else {
        return array("error", "Mauvais identifiants");
    }
}

function getMembreBymail($mail) {
    try {
        $db = connect();
        $query = mysqli_prepare($db, 'SELECT * FROM membres WHERE mail = ?');
        mysqli_stmt_bind_param($query, "s", $mail);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        if (mysqli_num_rows($result) > 0) {
            // Renvoie toutes les infos de l'utilisateur
            return mysqli_fetch_assoc($result);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
}