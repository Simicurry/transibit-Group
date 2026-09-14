<?php
// ---- TRANSIBIT Group — product catalogue (would live in a database in production) ----

$PRODUCTS = [
  ['id'=>'gng-splits-250', 'name'=>'Dried Ginger Splits', 'cat'=>'Ginger', 'size'=>'250g', 'price'=>3200, 'desc'=>'Sun-dried, hand-sorted ginger splits, export-grade quality.', 'swatch'=>'#E0A233'],
  ['id'=>'gng-powder-100', 'name'=>'Ginger Powder', 'cat'=>'Ginger', 'size'=>'100g', 'price'=>2100, 'desc'=>'Finely milled ginger powder for tea, cooking and baking.', 'swatch'=>'#C97F1B'],
  ['id'=>'gng-tea-20', 'name'=>'Ginger Tea Bags', 'cat'=>'Ginger', 'size'=>'20 bags', 'price'=>2800, 'desc'=>'Caffeine-free ginger infusion, steeped from whole root.', 'swatch'=>'#D98A2B'],
  ['id'=>'pep-dried-200', 'name'=>'Dried Pepper Mix', 'cat'=>'Spices', 'size'=>'200g', 'price'=>2600, 'desc'=>'Sun-dried chili and bell pepper blend, deep smoky heat.', 'swatch'=>'#A3431D'],
  ['id'=>'spc-uziza-100', 'name'=>'Uziza Seed', 'cat'=>'Spices', 'size'=>'100g', 'price'=>1900, 'desc'=>'Whole uziza seed, peppery and aromatic, for soups and stews.', 'swatch'=>'#8C3A1B'],
  ['id'=>'grn-sesame-500', 'name'=>'Sesame Seed', 'cat'=>'Grains', 'size'=>'500g', 'price'=>3400, 'desc'=>'Clean, hulled sesame seed sourced from Northern Nigeria.', 'swatch'=>'#6E7B62'],
  ['id'=>'grn-soybean-1kg', 'name'=>'Soybean', 'cat'=>'Grains', 'size'=>'1kg', 'price'=>2900, 'desc'=>'High-protein soybean, sorted and cleaned for home cooking.', 'swatch'=>'#5A6A50'],
  ['id'=>'fru-mango-150', 'name'=>'Dried Mango Slices', 'cat'=>'Dried Fruit', 'size'=>'150g', 'price'=>2400, 'desc'=>'Naturally sweet, no added sugar, air-dried mango slices.', 'swatch'=>'#B87F1F'],
  ['id'=>'fru-mix-nuts-200', 'name'=>'Mixed Nuts & Fruit', 'cat'=>'Dried Fruit', 'size'=>'200g', 'price'=>3800, 'desc'=>'Cashew, groundnut and dried fruit trail mix.', 'swatch'=>'#7A5230'],
  ['id'=>'bnd-gift-01', 'name'=>'The Harvest Bundle', 'cat'=>'Gift Bundles', 'size'=>'5-piece set', 'price'=>9500, 'desc'=>'Ginger, spice and dried fruit gift set in a keepsake box.', 'swatch'=>'#16231A'],
  ['id'=>'bnd-agro-box', 'name'=>'Monthly Agro Box', 'cat'=>'Gift Bundles', 'size'=>'Subscription', 'price'=>7500, 'desc'=>'A rotating monthly selection delivered to your door.', 'swatch'=>'#16231A'],
  ['id'=>'spc-uda-100', 'name'=>'Uda Seed', 'cat'=>'Spices', 'size'=>'100g', 'price'=>2000, 'desc'=>'Traditional negro pepper, used in soups and postnatal teas.', 'swatch'=>'#8C3A1B'],
];

function find_product($id, $products) {
  foreach ($products as $p) {
    if ($p['id'] === $id) return $p;
  }
  return null;
}

function format_naira($n) {
  return "\u{20A6}" . number_format($n);
}

function cart_count() {
  return array_sum($_SESSION['cart'] ?? []);
}

function cart_total($products) {
  $total = 0;
  foreach (($_SESSION['cart'] ?? []) as $id => $qty) {
    $p = find_product($id, $products);
    if ($p) $total += $p['price'] * $qty;
  }
  return $total;
}
