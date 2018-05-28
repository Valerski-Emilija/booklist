<?php

  require "header.php";

  $stmt = $pdo->prepare("SELECT * FROM books where id = ?");
  $stmt->execute(array($_GET['id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
 <section class="container mt-5">
      <?php if ( $row === false ) {
      echo "<div class= 'alert alert-danger mt-3 mb-3'>
              No book selected! Please select one from the
              <a href='books.php'class='text-dark'>Booklist</a></div>";
        }
      ?>
      <h3>Warning</h3>
      <p>You are on to delete book<b> <?= htmlentities($row['title']) . "</b> by <b> " . htmlentities($row['author']) ?></b></p>
      <p>This action cannot be undone</p>
      <form method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit" class="btn btn-danger" name="delete">Confirm</button>
      <a href="books.php" class="btn btn-warning">Cancel</a>
      </form>

     <?php

       if ( isset($_POST['delete']) && isset($_POST['id']) ) {
          $sql = "DELETE FROM books WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array($_POST['id']));
          header( 'Location: books.php?action=book-deleted' ) ;
         }

     ?>
     <div style="height: 50px"></div>
    </section>
<?php require "../home/footer.php"; ?>
