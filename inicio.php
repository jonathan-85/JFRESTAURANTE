<?php include('database/db.php') ?>
<?php include('includes/header2.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($email) || empty($password)) {
    echo "
    <div class='alert alert-danger' role='alert'>Debes llenar todos los campos!</div>";
  } else {
    $options = [
      'cost' => 11
    ];
    $query = "SELECT * FROM `Users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo "
      <h1 class='text-danger text-center'>Ocurrio un error realizando el registro!</h1>";
      exit();
    } else {
      $user = mysqli_fetch_assoc($result);
      if (is_null($user)) {
        $_SESSION['message'] = 'No existe un usuario con ese correo';
        $_SESSION['message_type'] = 'danger';
        header("Location: inicio.php");
        exit();
      } else {
        if (password_verify($password, $user['password'])) {
          $_SESSION['user_mail'] = $user['email'];
          $_SESSION['message'] = 'Has iniciado sesión correctamente';
          $_SESSION['message_type'] = 'success';
          header("Location: index.php");
          exit();
        } else {
          $_SESSION['message'] = 'Contraseña incorrecta';
          $_SESSION['message_type'] = 'danger';
          header("Location: inicio.php");
          exit();
        }
      }
    }
  }
}
?>
<main class="w-100 h-100" style="background-image: url(https://res.cloudinary.com/kurtcovayne4/image/upload/c_scale,h_2000,w_3000/v1616529834/pestana3/3007244_a5cgvr.webp); background-size: cover">
  <div class="container py-2 px-2">
    <?php include('includes/message.php'); ?>

    <div class="row mt-4">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header mx-auto text-uppercase">
            <h3>Iniciar Sesión</h3>
          </div>
          <div class="card-body">
            <form action="inicio.php" method="post">
              <div class="form-group mb-4">
                <input type="text" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="email" placeholder="Correo" required minlength="4" />
              </div>
              <div class="form-group mb-4">
                <input type="password" class="form-control" style="background-color: rgb(128, 128, 128, 0.3)" name="password" placeholder="Contraseña" required minlength="4" />
              </div>
              <div class="form-group mb-3 d-grid">
                <button type="submit" class="btn text-dark" style="background-color: rgb(128, 128, 128, 0.3)">
                  Ingresar
                </button>
              </div>
              <div class="mb-3 d-grid text-center">
                ¿Aún no tienes cuenta?
                <a href="registro.php" class="btn underline"><u>Registrate</u></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer1.php'); ?>