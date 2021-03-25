<?php include('database/db.php'); ?>
<?php include('includes/header2.php'); ?>
<?php
$id = $_GET['id'];
if (is_numeric($id) && strlen($id)) {
    $query = "SELECT * FROM `Products` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    if (is_null($product)) {
        header("Location: index.php");
        exit();
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query = "DELETE FROM `Products` WHERE `id`=$id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "
                        <h1 class='text-danger text-center'>Ocurrio un error eliminando el producto!</h1>";
                exit();
            } else {
                $_SESSION['message'] = 'Producto eliminado exitosamente!';
                $_SESSION['message_type'] = 'success';
                header("Location: productos.php");
                exit();
            }
        } else { ?>
            <main class="w-100 h-100 py-3 p-md-5 overflow-auto" style="background-image: url(https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529376/pestana3/314_v39cd5.webp); background-size: cover">
                <?php include('includes/message.php'); ?>
                <div class="card mx-auto" style="width: max(18rem, 40vw); opacity: 95%;">
                    <div class="card-body">
                        <h3 class="card-title text-center" style="color: #ee6d2d">
                            <?php echo htmlspecialchars($product['name']); ?>
                        </h3>
                        <div class="mx-auto">
                            <img src="<?php echo htmlspecialchars($product['photo_url']) ?>" alt="<?php echo htmlspecialchars($product['name']) ?>" class="img-fluid mx-auto d-block" style="width:min(12rem, 75%)" />
                        </div>

                        <div class="text-center px-5">
                            <h4 class="card-title text-center" style="color: #ee6d2d">
                                <?php echo (($product['product_type'] == 'hamburger') ? 'Hamburguesa' : (($product['product_type'] == 'pizza') ? 'Pizza' : 'Bebida')); ?>
                            </h4>
                            <p class="card-text">
                                <?php echo htmlspecialchars($product['description']) ?>
                            </p>
                            <h5 class="card-title text-center" style="color: #ee6d2d">
                                <?php echo "COP " . round($product['price'], 2) ?>
                            </h5>
                            <div class="d-grid w-50 mx-auto">
                                <form action="<?= "producto-delete.php?id=" . $product['id'] ?>" method="post">
                                    <button type="submit" class="btn btn-danger fw-bold ">
                                        ELIMINAR PRODUCTO
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<?php
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<?php include('includes/footer1.php'); ?>