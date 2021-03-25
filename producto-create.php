<?php include('database/db.php') ?>
<?php include('includes/admin_check.php'); ?>
<?php include('includes/header2.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_type = $_POST['product_type'];
    $name = $_POST['name'];
    $photo_url = $_POST['photo_url'];
    $price = intval($_POST['price']);
    $description = $_POST['description'];
    if (
        empty($product_type) ||
        empty($name) ||
        empty($photo_url) ||
        empty($price) ||
        empty($description)
    ) {
        echo "
    <div class='alert alert-danger' role='alert'>Debes llenar todos los campos!</div>";
    } else {
        $query = "INSERT INTO `Products` (`product_type`, `photo_url`, `name`, `description`, `price`, `createdAt`, `updatedAt`) VALUES ('$product_type', '$photo_url', '$name', '$description', $price, CURRENT_TIME(), CURRENT_TIME())";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "
      <h1 class='text-danger text-center'>Ocurrio un error realizando la creación del producto!</h1>";
            exit();
        } else {
            $_SESSION['message'] = 'Producto creado exitosamente!';
            $_SESSION['message_type'] = 'success';
            header("Location: producto.php?id=" . mysqli_insert_id($conn));
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
                        <h3>Crear producto</h3>
                    </div>
                    <div class="card-body">
                        <form action="producto-create.php" method="post">
                            <div class="form-group mb-3">
                                <select class="form-select" name="product_type" aria-label="Seleccionar tipo de producto">
                                    <option selected value="pizza">Pizza</option>
                                    <option value="hamburger">Hamburguesa</option>
                                    <option value="beverage">Bebida</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Nombre del producto" required />
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="photo_url" placeholder="Foto del producto" required />
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" class="form-control" name="price" placeholder="Precio en pesos" required />
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Descripción del producto" id="descripcionTextArea" name="description" style="height: 100px" maxlength="255"></textarea>
                                    <label for="descripcionTextArea">Descripción del producto</label>
                                </div>
                            </div>
                            <div class="form-group mb-3 d-grid">
                                <button type="submit" class="btn btn-outline-dark">
                                    Crear Producto
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