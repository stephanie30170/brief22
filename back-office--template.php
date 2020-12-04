<?php

  @date_default_timezone_set("Europe/Paris"); // fuseau horaire
  @setlocale(LC_TIME, "fr_FR.utf8","fra"); // jours et mois en français
  $dateDuJour = strftime("%A %d %B %Y");
  $produitFullpath = "conf/products.json";
  $produitContent  = file_get_contents($produitFullpath);
  $produitArray    = json_decode($produitContent, JSON_OBJECT_AS_ARRAY);

?><!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wax-addict — boutique officielle</title>
  <meta name="description" content="Bienvenue dans la boutique privée “Wax-Addict”. Retrouvez notre toute dernière sélection de tissus africains hauts de gamme.">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="back-office">
  <header><h2>wax-addict</h2></header>
  <main>
    <h2>Bienvenue dans votre espace privé</h2>
    <p>Voici les produits disponibles en ce <?php echo $dateDuJour; ?> :</p>
    <?php
    forEach($produitArray as $key => $produit) {
    echo 'Le nom du produit est '.$produit['nom'].'<br>'
    .'sa longueur est de '.$produit['longueur'].'<br>'
    . 'son prix est de '.$produit['prix'].'<br>'
    .' Son nom alternatif est '.$produit['nom alternatif']. '<br>'
    .' voici son image '.'<img src="'.$produit['image'].'"width=150px />';
  }
     

  ?>
  </main>
  <footer><a href="logout.php">déconnexion</a></footer>
</body>

</html>

