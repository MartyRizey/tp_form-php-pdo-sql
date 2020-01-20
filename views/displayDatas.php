<?php  
  require './bdd/selectReccToBdd_sql.php'; // j'impoorte ce fichier pour accèder à $rows 
  // require './bdd/selectReccUpdate_sql.php';  
?>  

<!-- Tableau pour afficher les données de la Bdd dans ma page web -->
<!-- https://www.w3schools.com/css/css_table.asp -->

<table id="table">

  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Mot de passe</th>
      <th>Age</th>
      <th>Email</th>
    </tr>
  </thead>

  <!-- 
    Ici j'afficher les entrées ou enregistrements de la Bdd. Il me faut récuperer dans un tableau les enregistrements de la Bdd et les parcourir. 
    Je récupére un tableau associatif via la requête dans le fichier /bdd/selectReccToBdd_sql.php puis je le parcour via la boucle foreach().
    A chaque tour de boucle du tableau $rows, on dit donne moi un enregistrement($reccDatasRow) de tous les enregistrements($rows) et on boucle jusqu'à la fin des enregistrements.
    La boucle s'arrête lorsqu'il n'y a plus de ligne ou d'enregistrement à afficher dans la Bdd.
    -->
  <tbody>
  <?php foreach($rows AS $reccDatasRow):  /* debug($reccDatasRow); */ ?>    
    
    <tr>
      <!-- 
        On preferera la syntaxe "?= .... ?" dans du html, plutôt que '?php echo ... ?'         
        -->
      <td><?= $reccDatasRow['id']; ?></td>
      <td><?= $reccDatasRow['username']; ?></td>
      <td><?= $reccDatasRow['password']; ?></td>
      <td><?= $reccDatasRow['age']; ?></td>
      <td><?= $reccDatasRow['email']; ?></td>

      <!-- 
        Un bouton ou 'call to action' Supp et Modif par ligne d'enregistrement.
        Suppression et modification d'entrées dans le tableau et la Bdd via des liens qui cibleront l'id. Les liens seront des 'cta' sur lesquels on mettra un style en CSS.         
        -->
      <!-- 
        La chaîne de requête après le '?' dans l'URL "?del_Id=<?= $reccDatasRow['id']; ?>" permet de passer l'id à supprimer comme valeur d'une variable 'del_Id' en GET donc dans l'URL... ATTENTION 
        Si je voulais ouvrir mon lien vers une autre page j'utiliserais l'attribut de la balise <a> target="_blank" avec rel="noopener noreferrer". https://developer.mozilla.org/fr/docs/Web/HTML/Element/a
        -->
      <td><a href=".\bdd\deleteReccToBdd_sql.php?del_Id=<?= intval($reccDatasRow['id']); ?>" class="cta cta_del" title="Vous allez supprimer l'enregistrement n° <?= $reccDatasRow['id']; ?>">Supp</a></td>
      <!--
        Ici je passe la valeur contenue dans intval($reccDatasRow['id']) dans l'URL via la chaîne de requête après le point d'interrogation. Elle sera récupérée pour être utilisée dans le fichier CheckReccUpdate_ctrl.php
        -->
      <td><a href=".\Controlers\CheckReccUpdate_ctrl.php?upd_Id=<?= intval($reccDatasRow['id']); ?>" class="cta cta_upd" title="Vous allez modifier l'enregistrement n° <?= $reccDatasRow['id']; ?>">Modif</a></td>      
    </tr>

  <?php endforeach; ?>

  </tbody>

</table>


