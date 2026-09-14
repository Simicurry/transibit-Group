<?php
require __DIR__ . '/includes/products.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$id  = $_POST['id'] ?? '';
$qty = max(1, (int)($_POST['qty'] ?? 1));
$product = find_product($id, $PRODUCTS);

if ($product) {
  $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
}

$redirect = $_POST['redirect'] ?? 'shop.php';
// Only allow redirecting to local pages, never an external URL
if (preg_match('/^[a-zA-Z0-9_\-\.\/?=&]+$/', $redirect) !== 1) {
  $redirect = 'shop.php';
}

$sep = (strpos($redirect, '?') !== false) ? '&' : '?';
header('Location: ' . $redirect . $sep . 'added=' . urlencode($product['name'] ?? ''));
exit;
