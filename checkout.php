<?php
require __DIR__ . '/includes/products.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$order_id = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['cart'])) {
  $order_id = 'TG-' . random_int(1000, 9999);
  $_SESSION['last_order'] = $order_id;
  $_SESSION['cart'] = [];
} elseif (!empty($_SESSION['last_order'])) {
  $order_id = $_SESSION['last_order'];
}

$page_title = 'Order Confirmation — TRANSIBIT Group';
$active_nav = 'cart';
require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap">
    <?php if ($order_id): ?>
      <div class="empty-state">
        <h2>Order placed &mdash; <?= htmlspecialchars($order_id) ?></h2>
        <p>This is a prototype checkout, so no payment was taken. In the full build this step would connect to a payment gateway and logistics partner for dispatch.</p>
        <a href="account.php" class="btn btn-primary" style="margin-top:16px;">View order history</a>
        <a href="shop.php" class="btn-ghost" style="margin-top:16px; margin-left:18px;">Continue shopping</a>
      </div>
    <?php else: ?>
      <div class="empty-state">
        <h2>Nothing to check out</h2>
        <p>Your cart is empty, so there's no order to place yet.</p>
        <a href="shop.php" class="btn btn-primary" style="margin-top:16px;">Browse the shop</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
