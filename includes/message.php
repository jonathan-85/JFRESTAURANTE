<?php
if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) { ?>
    <div class="<?php echo 'alert ' . 'alert-' . $_SESSION['message_type'] ?>" role='alert'><?= $_SESSION['message'] ?></div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}

?>