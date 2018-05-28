<?php

  $pdo = new PDO('mysql:host=localhost;dbname=mybooks', 'your database name', 'your database username');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
