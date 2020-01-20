<?php
  require '../inc/debug.php';
  require 'connex_bdd.php';

  // On récupére en GET dans l'URL la valeur passée dans la chaîne de requête à l aclé 'del_Id', en cliquant sur le lien "Supp" dans la liste qui correspond à la ligne 43 du fichier 'displayDatas.php' puis on la stocke dans une variable. L'id ainsi récupéré correspond à la ligne que l'on veut supprimer.
  $deleteIdRecc = $_GET['del_Id'];

  // On choisi de supprimer dans la table 'users' l'id qui à un certain chiffre représenté par un point d'intérrogation (?)
  $request = "DELETE FROM users WHERE id = ?";

  // Les requêtes de type 'action' comme INSERT, DELETE, UPDATE utilise la méthode PDO::prepare() contrairement à la requête de type SELECTION comme SELECT qui utilise PDO::query().
  // On applique la methode PDO::prepare() sur l'objet PDO et on passe notre requête en paramètre.
  $pdostmt = $connectToBdd->prepare($request);

  // Ici on fait correspondre notre valeur avec le ? de la requête ligne 9.
  // On utilise la méthode PDOStatement::bindValue(), on pourrait utiliser aussi PDOStatement::bindParam(). 
  // Le 1 correspond au 1er point d'intérrogation. Ensuite la variable contient l'id à utiliser à la place du ?. Enfin on précise que l'on attend un paramètre de type entier.
  $pdostmt->bindParam(1, $deleteIdRecc, PDO::PARAM_INT);

  // enfin on execute notre requête sur l'objet PDOStatement obtenu ligne 18.
  $pdostmt->execute();
  
  // On se relocalise sur la page 'index.php' une fois que l'exécution de notre requête est faite.
  header('Location: ../index.php');

  // Termine le script courant.
  // https://www.php.net/manual/fr/function.exit.php
  exit('Script de Suppression terminé.');
    

    

  
