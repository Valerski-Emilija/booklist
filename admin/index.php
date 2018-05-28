<?php

   require_once "../db.php";
   require "header.php";
   $msg = "";

  if(isset($_POST['submit'])) {

               $title = $_POST['title'];
               $author = $_POST['author'];
               $keywords = $_POST['keywords'];
               $description = $_POST['description'];
               $imageUrl = $_POST['imageUrl'];
               $link = $_POST['link'];

               $query = "INSERT INTO books(title, author, keywords, description, imageUrl, link)
                                VALUES (:title, :author, :keywords, :description, :imageUrl, :link)";

               $action = $pdo->prepare($query);
               $success = $action->execute(array(
                 ':title' => $title,
                 ':author' => $author,
                 ':keywords' => $keywords,
                 ':description' => $description,
                 ':imageUrl' => $imageUrl,
                 ':link' => $link
               ));

               if($success) {
                 $msg = "<div class='alert alert-success mt-3 mb-3' role='alert'>
                    Your book has been successfully added
                 </div>";
               } else {
                 $msg = "<div class='alert alert-danger mt-3 mb-3' role='alert'>
                    An error occurred, try again.
                 </div>";
               }
            }
?>

<section class="container mt-5">
     <h3 class="mt-3 mb-3">Welcome <?= ucfirst($_SESSION['name']); ?></h3>
      <?php if($msg != "") { echo $msg; } ?>
     <h5>Add a new book</h5>
     <div class="row mt-3">
        <div class="col-md-6">
          <form class="form-control mb-5" action="index.php" method="post">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
              <label for="title">Author</label>
              <input type="text" class="form-control" name="author">
            </div>
            <div class="form-group">
              <label for="keywords">Keywords</label>
              <input type="text" class="form-control" name="keywords">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
            <textarea class="form-control" name="description" rows="3" cols="16"></textarea>
            </div>
            <div class="form-group">
              <label for="image">image url</label>
              <input type="text" class="form-control" name="imageUrl">
            </div>
            <div class="form-group">
              <label for="link">Book website</label>
              <input type="text" class="form-control" name="link">
            </div>
            <button type="submit" class="btn btn-info mt-2" name="submit">Save</button>
          </form>

        </div>
      </div>
     </section>
  <?php require "../home/footer.php"; ?>
