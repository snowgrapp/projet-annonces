<?php require_once("functions.php");
require_once 'header.php';
session_unset();
session_destroy();
$message = array("success", "Vous êtes déconnecté");
header("Location: index.php");