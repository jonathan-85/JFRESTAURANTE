  
<?php
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'jfrestaurante'
) or die(mysqli_error($mysqli));

?>