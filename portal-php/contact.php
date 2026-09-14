<?php
require __DIR__ . '/includes/products.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$page_title = 'Contact — TRANSIBIT Group';
$active_nav = 'contact';

$errors  = [];
$success = false;
$name = $email = $topic = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim($_POST['name'] ?? '');
  $email   = trim($_POST['email'] ?? '');
  $topic   = trim($_POST['topic'] ?? 'General enquiry');
  $message = trim($_POST['message'] ?? '');

  if ($name === '') {
    $errors[] = 'Please enter your name.';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
  }
  if ($message === '') {
    $errors[] = 'Please enter a message.';
  } elseif (strlen($message) > 2000) {
    $errors[] = 'Message is too long — please keep it under 2000 characters.';
  }

  if (empty($errors)) {
    $dataDir = __DIR__ . '/data';
    if (!is_dir($dataDir)) {
      @mkdir($dataDir, 0755, true);
    }
    $line = sprintf(
      "%s | %s | %s | %s | %s%s",
      date('Y-m-d H:i:s'),
      $name,
      $email,
      $topic,
      str_replace(["\r", "\n"], ' ', $message),
      PHP_EOL
    );
    @file_put_contents($dataDir . '/enquiries.log', $line, FILE_APPEND | LOCK_EX);
    $success = true;
    $name = $email = $topic = $message = '';
  }
}

require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap" style="max-width:720px;">
    <h1 style="font-size:clamp(2rem,3.4vw,2.8rem)">Get in touch</h1>
    <p class="lead" style="color:var(--forest-2);">Wholesale enquiries, Agro Box questions, or anything else — send a message and we'll follow up.</p>

    <?php if ($success): ?>
      <div class="flash-banner">Thanks — your message has been received. We'll get back to you shortly.</div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="error-banner">
        <strong>Please fix the following:</strong>
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="post" action="contact.php" style="margin-top:10px;">
      <div class="form-grid">
        <div class="field">
          <label for="name">Full name</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
        </div>
        <div class="field">
          <label for="email">Email address</label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="field full">
          <label for="topic">What's this about?</label>
          <select id="topic" name="topic">
            <?php foreach (['General enquiry','Wholesale / bulk order','Agro Box subscription','Delivery issue'] as $opt): ?>
              <option value="<?= htmlspecialchars($opt) ?>" <?= $topic === $opt ? 'selected' : '' ?>><?= htmlspecialchars($opt) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="field full">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required><?= htmlspecialchars($message) ?></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Send message</button>
    </form>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
