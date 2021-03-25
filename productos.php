<?php include('database/db.php'); ?>
<?php include('includes/admin_check.php'); ?>
<?php include('includes/header2.php'); ?>
<main class="w-100 h-100 overflow-auto p-0 py-2 pb-5" style="background-image: url(https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529376/pestana3/314_v39cd5.webp); background-size: cover">
  <?php include('includes/message.php'); ?>
  <div class="card mx-auto" style="width: max(18rem, 40vw); opacity: 95%">
    <div class="card-body">
      <h3 class="card-title text-center" style="color: #ee6d2d">
        Administrador de productos
      </h3>

      <?php
      $query = "SELECT id, name FROM `Products` WHERE 1";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) == 0) {
        echo "<h1 class=\"text-center\">Todavía no has creado productos</h1>";
      } else {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="row mb-4">
            <div class="col-md-10 offset-md-1">
              <div class="btn-group w-100" role="group" aria-label="Basic example">
                <a href="<?php echo "producto.php?id=" . $row['id'] ?>" class="btn text-white" style="background-color: #ee6d2d">
                  <?php echo htmlspecialchars($row['name']) . "#" . $row['id'] ?>
                </a>
                <a href="<?php echo "producto-edit.php?id=" . $row['id'] ?>" class="btn text-white" style="background-color: #ee6d2d">
                  Editar
                </a>
                <a href="<?php echo "producto-delete.php?id=" . $row['id'] ?>" class="btn text-white" style="background-color: #ee6d2d">
                  Eliminar
                </a>
              </div>
            </div>
          </div>
      <?php }
      }
      ?>
    </div>
    <div class="d-grid w-50 mx-auto mb-3">
      <a href="<?php echo "producto-create.php" ?>" class="btn fw-bold text-white" style="background-color: #ee6d2d">
        Crear
      </a>
    </div>
  </div>
</main>
<?php include('includes/footer1.php'); ?>