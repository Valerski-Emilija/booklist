<?php

   require "header.php";
   require_once "../db.php";


   echo "<section class='container mt-5'>
   <div class='row'>
   <div class='col mt-3 mb-3'>";

   if(isset($_GET['search'])) {

      $value = $_GET['search_query'];
      $value = "%$value%";
      $search = $pdo->prepare("SELECT * FROM books WHERE keywords LIKE :word
                            OR author LIKE :word OR title LIKE :word");
      $search->bindParam(':word', $value, PDO::PARAM_STR);
      $search->execute();

    while($row = $search->fetch(PDO::FETCH_ASSOC)) {
      $title = $row['title'];
      $author = $row['author'];
      $keywords = $row['keywords'];
      $description = $row['description'];
      $img = $row['imageUrl'];
      $link = $row['link'];

    echo "<h2>" .htmlentities($title) . "</h2>
            <h5>" .htmlentities($author) . "</h5>
            <a href='$link'>".htmlentities($link) ."</a>
            <p>". htmlentities($description) ."</p>
            <div class='col-sm-3 mb-3'>
              <img src=' ".htmlentities($img). "' alt='' class='img-fluid'/>
            </div>
            <div style = 'height: 60px'></div>";

    }
    if($search->rowCount() <1) {
      echo "<h4>Sorry, no matches found </h4>";
    }
  }

  echo " <a href='index.php' class='btn btn-info mt-5 mb-5'>Back to startpage</a>
        </div>
       </div>
      </section>";

require "footer.php";

?>
