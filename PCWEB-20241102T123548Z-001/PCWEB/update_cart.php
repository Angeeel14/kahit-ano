<?php
session_start();

// Check if the cart session is set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Update quantities
if (isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        // Ensure quantity is an integer and greater than 0
        $quantity = intval($quantity);
        if ($quantity > 0) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        } else {
            // Optionally, you could handle cases where quantity is 0 or invalid
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit;
?>
