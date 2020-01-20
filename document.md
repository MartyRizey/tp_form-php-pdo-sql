# Cheminement
---

TODO :  
> 1° [**x**] Créer une arborescence de dossiers.
```JS
- TP_CRUD_SQL-TEST2
  asset
    css
      - style.css

  bdd
    - config_bdd.php
    - connex_bdd.php
    - deleteReccToBdd_sql.php
    - insertDatasToBdd_sql.php
    - saveDatasUpdate_sql.php
    - selectReccToBdd_sql.php
    - selectReccUpdate_sql.php

  Controlers
    - CheckDatasFormInsert_ctrl.php
    - CheckReccUpdate_ctrl.php

  inc
    - alphaNumSymb.php
    - debug.php

  views
    - displayDatas.php
    - home.php
    templates
      - doctype_2.php
      - doctype.php
      - footer.php
      - formulaire_tpl.php
      - formUpdate-tpl.php

  - document.md
  - index.php
  - php_form_login.sql
```

> 2° [**x**] Créer un fichier Point d'entrée.

- [x] __index.php__
 └> qui *require* /views/__home.php__
.
> 3° [**x**] dans le dossier _views_ créer la page d'accueil

- [x] __home.php__
  └> qui *require* /views/templates/__doctype.php__
  └> qui *require* /views/templates/__formulaire_tpl.php__
  └> qui *require* /views/__displayDatas.php__
  └> qui *require* /views/templates/__footer.php__
.
> 4° [**x**] Création du Formulaire principale dans views/templates/formulaire_tpl.php

- [x] __formulaire_tpl.php__ _pour rappel ce formulaire est requis dans le fichier_ **`home.php`**.

  - [x] └> Créer un champ pour le 'nom', un 'mot de passe', l''age' et une adresse 'email'.
  - [x] └> Créer via 'phpMyAdmin' une Bdd avec une table pour stocker les données du formulaire.
.
> 5° [**x**] **INSERER** les données reçues du fomulaire dans la Base de données, PHP/pdo - SQL

  Les données à traiter sont envoyées dans un fichier via la **valeur** de l'**attribut _action_** de la balise **&#60;form&#62;&#60;/form&#62;**.
  La méthode de transmission des données est la **valeur** de l'**attribut _method_**, ici la méthode est POST. Il y a aussi la méthode GET qui transmet des valeur via l'URL du Navigateur.

  - [x] Création du fichier pour traiter les données du formulaire qui est dans le fichier _/views/templates/**formulaire_tpl.php**_
    - [x] Controlers/**CheckDatatsFormInsert_ctrl.php**
      └> qui *require* `/inc/alphaNumSymb.php`          - _Celui-ci contient des tableaux, alphabétique, numérique et des symboles._
      └> qui *require* `/bdd/insertDatasToBdd_sql.php`  - _Celui-ci contient la requêtes SQL d'insertion en Bdd._
      - [x] Sécuriser les données reçues du formulaire avant de les stocker dans des variables.
      - [x] Faire des tests pour savoir dans quelles conditions on insert en Bdd.

      Dans ce fichier on fait des testes pour controler se que l'on reçoit et appliquer des conditions à la saisie utilisateur. Si les testes réussissent on est renvoyé dans **`/bdd/insertDatasToBdd_sql.php`** via un appel à une fonction qui est ma requête d'insertion des données en Bdd. Sinon on est redirigé vers **`index.php`**.
      .
    - [x] Création du fichier /bdd/**insertDatasToBdd_sql.php**. On arrive dans ce fichier via l'appel de la fonction `insertDatats()` dans le fichier _Controlers/CheckDatatsFormInsert_ctrl.php_. Ici on insert les données dans la Bdd via la fonction `insertDatas()`.
       - [x] Création d'un fichier de configuration de connexion à la Bdd => /bdd/**config_bdd.php**.
       - [x] Création d'un fichier de connexion à la Bdd via PDO          => /bdd/**connex_bdd.php**.
        └> qui *require* `/bdd/config_bdd.php`.
        - [x] Créer la requête d'INSERTION en Bdd via une fonction.

      └> qui *require* `/bdd/connex_bdd.php`.
      Un fois l'insertion en Bdd faite je redirige vers **`index.php`**.
.
> 6° [**x**] **AFFICHER** les données insérées en Bdd dans une table sous le formulaire principale.

  - [x] Création d'un fichier /views/**displayDatas.php**
  └> qui _require_ `/bdd/selectReccToBdd_sql.php`.
    - [a] └> Créer un tableau en HTML/CSS.
    - [c] └> Afficher les enregistrements de ma table `users` dans mon tableau HTML.
.
  - [x] Création d'un fichier /bdd/**selectReccToBdd_sql.php**
  └> qui _require_ `/bdd/connex_bdd.php`.
    - [b] Créer une requête SQL de **SELECTION** _qui nous retournera un jeu de résultats dans un tableau associatif que l'on stockera dans la variable `$rows` pour être utilisée dans le fichier **`/views/displayDatas.php`**._
    `$rows` correspond à l'ensemble des entrées ou enregistrements dans la Bdd. Je dois donc via la boucle _foreach()_ parcourir ce tableau et pour chaque enregistrement contenu dans `$reccDatasRow` afficher la valeur de la clé correspondant à un champ de la table _users_ en Bdd. Je boucle tant qu'il y a des enregistrement à afficher dans le tableau.
.
> 7° [**x**] **SUPPRESSION** d'un enregistrement en Bdd.
  
  Dans le fichier /views/**displayDatas.php**.

  - [x] [a] - dans le corps(tbody) de la balise &#60;table&#62; créer un _CTA_ (Call To Action) en guise de bouton. Ce lien sera une balise &#60;a&#62; avec un attribut _href_  dont la valeur sera le chemin vers le fichier **`/bdd/deleteReccToBdd_sql.php`**. A cette valeur on ajoutera une chaîne de requête pour passer l'id en GET dans l'URL correspondant à l'enregistrement à supprimer. Nommez le  _CTA_ `Supp`. Voir la ligne n° 48 du fichier.
  [?] _pour passer une valeur dans l'URL, ex =>_ `href="path?query string"` ou `href=".\bdd\deleteReccToBdd_sql.php?del_Id=&#60;?= intval($reccDatasRow['id']); ?&#62;"`. _La valeur transmise et la valeur contenue à la clé 'del_Id'. Cette clé sera stockée dans la variable Super Globale  \$\_GET qui est un tableau => \$\_GET['del_id']._
  .
  - [x] [b] Création d'un fichier /bdd/**deleteReccToBdd_sql.php**
  └> qui _require_ `/bdd/connex_bdd.php`.
Ce fichier contient une requête SQL de suppression d'un enregistrement en Bdd de type **DELETE**. On récupére le numéro de l'enregistrement à supprimer via son _id_ qui nous est transmit via la chaîne de requête dans le fichier `/views/displayDatas.php` par le CTA `Supp`.
Une fois la suppression faite on n'est redirigé vers le finchier **`index.php`**.
.
> 8° [**x**] **MISE A JOUR** d'un enregistrement en Bdd.

  Dans le fichier /views/**displayDatas.php**.

  - [x] [a] - dans le corps(tbody) de la balise &#60;table&#62; créer un _CTA_ (Call To Action) en guise de bouton. Ce lien sera une balise &#60;a&#62; avec un attribut _href_  dont la valeur sera le chemin vers le fichier **`/Controlers/CheckReccUpdate_ctrl.php`**. A cette valeur on ajoutera une chaîne de requête pour passer l'id en GET dans l'URL correspondant à l'enregistrement à modifier ou mettre à jour. Nommez le  _CTA_ `Modif`. Voir la ligne n° 52 du fichier.
  [?] _pour passer une valeur dans l'URL, ex =>_ `href="path?query string"` ou `href=".\Controlers\CheckReccUpdate_ctrl.php?upd_Id=&#60;?= intval($reccDatasRow['id']); ?&#62;"`. _La valeur transmise et la valeur contenue à la clé 'del_Id'. Cette clé sera stockée dans la variable Super Globale  \$\_GET qui est un tableau => \$\_GET['upt_id']._
.
  - [x] [b] Création d'un fichier /Controlers/**CheckReccUpdate_ctrl.php**.
   └> qui _require_ `/bdd/selectReccUpdate_sql.php`.
Dans le fichier je récupére l'_id_ à traiter via le CTA `Modif` dans `/views/displayDatas.php` du formulaire principale. 
Je teste ma données reçue dans une condition.
.
    >- Si c'est bon, je fais appel à une fonction **`selectIdUpdate()`** qui sera dans le fichier **`/bdd/selectReccUpdate_sql.php`** elle selectionnera l'_id_ concerné en Bdd via une requête de type SELECT. Elle affichera ensuite un formulaire de mise à jour des données **`/views/templates/formuUpdate_tpl.php`**.
    >- Sinon on redirige vers **`/index.php`**..
  - [x] [c] Création d'un fichier /bdd/**selectReccUpdate_sql.php**.
  Dans ma fonction **`selectIdUpdate()`** => qui _require_ `connex_bdd.php`.  
  .
    >- Je fais une requête de type **SELECT** pour sélectionner l'_id_ concerné qui m'est passé dans le paramètre de la fonction, qui le reçois de l'argument de l'appel à la fonction dans le fichier `/Controlers/CheckReccUpdate_ctrl.php`, qui lui même le récupére en GET dans l'URL après le clique sur le cta `Modif` dans le formulaire principale.
    >- J'obtiens du jeu de résultats de ma requête un objet de type PDO conteant des propriétès associées à des valeurs. Je retourne cet objet, pour être récupéré dans le fichier `/Controlers/CheckReccUpdate_ctrl.php`  dans une variable `$currentId` qui contient mon enregistrement ciblé..
  - [x] [d] Création d'un fichier /views/templates/**formUpdate_tpl.php**.
  └> qui _require_ `doctype.php`.
  
    Ce fichier va afficher un formulaire pour mettre à jour les champs de ma table `users` en Bdd;
  Les données à traiter sont envoyées dans un fichier via la **valeur** de l'**attribut _action_** de la balise **&#60;form&#62;&#60;/form&#62;**.
  La méthode de transmission des données est la **valeur** de l'**attribut _method_**, ici la méthode est POST. Il y a aussi la méthode GET qui transmet des valeur via l'URL du Navigateur.  
  .
    >- L'attribut `action` me renvoie vers le fichier **`/bdd/saveDatasUpdate_sql.php`** ou nous pourrons mettre les données à jour via une requêtes SQL UPDATE.
    >- Pour cela je récupére via le clique sur le cta `Modif` dans le formulaire principal la valeur passée en GET dans la chaîne de requête et la passe dans un champ caché &#60;input&#62; dont l'attribut _name_ me permettra de récupérer sa valeur en POST.
    >- Je peux pré-remplir les champs grâce à mon objet PDO `$currentId` en passant dans l'attribut _value_ de mais champs les propriètés de mon objet. Attention `$currentId` est un objet, non un tableau. On accéde donc aux propriétès avec la `->` comme ceci : `value = "<?= $currentId->username; ?>"` nous pré-remplirons le champ 'your name' ave la valeur contenue dans la propriétè de l'objet _username_.

    Au clique sur le bouton `Envoyer` les données seront envoyées pour être mises à jour dans le fichier **`/bdd/saveDatasUpdate_sql.php`** via la requête SQL **UPDATE**.
  └> qui _require_ `/footer.php`.
  .
  - [x] [e] Création d'un fichier /bdd/**saveDatasUpdate_sql.php**.
  └> qui _require_ `connex_bdd.php`.
.
    Ce fichier contient ma requête **UDAPTE** de mise à jour des données en Bdd.
    >- Je récupére les données du formulaire via la Super Globale \$\_POST qui est un tableau, ici les propriétès sont des clés contrairement à l'objet `$currentId` vu plus haut. Pour accéder aux valeurs on tape =>  **`$_POST['nomDuChamp'];`**
    >- Je construit ma requête de façon à la sécuriser. Une fois les valeurs récupérées et mises à jour je redirige vers la page `index.php`.


  