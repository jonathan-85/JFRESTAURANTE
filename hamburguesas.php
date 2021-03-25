<?php include('database/db.php'); ?>
<?php include('includes/header1.php'); ?>
<main class="container pt-5">
  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <?php
      $query = "SELECT * FROM `Products` WHERE `product_type` = 'hamburger'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) == 0) {
        echo "<h1 class=\"text-center\">Todavía no hay Hamburgesas</h1>";
      } else {
        echo "<div class=\"row row-cols-md-3 row-cols-1 gy-md-5 gx-2 gy-2\">";
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="col m-0 text-truncate">
            <a href="<?php echo "producto.php?id=" . $row['id'] ?>" class="thumbnail">
              <figure class="figure p-0 m-0">
                <img src="<?php echo htmlspecialchars($row['photo_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="figure-img img-fluid" />
                <figcaption class="figure-caption text-center">
                  <h6 class="text-black fst-italic"><?php echo htmlspecialchars($row['name']); ?></h6>
                  <h6 class="text-danger">COP <?php echo round($row['price'], 2); ?></h6>
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
</main>
</body>

</html>
<?php include('includes/footer1.php'); ?>