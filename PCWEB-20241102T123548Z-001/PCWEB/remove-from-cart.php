<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

// Redirect to cart page
header("Location: cart.php");
exit();
?>
