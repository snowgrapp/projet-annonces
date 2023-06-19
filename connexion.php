<?php

require_once 'functions.php';
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $test=LoginUser();
    print_r($test);
}
?>
<?php require_once 'header.php' ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Connexion</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="mail">Mail membre</label>
                <input type="text" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="text" class="form-control" id="hash_" name="hash_" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>