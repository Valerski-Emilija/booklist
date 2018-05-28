<?php

  $pdo = new PDO('mysql:host=localhost;dbname=mybooks', 'lucilla', 'lucilla');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
