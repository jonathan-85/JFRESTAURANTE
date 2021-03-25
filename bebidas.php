<?php include('database/db.php'); ?>
<?php include('includes/header1.php'); ?>
<main class="container pt-5">
  <div class="row mt-md-5 mt-1">
    <div class="col-md-8 offset-md-2">
      <?php
      $query = "SELECT * FROM `Products` WHERE `product_type` = 'beverage'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) == 0) {
        echo "<h1 class=\"text-center\">Todavía no hay bebidas</h1>";
      } else {
        echo "<div class=\"row row-cols-md-3 row-cols-1 g-md-5 g-2\">";
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="col m-0 text-truncate">
            <a href="<?php echo "producto.php?id=" . htmlspecialchars($row['id']) ?>" class="thumbnail">
              <figure class="figure p-0 m-0">
                <img src="<?php echo htmlspecialchars($row['photo_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="figure-img img-fluid" />
                <figcaption class="figure-caption text-center">
                  <h6 class="text-black fst-italic"><?php echo htmlspecialchars($row['name']); ?></h6>
                  <h6 class="text-danger"><?php echo "COP " . round($row['price'], 2); ?></h6>
                </figcaption>
              </figure>
            </a>
          </div>
      <?php }
        echo "</div>";
      }
      ?>
    </div>
  </div>
  </div>
</main>
<?php include('includes/footer1.php'); ?>