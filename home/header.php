<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-light bg-warning">
      <a class="navbar-brand lobster" href="index.php">My wonderful Booklist</a>
      <?php if(isset($_SESSION ['name'])) {
           echo "<form method='post'>";
           echo ucfirst($_SESSION['name']);
           echo "&nbsp;&nbsp;<a href='http://localhost/booklist/admin/' class='btn btn-info'>Admin panel</a>
             <button class='btn btn-info' name='logout'>Logout</button>
           </form>";
      } ?>
    </nav>
<?php
if(isset($_POST['logout'])) {
      session_destroy();
      header('Location: index.php?status=loggedout');
      }
?>
