<?php include('database/db.php'); ?>
<?php
function Redirect($message, $message_type = "danger")
{
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $message_type;
    header("Location: index.php");
    exit();
}
$product_id = $_GET['id'];
if (is_numeric($product_id) && strlen($product_id)) {
    if (isset($_SESSION['user_mail'])) {
        $user_mail = $_SESSION['user_mail'];
        $user_query = "SELECT id FROM `Users` WHERE `email` = '$user_mail'";
        $result = mysqli_query($conn, $user_query);
        $user = mysqli_fetch_assoc($result);
        if ($result) {
            if (is_null($user)) {
                Redirect("Debes iniciar sesión primero");
            } else {
                $creator_id = $user['id'];
                $insert = "INSERT INTO `Purchases` (`creator_id`, `product_id`, `createdAt`, `updatedAt`) VALUES ($creator_id, $product_id, CURRENT_TIME(), CURRENT_TIME())";
                $result = mysqli_query($conn, $insert);
                if ($result) {
                    Redirect('Hemos sido informados de tu compra, dentro de poco te llegará el pedido!', 'success');
                } else {
                    Redirect("Ocurrió un error realizando tu compra");
                }
            }
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        Redirect("Debes iniciar sesión primero");
    }
} else {
    header("Location: index.php");
    exit();
}
