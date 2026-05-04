<h3 class="mb-4">Edit Data</h3>
<form method="POST" action="<?= base_url('dashboard/update') ?>" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $dataEdit['id_pembayaran'] ?>">
<input type="text" name="id_reservasi" value="<?= $dataEdit['id_reservasi'] ?>" class="w-full p-3 mb-3 rounded bg-input text-white">
<input type="number" name="jumlah" value="<?= $dataEdit['jumlah_bayar'] ?>" class="w-full p-3 mb-3 rounded bg-input text-white">
<select name="metode" class="w-full p-3 mb-3 rounded bg-input text-white">
<option <?= ($dataEdit['metode_pembayaran']=='Transfer')?'selected':''; ?>>Transfer</option>
<option <?= ($dataEdit['metode_pembayaran']=='Cash')?'selected':''; ?>>Cash</option>
</select>
<input type="file" name="bukti" class="w-full p-3 mb-3 bg-input rounded">
<button class="w-full bg-yellow-400 text-black py-3 rounded font-bold">Update</button>
</form>
