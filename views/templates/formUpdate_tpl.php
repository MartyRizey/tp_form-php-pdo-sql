<?php
  require 'doctype.php';
?>

<h1>Mise à jour de l'enregistrement : <?= intval($_GET['upd_Id']); ?></h1>

<fieldset>
<legend>| Formulaire de mise à jour des données |</legend>

  <!-- L'attribut 'action' de la balise <form>, permet d'envoyer les données à traiter dans le fichier passé en valeur. -->
  <form action='..\bdd\saveDatasUpdate_sql.php' method="POST">

    <!--
        On récupére via un champ caché la valeur de l'attribut "name". On donne cette valeur via l'attribut "value" auquel on applique l'id sélectionné stocké dans '$upd_id' récupéré du fichier CheckReccUpdate_ctrl.php_ ligne 6. 
        On pourrait aussi récupérer la valeur via l'objet stocké dans ' $currentId ' ligne 11 du fichier CheckReccUpdate_ctrl.php. Ce qui donnerai ' $currentId -> id; ' pour accéder à la valeur de l'id en cours.
        On utilise un champ caché dans le formulaire pour récupéré la valeur de l'id sélectionnée quand on à cliqué sur le bouton 'Modif' du formulaire principal. Ce qui nous permet de récupérer l'enregistrement concerné de la Bdd. Il nous servira dans la requête SQL du fichier saveDatatsUpdate_sql.php pour dire que l'on fais la mise à jour à l'enregistrement qui à l'id tant...
        On envoie donc l'id dans un champ caché à la requête.
    -->
    <input type="hidden" name="selectIdUpdate" value="<?= intval($_GET['upd_Id']); ?>"/>

    <!--
      Je pré-rempli le champ qui a l'attribut 'value' dont la valeur est la donnée correspondante reçue dans mon objet PDO $currentId, créé dans le fichier selectReccUpdate_sql.php par la fonction selectIdUpdate() dont le résultat est retourné et récupéré par l'appel de la fonction selectIdUpdate() est stocké dans la variable $currentId dans le fichier CheckReccUpdate_ctrl.php
      $currentId étant un objet, j'accède aux valeurs par les propriétès en utilisant la '->'. Ex : $currentId->username me donnera le nom correspondant à l'id sélectionné ou à  un enregistrement de la bdd correspondant à l'id passé en GET dans l'URL.
      -->
    <label for="name">your name :
      <input type="text" name="username" id="name" value="<?= $currentId->username; ?>" >
    </label>

    <label for="password">password :
      <input type="type" name="password" id="password" value="<?= $currentId->password; ?>">
    </label>

    <label for="age">age :
      <input type="number" name="age" id="age" min="0" max="99" value="<?= $currentId->age; ?>">
    </label>

    <label for="mail">adresse mail :
      <input type="email" name="email" id="mail" value="<?= $currentId->email; ?>">
    </label>

    <button class="btn_send">Envoyer</button>

  </form>
  </fieldset>
<br>

<?php require 'footer.php'; ?>
