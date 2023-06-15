<?php

// Import de functions.php
require_once("functions.php");
try {
    // Récupération des abos avec la fonction getAbos() définie dans functions.php
    $categories=getCategories();
} catch (Exception $e) {
    // Afficher le message en cas d'envoi d'exception
    echo $e->getMessage();
}

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='membres.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>

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
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Categories</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorie) : ?>
            <tr>
                    <td><?= $categorie['id'] ?></td>
                    <td><?= !empty($categorie['nom_categorie']) ? htmlentities($categorie['nom_categorie']) : '' ?></td>
                    <td><?= !empty($categorie['description_categorie']) ? htmlentities($categorie['description_categorie']) : '' ?></td>   
                <td>
                        <a class='btn btn-primary' href='categories-form.php?id=<?= $categorie['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-categories.php?id=<?= $categorie['id'] ?>' role='button'onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='categories-form.php' role='button'>Ajouter categorie</a>
    </div>
</div>

<?php require_once 'footer.php' ?>