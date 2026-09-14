<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$id  = $_POST['id'] ?? '';
$qty = (int)($_POST['qty'] ?? 0);

if ($id !== '') {
  if ($qty <= 0) {
    unset($_SESSION['cart'][$id]);
  } else {
    $_SESSION['cart'][$id] = $qty;
  }
}

header('Location: cart.php');
exit;
