<?php
if (!function_exists('cart_count')) {
  require __DIR__ . '/products.php';
}
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$page_title  = $page_title  ?? 'TRANSIBIT Group';
$active_nav  = $active_nav  ?? '';
$cart_qty    = cart_count();

function nav_class($name, $active) { return $name === $active ? 'active' : ''; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?></title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header">
  <div class="wrap">
    <a href="index.php" class="wordmark">TRANSIBIT <span>Group</span></a>
    <nav class="main-nav">
      <a href="index.php" class="<?= nav_class('home', $active_nav) ?>">Home</a>
      <a href="shop.php" class="<?= nav_class('shop', $active_nav) ?>">Shop</a>
      <a href="about.php" class="<?= nav_class('about', $active_nav) ?>">About &amp; Sourcing</a>
      <a href="account.php" class="<?= nav_class('account', $active_nav) ?>">Account</a>
      <a href="contact.php" class="<?= nav_class('contact', $active_nav) ?>">Contact</a>
    </nav>
    <a href="cart.php" class="cart-link <?= nav_class('cart', $active_nav) ?>">Cart <span class="cart-count"><?= (int)$cart_qty ?></span></a>
  </div>
</header>
