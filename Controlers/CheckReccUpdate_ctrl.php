<?php

  include '../inc/debug.php';
  require '../bdd/selectReccUpdate_sql.php';  

  $getReccIdUpdate = $_GET['upd_Id'];

  if(isset($getReccIdUpdate) && is_numeric($getReccIdUpdate)){

    // ici j'appel une fonction qui est une requête de selection dans le fichier selectReccUpdate_sql.php, elle me return un objet de type PDOStatement que je stocke dans $currentId. Cela me permettra de travailler à partir de cet objet dans le fichier 'formUpdate_tpl.php'
    $currentId = selectIdUpdate($getReccIdUpdate); 

    // il y a peut-être moyen de faire autrement ?
    require '../views/templates/formUpdate_tpl.php';

  } else {

    // Sinon c'est que l'id de l'enregistrement à déjà étè supprimé puisqu'il n'existe pas.
    header('Location: ../index.php');

  }