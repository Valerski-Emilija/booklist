<?php

  require "header.php";
  require_once "../db.php";

  $query = $pdo->prepare("SELECT * FROM books ORDER BY id DESC LIMIT 6");
  $query->execute();
  $books = $query->fetchAll(PDO::FETCH_ASSOC);

  if(!empty($_GET['status'])){
          echo "<div class='container mt-5'>
          <div class='alert alert-success'>You have successfully logged out</div>
          </div>";
   }
?>
      <section class="container mt-5">
        <div class="row">
           <div class="col-md-6 mt-5">
             <h4>Find your book</h4>
             <form action="results.php" method="get">
               <div class="form-group">
                <input type="text" class="form-control" name="search_query" placeholder="Author, title or any keyword">
                 <button type="submit" name="search" class="btn btn-info mt-2">Search</button>
                 <button type="reset" class="btn btn-info mt-2">Clear</button>
                </div>
             </form>
           </div>
         </div>
         <?php
         if($query->rowCount() >0) {
           echo "<h4 class='text-center mt-5 mb-5'>Last suggestions</h4>";
         }
       ?>
       <div class="row">
         <?php
          foreach ($books as $book) {
           echo "<div class='col-sm-4'>
               <div class='card'>
                  <img class='card-img-top' style='height:300px' src=' ". htmlentities($book['imageUrl'])."'
                   alt='Card image cap'>
                  <div class='card-body'>
                  <h5 class='card-title'> " .htmlentities($book['title']) ."</h5>
                  <p class='card-text'>" .htmlentities($book['author']) ."</p>
                  <a href=' " .htmlentities($book['link']) ." ' class='btn btn-info'>More</a>
                  </div>
                 </div>
               </div>";
          }

          ?>
       </div>
    </section>
<?php require "footer.php"; ?>
