<?php 

 include '../inc/debug.php';

 // Se connecter à la Bdd
 require 'connex_bdd.php';

 // Récupérer les données du fomulaire de mise à jour.
 // https://www.php.net/manual/en/function.htmlentities  -  https://www.php.net/manual/en/function.htmlspecialchars  -  https://www.php.net/manual/en/function.trim.php
 $selectIdUpdate = htmlspecialchars(trim($_POST['selectIdUpdate']));
 $username       = htmlspecialchars(trim($_POST['username']));
 $password       = htmlentities(trim($_POST['password']));
 $age            = htmlspecialchars(trim($_POST['age']));
 $email          = htmlentities(trim($_POST['email'])); 

 // faire la requête de mise à jour -> https://sql.sh/cours/update
 // username correspond au champ ou à la colonne dans la Bdd que l'on souhaite mettre à jour et :username correspond à la valeur contenue dans $username.
 $request = "UPDATE users SET username=:u, password=:p, age=:a, email=:e WHERE id=:i";
 
 $pdostmt = $connectToBdd->prepare($request);

 // Ici on remplace le 1er paramètre de la méthode bindValue() ou bindParam() nom plus par un chiffre puisque l'on a plus de ? dans la requête, mais par une chaîne de caractères contenant la valeur du 2iè paramètre.
 $pdostmt->bindValue('u', $username, PDO::PARAM_STR);
 $pdostmt->bindParam('p', $password, PDO::PARAM_STR);
 $pdostmt->bindParam('a', $age, PDO::PARAM_INT);
 $pdostmt->bindValue('e', $email, PDO::PARAM_STR);
 $pdostmt->bindParam('i',$selectIdUpdate, PDO::PARAM_INT);

 // exécution de la requête
 $pdostmt->execute();

 // returner sur le formulaire principale
 header('Location: ../index.php');