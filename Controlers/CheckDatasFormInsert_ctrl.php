<?php 

  include '../inc/debug.php';
  require '../inc/alphaNumSymb.php';  
  require '../bdd/insertDatasToBdd_sql.php'; // ma fonction ligne 42 appelle ce fichier.

  // Récupérer les données du formulaire dans le fichier CheckDatasFormInsert_ctrl.php via l'attribut 'name' de la balise <input> et les stocker dans des variables.
  // Je traite les données ici car elles me sont envoyées par la valeur de l'attrinut 'action' de la balise <form> du formulaire.

  // On récupére la valeur saisie dans le formulaire dans la Super Globale $_POST dont la clé correspond à la valeur de l'attribut 'name' du champ <input> du formulaire.
  // trim() supprime les espaces de début et fin de chaîne. => https://www.php.net/manual/fr/function.trim.php
  $username = htmlspecialchars(trim($_POST['username']));
  $password = htmlentities(trim($_POST['password']));
  $age      = htmlspecialchars(trim($_POST['age']));
  $email    = htmlentities(trim($_POST['email']));

  // TODO => Faire des testes .....
  /**    
   *    - https://www.commentcamarche.net/forum/affich-301424-php-recuperer-le-premier-caractere-de-etc 
   *    - https://www.php.net/manual/fr/function.substr.php   * 
   */
  // Si $username n'est pas vide
  if(!empty($username)) {    

    // ici on stocke dans des variables la première lettre saisie dans le champ 'username'.
    $firstLetterUser = substr($username,0,1);     
    
    // on fait nos testes : ici je vérifie que la 1er lettre du champ 'username' correspond à une lettre dans le tableau $alpha_tab et que le champ age peut être vide ou un chiffre entre 8 et 99.
    if(in_array($firstLetterUser, $alpha_tab) && ($age == NULL || $age > 8 && $age < 99)){   

      // ici je vérifie que la 1er lettre du champ 'password' et différent de < et > et que la longueur du password entré et plus petit que 12.
      if(($firstLetterPass != '<') && ($firstLetterPass != '>') && (strlen($password) < 12)) {             

          // j'appelle ma fonction qui se trouve dans le fichier que j'ai recquis ligne 6   
          insertDatas($username, $password, $age, $email);                

      } else {

        // si les testes échouent j'arrive ici et je redirige vers la page "index.php"
        header('Location: ../index.php');

      }

    }       
       
  }   
   
  


       

   
  
  

  


 
