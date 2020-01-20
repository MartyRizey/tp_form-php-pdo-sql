
<?php

  function selectIdUpdate($getReccIdUpd){

    require 'connex_bdd.php'; 

    // $getReccIdUpdate = $_GET['upd_Id'];

    // Je selectionne l'id concerné dans l'enregsitrement. Ici le ? correspond à la valeur contenue dans $getReccIdUpd que je récupére dans le paramètre de la fonction, qui met transmit par l'appel de cette fonction dans le fichier CheckReccUpdate_ctrl.php ligne 11. Je rappel que cette variable récupére la valeur passée en GET dans l'url ligne 6 du fichier CheckReccIdUpdate_ctrl.php
    $request = "SELECT * FROM users WHERE id = ?";

    // Je me connecte à ma Bdd et applique sur mon objet PDO $connectToBdd la méthode prepare() ou PDO::prepare en passant ma requête en paramètre. Cela me retourne un objet de type PDOStatement.
    $pdostmt = $connectToBdd->prepare($request);

    // Je prends mon objet PDOStatement sur le lequel j'applique la méthode PDOStetement::bindValue(), ou peut aussi utiliser PDOStatement::bindParam(). Le 1er paramètre correspond au 1er ? dans la requête, le second correspond à la valeur que l'on associe au 1er ?, et le 3iè paramètre correspond au type de valeur attendu.
    $pdostmt->bindValue(1, $getReccIdUpd, PDO::PARAM_INT);

    // J'execute maintenant la requête en appliquant sur mon objet PDOStatement la méthode PDOStatement::execute().
    $pdostmt->execute();

    /**
     * PAS POSSIBLE :  return $currentId = $pdostmt->fetch(PDO::FETCH_OBJ);
     * 
     * tu peux pas faire une assignation de variable dans un return statement.
     * 
     * donc tu mets juste : => return $pdostmt->fetch(PDO::FETCH_OBJ);    
     * 
     * https://www.php.net/manual/fr/language.variables.scope.php 
     */

    // la méthode fetch() de mon objet PDOStatement me permet de récupérer un enregistrement dans ma Bdd ou une ligne d'un jeu de résultats de ma requête. C'est à dire que sous forme de tableau je récupére à la fois un tableau associatif et un tableau indexé numériquement.
    // PDO::FETCH_OBJ en paramètre de la méthode fetch(), permet de récupérer un objet contenant seulement un tableau associatif correspondant aux champs et valeur de la Bdd.
    // On return cet objet pour être récupéré dans le fichier CheckReccUpdate_ctrl.php ligne 11, et utilisé dans le fichier formUpdate_tpl.php
    return $pdostmt->fetch(PDO::FETCH_OBJ);    

    

    

  }


