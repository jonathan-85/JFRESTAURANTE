<?php include('database/db.php'); ?>
<?php include('includes/admin_check.php'); ?>
<?php include('includes/header1.php'); ?>
<?php
function FormatDate($sqlDate)
{
    $time = strtotime($sqlDate);
    $myFormatForView = date("d/m/y g:i A", $time);
    return $myFormatForView;
}

$carrito_query = "SELECT `Purchase`.`id`,`Purchase`.`createdAt`, `User`.`id` AS `user_id`, `User`.`name` AS `user_name`, `User`.`email` AS `user_email`, `Product`.`product_type` AS `product_product_type`, `Product`.`photo_url` AS `product_photo_url`, `Product`.`name` AS `product_name` FROM `Purchases` AS `Purchase` LEFT OUTER JOIN `Users` AS `User` ON `Purchase`.`creator_id` = `User`.`id` LEFT OUTER JOIN `Products` AS `Product` ON `Purchase`.`product_id` = `Product`.`id`";
$result = mysqli_query($conn, $carrito_query);
if (!$result) {
    header("Location: index.php");
    exit();
} else {
    if (mysqli_num_rows($result) == 0) { ?>
        <h1 class=text-center>Todavía no han hecho pedidos</h1>
        <?php
    } else {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <main class="container">
                <div class="card mx-auto" style="width:max(18rem, 50%)">
                    <div class="card-body">
                        <h5 class="card-title">Orden de <?= htmlspecialchars($row['product_name']) ?> </h5>
                        <p class="card-text">Ordenado por: <?= $row['user_email'] ?> </p>
                        <p class="card-text text-muted fst-italic">Fecha: <?= FormatDate($row['createdAt']) ?> </p>
                    </div>
                </div>
            </main>
<?php
        }
    }
}

?>
<?php include('includes/footer1.php'); ?>