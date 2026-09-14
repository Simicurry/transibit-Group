<?php
require __DIR__ . '/includes/products.php';
$page_title = 'Your Cart — TRANSIBIT Group';
$active_nav = 'cart';
require __DIR__ . '/includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$subtotal = cart_total($PRODUCTS);
$delivery = ($subtotal >= 15000 || $subtotal === 0) ? 0 : 1500;
$total = $subtotal + $delivery;
?>

<section>
  <div class="wrap">
    <h1 style="font-size:clamp(2rem,3.4vw,2.8rem)">Your cart</h1>

    <?php if (empty($cart)): ?>
      <div class="empty-state">
        <h2>Your cart is empty</h2>
        <p>Nothing added yet — the catalogue is a good place to start.</p>
        <a href="shop.php" class="btn btn-primary" style="margin-top:16px;">Browse the shop</a>
      </div>

    <?php else: ?>
      <table class="cart-table">
        <thead>
          <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>
        </thead>
        <tbody>
          <?php foreach ($cart as $id => $qty):
            $p = find_product($id, $PRODUCTS);
            if (!$p) continue;
          ?>
          <tr>
            <td>
              <div class="cart-item-name"><?= htmlspecialchars($p['name']) ?></div>
              <div class="cart-item-cat"><?= htmlspecialchars($p['cat']) ?> &middot; <?= htmlspecialchars($p['size']) ?></div>
            </td>
            <td><?= format_naira($p['price']) ?></td>
            <td>
              <form method="post" action="cart-update.php" class="qty-box">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <button type="submit" name="qty" value="<?= $qty - 1 ?>" aria-label="Decrease quantity">&ndash;</button>
                <span><?= (int)$qty ?></span>
                <button type="submit" name="qty" value="<?= $qty + 1 ?>" aria-label="Increase quantity">+</button>
              </form>
            </td>
            <td><?= format_naira($p['price'] * $qty) ?></td>
            <td>
              <form method="post" action="cart-update.php" style="margin:0;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <button type="submit" name="qty" value="0" class="remove-link" style="background:none; border:none; cursor:pointer; font-family:inherit;">Remove</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="cart-summary">
        <div class="summary-row"><span>Subtotal</span><span><?= format_naira($subtotal) ?></span></div>
        <div class="summary-row"><span>Delivery</span><span><?= $delivery === 0 ? 'Free' : format_naira($delivery) ?></span></div>
        <?php if ($delivery > 0): ?>
          <div class="summary-row" style="color:var(--sage); font-size:.85rem;">Free delivery on orders over <?= format_naira(15000) ?></div>
        <?php endif; ?>
        <div class="summary-row total"><span>Total</span><span><?= format_naira($total) ?></span></div>
        <form method="post" action="checkout.php">
          <button type="submit" class="btn btn-primary btn-full" style="margin-top:16px;">Place order</button>
        </form>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
