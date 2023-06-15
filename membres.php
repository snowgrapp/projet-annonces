<?php

// Import de functions.php
require_once("functions.php");
try {
    // Récupération des abos avec la fonction getAbos() définie dans functions.php
    $membres=getMembres();
} catch (Exception $e) {
    // Afficher le message en cas d'envoi d'exception
    echo $e->getMessage();
}

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categories.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>

<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Membres</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Adresse postale</th>
                <th scope='col'>Code postale</th>
                <th scope='col'>Ville</th>
                <th scope='col'>Date de naissance</th>
                <th scope='col'>Mail</th>
                <th scope='col'>Telephone</th>
                <th scope='col'>Surnom</th>
                <th scope='col'>Mot de passe</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membres as $membre) : ?>
                <tr>
                 <td><?= $membre['id'] ?></td>
                 <td><?= !empty($membre['prenom']) ? htmlentities($membre['prenom']) : '' ?></td>
                 <td><?= !empty($membre['nom']) ? htmlentities($membre['nom']) : '' ?></td>
                 <td><?= !empty($membre['adresse']) ? htmlentities($membre['adresse']) : '' ?></td>
                 <td><?= !empty($membre['cp']) ? htmlentities($membre['cp']) : '' ?></td>
                 <td><?= !empty($membre['ville']) ? htmlentities($membre['ville']) : '' ?></td>
                 <td><?= !empty($membre['date_naissance']) ? htmlentities($membre['date_naissance']) : '' ?></td>
                 <td><?= !empty($membre['mail']) ? htmlentities($membre['mail']) : '' ?></td>
                 <td><?= !empty($membre['telephone']) ? htmlentities($membre['telephone']) : '' ?></td>
                 <td><?= !empty($membre['surnom']) ? htmlentities($membre['surnom']) : '' ?></td>
                 <td><?= !empty($membre['hash_']) ? htmlentities($membre['hash_']) : '' ?></td>
                 <td>
                  <a class='btn btn-primary' href='membres-form.php?id=<?= $membre['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-membres.php?id=<?= $membre['id'] ?>' role='button'onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='membres-form.php' role='button'>Ajouter membre</a>
    </div>
</div>

<?php require_once 'footer.php' ?>







