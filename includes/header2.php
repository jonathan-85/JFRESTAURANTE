<!DOCTYPE html>
<html lang="en" class="vw-100 vh-100 overflow-hidden">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <style>
    .onhover:hover {
      background-color: #f5f5f5 !important;
      color: black !important;
    }
  </style>
  <title>H Restaurante</title>
</head>

<body class="w-100 h-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ee6d2d">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">JF Restaurante</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <?php
            if (session_status() === PHP_SESSION_NONE) {
              session_start();
            }
            if (isset($_SESSION['user_mail'])) {
              if (hash('sha256', $_SESSION['user_mail']) == '009d1e134a8e31e50a31a744761c962010f8397d3618c760fcbdf679a57f4269') { ?>
                <a class="nav-link active" href="productos.php">Admin: Productos</a>
                <a class="nav-link active" href="pedidos.php">Admin: Pedidos</a>
              <?php
              } else { ?>
                <a class="nav-link active" href="carrito.php">Carrito</a>
            <?php
              }
            }
            ?>
            <a class="nav-link active" href="hamburguesas.php">Hamburguesas</a>
            <a class="nav-link active" href="pizzas.php">Pizzas</a>
            <a class="nav-link active" href="bebidas.php">Bebidas</a>
            <a class="nav-link active onhover" href="<?php echo (isset($_SESSION['user_mail']) ? 'logout.php' : 'inicio.php') ?>"><?php echo (isset($_SESSION['user_mail']) ? 'Cerrar sesión' : 'Ingresar') ?></a>
          </div>
        </div>
      </div>
    </nav>
  </header>