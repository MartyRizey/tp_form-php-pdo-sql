<?php

  require __DIR__ . '\config_bdd.php';

  // On récupére un objet de type PDO qui est $connectToBdd.
  $connectToBdd = new PDO($dsn, $mysql_name, $mysql_pass, $options);