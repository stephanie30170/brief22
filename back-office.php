<?php // lancement d'une session
include_once("sessioninit.php");
// vérification de la session
if (isset($_SESSION["user"]) AND is_array($_SESSION["user"])) {
// yes, alors bienvenue
include("backofficetemplate.php"); } else { // bye
header("Location: index.html#mauvaise-session"); exit; // exit après une redirection
} ?>