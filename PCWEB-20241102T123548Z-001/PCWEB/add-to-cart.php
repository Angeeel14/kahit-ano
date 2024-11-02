<?php
session_start();

// Ensure the cart session is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Get product ID and quantity from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;

// Validate quantity
if ($quantity <= 0) {
    $quantity = 1;
}

// Add or update the product in the cart
if ($product_id > 0) {
    if (isset($_SESSION['cart'][$product_id])) {
        // Update quantity if the product already exists in the cart
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Add the product to the cart
        $_SESSION['cart'][$product_id] = array(
            'quantity' => $quantity
        );
    }
}

// Redirect to the cart page
header('Location: cart.php');
exit;
?>
