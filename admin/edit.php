<?php

  require_once "../db.php";
  require "header.php";

  $msg = "";

  $query = $pdo->prepare("SELECT * FROM books where id = ?");
  $query->execute(array($_GET['id']));
  $row = $query->fetch(PDO::FETCH_ASSOC);
  $id = $row['id'];

  // Prevent the page to reload the old form values after submit:
  if(!isset($_POST['title']) && !isset($_POST['author']) &&!isset($_POST['keywords'])
    &&!isset($_POST['description']) &&!isset($_POST['imageUrl']) &&!isset($_POST['link']))
   {
    $title = htmlentities($row['title']);
    $author = htmlentities($row['author']);
    $keywords = htmlentities($row['keywords']);
    $description = htmlentities($row['description']);
    $imageUrl = htmlentities($row['imageUrl']);
    $link = htmlentities($row['link']);

  } else {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $imageUrl = $_POST['imageUrl'];
    $link = $_POST['link'];
  }

  if ( isset($_POST['update']) ) {

         $sql = "UPDATE books SET title = :title,
                 author = :author, keywords = :keywords, description = :description,
                 imageUrl = :imageUrl, link = :link
                 WHERE id = :id";
         $update = $pdo->prepare($sql);
         $update->execute(array(
             ':title' => $_POST['title'],
             ':author' => $_POST['author'],
             ':keywords' => $_POST['keywords'],
             ':description' => $_POST['description'],
             ':imageUrl' => $_POST['imageUrl'],
             ':link' => $_POST['link'],
             ':id' => $id));

          $msg = "<div class='alert alert-success'>Book successfully updated</div>";
        }

?>
    <section class="container mt-5">
      <?php if($msg != "") { echo $msg; } ?>
      <h3>Edit Book</h3>
      <form method="post" class="form-control">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="<?= $title ?>">
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" value="<?= $author ?>">
      </div>
      <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" class="form-control" name="keywords" value="<?= $keywords ?>">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="<?= $description ?>">
      </div>
      <div class="form-group">
        <label for="imageUrl">Image url</label>
        <input type="text" class="form-control" name="imageUrl" value="<?= $imageUrl ?>">
      </div>
      <div class="form-group">
        <label for="link">Book website</label>
        <input type="text" class="form-control" name="link" value="<?= $link ?>">
      </div>
      <button type="submit" class="btn btn-info" name="update"/>Update</button>
      <button type="reset" class="btn btn-danger">Cancel</button></p>
      </form>
      <a href="books.php" class="btn btn-info mt-3">Back to list</a>
    </section>
<?php require "../home/footer.php"; ?>
