<?php

function insertDatas($username, $password, $age, $email) {

  require 'connex_bdd.php'; // j'accède à la Bdd

  /* Version avec requête simple sans vérification de données reçues.
    ---------------------------------------------------------------

    // Ici pas besoin d'utiliser 'id' dans la requête car il est auto incrémenté, il augmentera à chaque nouvelle requête inséré.
    // On insére les valeurs stockées dans $username, $password, $email dans les champs username, password, email de la table 'users'.
    $insert_request = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email')";

    // PDO::exec() — Exécute une requête SQL et retourne le nombre de lignes affectées.
    $connectToBdd->exec($insert_request);

    // https://www.php.net/manual/fr/function.header.php
    // header(Location:) est un type d'appel spécial. Non seulement il renvoie un en-tête au client, mais, en plus, il envoie un statut REDIRECT (302) au navigateur tant qu'un code statut 201 ou 3xx n'a pas été envoyé. Ici nous sommes relocalisé vers la page 'index.php'.
    header('Location:../index.php'); 
  */

  // Version avec requête préparée pour vérifier les données reçues, plus sécure. 
  // ---------------------------------------------------------------------------

  // Il doit y avoir autant de ? qu'il y a de colonne ou de champs dans la table. L'id n'est pas obligatoire car il est auto-incrémenté.
  $request = "INSERT INTO users (username, password, age, email) VALUES(?, ?, ?, ?)";

  // PDO::prepare() — Prépare une requête à l'exécution et retourne un objet de type PDOStatement.
  // Les requêtes de type 'action' comme INSERT, DELETE, UPDATE utilise la méthode PDO::prepare() contrairement à la requête de type SELECTION comme SELECT qui utilise PDO::query().
  $pdostmt = $connectToBdd->prepare($request);

  // https://www.php.net/manual/en/pdo.constants.php
  // le premier paramètre dans la méthode bindValue() ou bindParam() correspond  à la place des ?  dans la requêtes SQL.
  // le 2iè paramètre correspond à la valeur récupérée du formulaire et stockée dans une variable.
  // le 3iè paramètre représente le type de données attendue
  $pdostmt->bindValue(1, $username, PDO::PARAM_STR);
  $pdostmt->bindParam(2, $password, PDO::PARAM_STR);
  $pdostmt->bindValue(3, $age, PDO::PARAM_INT);
  $pdostmt->bindParam(4, $email, PDO::PARAM_STR);

  // PDOStatement::execute — Exécute une requête préparée
  $pdostmt->execute();

  // https://www.php.net/manual/fr/function.header.php
  // Un des 2 types d'appel spécial est "Location:". Non seulement il renvoie un en-tête au client, mais, en plus, il envoie un statut REDIRECT (302) au navigateur tant qu'un code statut 201 ou 3xx n'a pas été envoyé.
  // Redirige sur la page index.php
  header('Location: ../index.php');

  exit('Script d\'insertion de données en Bdd terminé.');

}





