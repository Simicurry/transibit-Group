<?php
require __DIR__ . '/includes/products.php';
$page_title = 'TRANSIBIT Group — Agro goods, sourced direct';
$active_nav = 'home';
require __DIR__ . '/includes/header.php';

$featured = array_slice($PRODUCTS, 0, 3);
?>

<section class="hero">
  <div class="wrap">
    <div>
      <div class="eyebrow">Farm-direct &middot; NEPC-grade sourcing</div>
      <h1>Nigerian agro goods, sold the way the farm intended.</h1>
      <p class="lead">Dried ginger, spices, grains and dried fruit — sourced through the same certified supply chain used for export, repacked for your kitchen, ordered in minutes.</p>
      <div class="hero-actions">
        <a href="shop.php" class="btn btn-primary">Shop the catalogue</a>
        <a href="about.php" class="btn btn-outline">How we source</a>
      </div>
    </div>
    <div class="hero-art">
      <svg viewBox="0 0 420 420" width="380" height="380" role="img" aria-label="Illustration of a ginger root">
        <rect x="0" y="0" width="420" height="420" fill="#FBF8EF" stroke="#DAD3BC"/>
        <g transform="translate(210,225)">
          <path d="M -110 40 C -140 -10 -90 -70 -40 -55 C -20 -95 30 -100 50 -65 C 95 -80 130 -30 100 15 C 130 45 110 95 65 95 C 55 130 5 140 -20 110 C -65 130 -115 95 -95 55 C -110 55 -118 45 -110 40 Z"
                fill="#E0A233" stroke="#B87F1F" stroke-width="3"/>
          <path d="M -20 -95 C -15 -140 15 -165 35 -190" fill="none" stroke="#6E7B62" stroke-width="6" stroke-linecap="round"/>
          <path d="M 5 -140 C 10 -155 30 -160 40 -175" fill="none" stroke="#6E7B62" stroke-width="5" stroke-linecap="round"/>
          <ellipse cx="35" cy="-195" rx="10" ry="22" fill="#6E7B62" transform="rotate(-20 35 -195)"/>
          <ellipse cx="45" cy="-180" rx="8" ry="17" fill="#849277" transform="rotate(15 45 -180)"/>
          <path d="M -60 -10 Q -20 5 20 -10" fill="none" stroke="#A3431D" stroke-width="2" opacity=".5"/>
          <path d="M -70 25 Q -10 42 55 25" fill="none" stroke="#A3431D" stroke-width="2" opacity=".5"/>
        </g>
      </svg>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="stats">
      <div class="stat"><div class="num">CAC / NEPC</div><div class="lbl">Registered &amp; certified sourcing</div></div>
      <div class="stat"><div class="num"><?= count($PRODUCTS) ?>+</div><div class="lbl">Products across 5 categories</div></div>
      <div class="stat"><div class="num">36</div><div class="lbl">States reachable on delivery</div></div>
      <div class="stat"><div class="num">48hr</div><div class="lbl">Typical Lagos &amp; Abuja dispatch</div></div>
    </div>
  </div>
</section>

<section class="alt">
  <div class="wrap">
    <div class="section-head">
      <h2>Why buy direct</h2>
      <p>Everything we sell moves through the same quality checks used for our international export shipments — just packed smaller.</p>
    </div>
    <div class="grid-3">
      <div class="value-card">
        <h3>Traceable sourcing</h3>
        <p>Every batch is linked back to a certified supplier relationship, not an anonymous market stall.</p>
      </div>
      <div class="value-card">
        <h3>No middlemen markup</h3>
        <p>You buy from the same pipeline that supplies international wholesale buyers — not a reseller's reseller.</p>
      </div>
      <div class="value-card">
        <h3>Built for repeat orders</h3>
        <p>Save your details once, reorder in two clicks, or set up a rotating monthly Agro Box.</p>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head">
      <h2>From the catalogue</h2>
      <p>A few of what's moving this month.</p>
    </div>
    <div class="product-grid">
      <?php foreach ($featured as $p): ?>
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
                <input type="hidden" name="redirect" value="index.php">
                <button type="submit" class="btn btn-primary">Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="alt">
  <div class="wrap">
    <div class="section-head">
      <h2>From the field</h2>
      <p>Notes on sourcing, storage and using agro produce well.</p>
    </div>
    <div class="grid-2">
      <div class="journal-card">
        <div class="meta">Sourcing notes</div>
        <h3>What "export-grade" actually means for ginger</h3>
        <p>Moisture content, split size and cleanliness are graded before a batch ever leaves the drying floor — the same standard we hold retail packs to.</p>
        <a href="about.php" class="btn-ghost">Read about our process</a>
      </div>
      <div class="journal-card">
        <div class="meta">In the kitchen</div>
        <h3>Getting more out of a 250g pack of ginger splits</h3>
        <p>Rehydrate in warm water for tea, or grind fresh as needed to keep the oils from fading — a small routine that changes how long a pack lasts.</p>
        <a href="shop.php" class="btn-ghost">Shop ginger products</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
