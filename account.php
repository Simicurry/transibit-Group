<?php
$page_title = 'My Account — TRANSIBIT Group';
$active_nav = 'account';
require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap">
    <h1 style="font-size:clamp(2rem,3.4vw,2.8rem)">My account</h1>
    <div class="account-layout" style="margin-top:30px;">
      <div class="account-nav">
        <a href="#orders" class="active">Order history</a>
        <a href="#subscription">Agro Box subscription</a>
        <a href="#details">Delivery details</a>
      </div>
      <div>
        <div id="orders" style="margin-bottom:56px;">
          <h3>Order history</h3>
          <div class="order-row" style="border-top:1px solid var(--line); font-weight:600; color:var(--sage); font-size:.82rem;">
            <span>Order</span><span>Date</span><span>Items</span><span>Status</span>
          </div>
          <div class="order-row">
            <span class="oid">TG-4821</span><span>2 Sep 2026</span><span>Ginger Powder, Dried Pepper Mix</span>
            <span class="status-pill">Delivered</span>
          </div>
          <div class="order-row">
            <span class="oid">TG-4790</span><span>19 Aug 2026</span><span>The Harvest Bundle</span>
            <span class="status-pill">Delivered</span>
          </div>
          <div class="order-row">
            <span class="oid">TG-4756</span><span>3 Aug 2026</span><span>Dried Ginger Splits x2</span>
            <span class="status-pill pending">Processing</span>
          </div>
          <p style="margin-top:16px; color:var(--sage); font-size:.85rem;">Sample order history shown for the prototype &mdash; orders placed through checkout in this session aren't added to this list yet.</p>
        </div>

        <div id="subscription" style="margin-bottom:56px;">
          <h3>Agro Box subscription</h3>
          <div class="sub-card">
            <div>
              <h3 style="margin-bottom:4px;">Monthly Agro Box</h3>
              <p style="margin:0; color:var(--sage); font-size:.9rem;">Next delivery: 15 October 2026 &middot; &#8358;7,500 / month</p>
            </div>
            <div style="display:flex; gap:10px;">
              <button class="btn btn-outline" type="button">Skip next month</button>
              <button class="btn btn-primary" type="button">Manage</button>
            </div>
          </div>
        </div>

        <div id="details">
          <h3>Delivery details</h3>
          <form onsubmit="return false;">
            <div class="form-grid">
              <div class="field"><label>Full name</label><input type="text" value="Simeon A." /></div>
              <div class="field"><label>Phone number</label><input type="tel" value="080X XXX XXXX" /></div>
              <div class="field full"><label>Delivery address</label><input type="text" value="Abuja, FCT" /></div>
              <div class="field"><label>City</label><input type="text" value="Abuja" /></div>
              <div class="field"><label>State</label>
                <select><option>FCT</option><option>Lagos</option><option>Rivers</option><option>Kano</option></select>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">Save details</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
