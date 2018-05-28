<?php require "header.php"; ?>
<section class="container mt-5">
      <?php
       if(!empty($_GET['action'])){
              echo "<div class='alert alert-success'>Book deleted</div>";
       }
       $query = $pdo->prepare("SELECT * FROM books ORDER BY id DESC");
       $query->execute();

       while($row = $query->fetch(PDO::FETCH_ASSOC)) {
              echo "<div class='row'>
                 <div class='col'>
                  <p><b>Title:</b> " . htmlentities($row['title']). " " . " <b>Author: </b> " . htmlentities($row['author']). " ". " <b>Keywords : </b> ". htmlentities($row['keywords']). "
                  <form method='post'>
                    <a class='btn btn-danger' href= 'delete.php?id= " .$row['id']. "' > Delete</a>
                    <a class='btn btn-info' href= 'edit.php?id= " .$row['id']. "' > Edit</a>
                  </form>
                  </p>
                 </div>
                </div>
                <hr>";
                }
          ?>
  </section>
<?php require "../home/footer.php"; ?>
