<?php include __DIR__ . '/../template/header.php'; ?>

<h2 class="text-xl mb-6">💳 Pembayaran Parkir</h2>

<div class="grid md:grid-cols-2 gap-6">
  <div class="bg-card p-6 rounded-2xl">
    <?php if ($edit): include __DIR__ . '/edit.php'; else: include __DIR__ . '/create.php'; endif; ?>
  </div>
  <div class="bg-card p-6 rounded-2xl overflow-auto">
    <?php include __DIR__ . '/table.php'; ?>
  </div>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
