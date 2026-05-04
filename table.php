<h3 class="mb-4">Data Pembayaran</h3>
<table class="w-full text-sm text-center">
<tr class="text-gray-400">
<th>ID</th><th>Reservasi</th><th>Jumlah</th><th>Metode</th><th>Bukti</th><th>Aksi</th>
</tr>
<?php foreach($pembayaran as $row): ?>
<tr class="border-t border-white/10">
<td><?= $row['id_pembayaran'] ?></td>
<td><?= $row['id_reservasi'] ?></td>
<td>Rp <?= number_format($row['jumlah_bayar']) ?></td>
<td><?= $row['metode_pembayaran'] ?></td>
<td><?php if($row['bukti_pembayaran']): ?><img src="<?= base_url('upload/'.$row['bukti_pembayaran']) ?>" class="w-12 mx-auto"><?php endif; ?></td>
<td>
<a href="<?= base_url('dashboard/index?edit='.$row['id_pembayaran']) ?>" class="text-yellow-400">Edit</a> |
<a href="<?= base_url('dashboard/hapus/'.$row['id_pembayaran']) ?>" class="text-red-400">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>
