<?php

require_once 'functions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test = LoginUser();
    if ($test[0] === "success") {
        header("Location: index.php");
    }
    print_r($test);
}
?>
<?php require_once 'header.php' ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Connexion</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif;
        $sessionStatus = session_status();

        if ($sessionStatus === PHP_SESSION_DISABLED) {
            echo "Les sessions sont désactivées sur le serveur.";
        } elseif ($sessionStatus === PHP_SESSION_NONE) {
            echo "Aucune session n'est active.";
        } elseif ($sessionStatus === PHP_SESSION_ACTIVE) {
            echo "Une session est active.";
        } ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="mail">Mail membre</label>
                <input type="text" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="hash_">Mot de passe</label>
                <input type="text" class="form-control" id="hash_" name="hash_" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
            <a href="mdp-oubli.php">Mot de passe oublié ?</a>

    
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>