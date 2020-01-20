<?php

  require __DIR__ . '\connex_bdd.php';
  include './inc/debug.php';

  // Requête de SELECTION pour tous les champs de ma table 'users' dans la Bdd.
  $selectReccToBdd = "SELECT * FROM users";

   // Sur l'objet $connectToBdd on va appliquer une méthode query() pour exècuter la requête SQL ligne 7, qui retournera un jeu de résultats en tant qu'objet de type PDOStatement.
  $pdoStmt = $connectToBdd->query($selectReccToBdd);

  // Ici dans $rows je récupére un tableau indexé numériquement dont la valeur de chaque clé est un tableau associatif dont les clés sont les champs de ma table 'users" et les valeurs la saisie des utilisateurs dans le formulaire.
  // On peut dire aussi que la valeur à chaque index du tableau $row  correspond à un enregistrement dans la table 'users' de la Bdd.
  // On indique ci-dessous que l'on souhaite que le jeu de résultat PDOStatement soit sous forme de tableau (PDOStatement::fetchAll) et en paramètre, on indique que l'on veut uniquement le tableau associatif (PDO::FETCH_ASSOC)
  $rows = $pdoStmt->fetchAll(PDO::FETCH_ASSOC);

  // On récupére ce tableau dans la variable $rows que l'on pourra parcourrir avec la boucle foreach dans le fichier displayDatas.php pour ensuite l'afficher via une table par exemple.