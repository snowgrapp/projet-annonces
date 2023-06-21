<?php require_once 'header.php' ?>   
<!DOCTYPE html>
<html>
    <head>
<title>Contact</title>
<meta charset="UTF-8">
    </head>
    <h1>Contactez nous !</h1>
<body>
<form method="POST">   
<p>Un problème, une question ? N'hésitez pas à prendre contact avec nous</p>
<form method="POST">
<div>
<p><label for="nom">Votre nom</label>
<input type="text" id="nom" name="nom" placeholder="maxence" required"></p>
<p><label for="email">Votre e-mail</label>
<input type="email" id="email" name="email" placeholder="monadresse@mail.com" required"></p>
<label for="sujet">Quel est le sujet de votre message ?</label>
<input type="texte" id="sujet" name="sujet" required"></p>
<label for="sujet">Message</label>
<input type="texte" id="message" name="message" required"></p>

<input type="submit" id="submit" value="Envoyer" class="btn btn-primary">

</form>


</body>
</html
<?php require_once 'footer.php' ?>