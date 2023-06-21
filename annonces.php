<?php

require_once("functions.php");
try {

    $annonces = getAnnonces();
} catch (Exception $e) {

    echo $e->getMessage();
}

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='membres.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>

<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')): ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès!
            <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')): ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur!
            <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Annonces</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Titre</th>
                <th scope='col'>Description</th>
                <th scope='col'>Prix de vente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annonces as $annonce): ?>
                <tr>
                    <td>
                        <?= $annonce['id'] ?>
                    </td>
                    <td>
                        <?= !empty($annonce['titre']) ? htmlentities($annonce['titre']) : '' ?>
                    </td>
                    <td>
                        <?= !empty($annonce['description_annonce']) ? htmlentities($annonce['description_annonce']) : '' ?>
                    </td>
                    <td>
                        <?= !empty($annonce['prix_vente']) ? htmlentities($annonce['prix_vente']) : '' ?>
                    </td>
                    <td>
                        <a class='btn btn-primary' href='annonces-form.php?id=<?= $annonce['id'] ?>'
                            role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-annonces.php?id=<?= $annonce['id'] ?>' role='button'
                            onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='annonces-form.php' role='button'>Ajouter annonce</a>
    </div>
</div>

<?php require_once 'footer.php' ?>