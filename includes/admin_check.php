<?php
function Redirect()
{
    $_SESSION['message'] = 'VENTANA SOLO PARA LA ADMINISTRACIÓN';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
    exit();
}
if (isset($_SESSION['user_mail'])) {
    if (hash('sha256', $_SESSION['user_mail']) != '009d1e134a8e31e50a31a744761c962010f8397d3618c760fcbdf679a57f4269') {
        Redirect();
    }
} else {
    Redirect();
}
