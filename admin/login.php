<?php

  $msg = "";
   if(isset($_POST['login'])) {
     if($_POST['name'] == 'admin' && $_POST['password'] == 'adminpassword') //---> Only for development on localhost.
     // Store your password in a safe way for real-world applications on production server.
      {
       session_start();
       $_SESSION['name'] = $_POST['name'];
       header('Location: index.php');

     } else {
       $msg = "<div class='alert alert-danger mt-3'>Wrong login data, try again</div>";
     }

   }
?>
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
      <a class="navbar-brand lobster" href="../home">My wonderful Booklist</a>
    </nav>
    <section class="container mt-5">
      <?php if(!empty($_GET['status'])){
              echo "<div class='alert alert-success'>You have successfully logged out</div>";
       } ?>
      <div class="row">
        <div class="col-md-6">
          <h4 class="mt-3 mb-3">Login</h4>
          <form method="post" class="form-control">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name">
              <label for="password">password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button class="btn btn-info" name="login">Login</button>
            <?php if($msg != ""){ echo $msg; } ?>
          </form>
        </div>
      </div>
    </section>
  <?php include "../home/footer.php"; ?>
