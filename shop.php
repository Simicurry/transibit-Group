<?php
require __DIR__ . '/includes/products.php';
$page_title = 'Shop — TRANSIBIT Group';
$active_nav = 'shop';
require __DIR__ . '/includes/header.php';

$cats = array_values(array_unique(array_map(fn($p) => $p['cat'], $PRODUCTS)));
$active_cat = $_GET['cat'] ?? 'All';
$list = ($active_cat === 'All')
  ? $PRODUCTS
  : array_values(array_filter($PRODUCTS, fn($p) => $p['cat'] === $active_cat));
?>

<section style="padding-bottom:0;">
  <div class="wrap">
    <div class="section-head">
      <h1 style="font-size:clamp(2rem,3.4vw,2.8rem)">Shop the catalogue</h1>
      <p>Retail-sized packs from the same sourcing pipeline used for our export shipments.</p>
    </div>
  </div>
</section>

<section style="padding-top:24px;">
  <div class="wrap">

    <?php if (!empty($_GET['added'])): ?>
      <div class="flash-banner">Added <?= htmlspecialchars($_GET['added']) ?> to your cart.</div>
    <?php endif; ?>

    <div class="filter-row">
      <a href="shop.php" class="filter-chip <?= $active_cat === 'All' ? 'active' : '' ?>">All</a>
      <?php foreach ($cats as $c): ?>
        <a href="shop.php?cat=<?= urlencode($c) ?>" class="filter-chip <?= $active_cat === $c ? 'active' : '' ?>"><?= htmlspecialchars($c) ?></a>
      <?php endforeach; ?>
    </div>

    <div class="product-grid">
      <?php foreach ($list as $p): ?>
        <div class="product-card">
          <div class="swatch" style="background:<?= $p['swatch'] ?>22">
            <span class="tag"><?= htmlspecialchars($p['cat']) ?></span>
            <svg width="60" height="60" viewBox="0 0 60 60"><circle cx="30" cy="30" r="22" fill="<?= $p['swatch'] ?>"/></svg>
          </div>
          <div class="product-body">
            <div class="cat"><?= htmlspecialchars($p['size']) ?></div>
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <p class="desc"><?= htmlspecialchars($p['desc']) ?></p>
            <div class="product-foot">
              <span class="price"><?= format_naira($p['price']) ?></span>
              <form method="post" action="cart-add.php" style="margin:0;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($p['id']) ?>">
                <input type="hidden" name="redirect" value="shop.php<?= $active_cat !== 'All' ? '?cat=' . urlencode($active_cat) : '' ?>">
                <button type="submit" class="btn btn-primary">Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
