<?php include __DIR__ . '/../template/header.php'; ?>

<h2 class="text-xl mb-6">📊 Dashboard</h2>

<!-- CARD -->
<div class="grid grid-cols-2 gap-6 mb-6">

<div class="bg-card p-6 rounded-2xl text-center">
    <h3 class="text-gray-400">Total Transaksi</h3>
    <p class="text-2xl text-primary font-bold">
        <?= $total ?>
    </p>
</div>

<div class="bg-card p-6 rounded-2xl text-center">
    <h3 class="text-gray-400">Total Pendapatan</h3>
    <p class="text-2xl text-green-400 font-bold">
        Rp <?= number_format($totalBayar) ?>
    </p>
</div>

</div>

<!-- BUTTON -->
<div class="mb-6">
    <a href="<?= base_url('dashboard') ?>"
    class="bg-primary text-black px-6 py-3 rounded font-bold">
        ➕ Kelola Data
    </a>
</div>

<!-- TABLE -->
<div class="bg-card p-6 rounded-2xl">

<h3 class="mb-4">Preview Data</h3>

<table class="w-full text-sm text-center">

<tr class="text-gray-400">
<th>ID</th>
<th>Reservasi</th>
<th>Jumlah</th>
<th>Metode</th>
</tr>

<?php if(!empty($pembayaran)): ?>
    <?php foreach(array_slice($pembayaran,0,5) as $row): ?>
    <tr class="border-t border-white/10">
        <td><?= $row['id_pembayaran'] ?></td>
        <td><?= $row['id_reservasi'] ?></td>
        <td>Rp <?= number_format($row['jumlah_bayar']) ?></td>
        <td><?= $row['metode_pembayaran'] ?></td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4">Belum ada data</td>
    </tr>
<?php endif; ?>

</table>

</div>

<?php include __DIR__ . '/../template/footer.php'; ?>