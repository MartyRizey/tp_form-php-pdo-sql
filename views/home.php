<?php 
  echo '<p>└> Je suis le fichier <strong>home.php</strong>, j\'ai été recqui dans le fichier d\'entrée <em>index.php</em></p>';
  echo '<hr><br>';
  require __DIR__ . '\templates\doctype.php'; 
?>
  
  <h1>Formulaire d'insertion des données en Bdd.</h1>

  <?php 
  
    require __DIR__ . '\templates\formulaire_tpl.php'; 
    require __DIR__ . '\displayDatas.php';
    
  ?>


  <?php require __DIR__ . '\templates\footer.php'; ?>




