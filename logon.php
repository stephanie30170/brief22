<?php

  // déclaration
  $goodUser = FALSE;

  // récupère les valeurs postées
  $postedLogin    = $_POST["login"] ?? FALSE;
  $postedPassword = $_POST["password"] ?? FALSE;
  
  // récupère les utilisateurs existants
  $usersFullpath = "conf/users.json";
  $usersContent  = file_get_contents($usersFullpath);
  $usersArray    = json_decode($usersContent, JSON_OBJECT_AS_ARRAY);

  // boucle sur les utilisateurs existants
  foreach ($usersArray as $key => $user) {
    // est-ce le bon login et le bon mot de passe ?
    if ($user["login"] === $postedLogin AND password_verify($postedPassword, $user["password"]) === TRUE) {
      $goodUser = $user;
    break;
    }
  }

  // utilisateur reconnu ?
  if ($goodUser) {

    // yes, alors bienvenue
    
    // lancement d'une session
    include_once("session-init.php");
    $_SESSION["user"]["login"] = $goodUser["login"]; // whoami
    header("Location: back-office.php");
    exit; // exit après une redirection

  } else {

    // bye
    header("Location: index.html#deconnexion");
    exit; // exit après une redirection

  }

?>