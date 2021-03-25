<?php include('database/db.php') ?>
<?php include('includes/header2.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'] . " " . $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($name) || empty($email) || empty($password)) {
    echo "
    <div class='alert alert-danger' role='alert'>Debes llenar todos los campos!</div>";
  } else {
    $options = [
      'cost' => 11
    ];
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $query = "INSERT INTO `Users` (`name`, `email`, `password`, `createdAt`, `updatedAt`) VALUES ('$name', '$email', '$password', CURRENT_TIME(), CURRENT_TIME())";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "
      <h1 class='text-danger text-center'>Ocurrio un error realizando el registro!</h1>";
      exit();
    } else {
      $_SESSION['message'] = 'Te has registrado correctamente';
      $_SESSION['message_type'] = 'success';
      header("Location: inicio.php");
      exit();
    }
  }
}
?>
<main class="w-100 h-100" style="background-image: url(https://res.cloudinary.com/kurtcovayne4/image/upload/c_scale,h_2000,w_3000/v1616529834/pestana3/3007244_a5cgvr.webp); background-size: cover">
  <div class="container py-2 px-2">
    <div class="row mt-4">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header mx-auto text-uppercase">
            <h3>Registra tu cuenta</h3>
          </div>
          <div class="card-body">
            <form action="registro.php" method="post">
              <div class="form-group mb-3">
                <input type="text" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="name" placeholder="Nombre" required />
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="last_name" placeholder="Apellidos" required />
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="email" placeholder="Correo" required minlength="4" />
              </div>
              <div class="form-group mb-3">
                <input type="password" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="password" placeholder="Contraseña" required minlength="4" />
              </div>
              <div class="form-group mb-3 d-grid">
                <button type="submit" class="btn btn-outline-dark">
                  Registrarse!
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer1.php'); ?>