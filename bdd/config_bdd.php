<?php

  $dsn = 'mysql:host=localhost; dbname=php_form_login; charset=utf8';
  $mysql_name = 'root';
  $mysql_pass = 'root';
  // https://www.php.net/manual/en/pdo.setattribute.php
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];