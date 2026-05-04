<h3 class="mb-4">Tambah Data</h3>
<form method="POST" action="<?= base_url('dashboard/simpan') ?>" enctype="multipart/form-data">
<input type="text" name="id_reservasi" class="w-full p-3 mb-3 rounded bg-input text-white" placeholder="ID Reservasi">
<input type="number" name="jumlah" class="w-full p-3 mb-3 rounded bg-input text-white" placeholder="Jumlah">
<select name="metode" class="w-full p-3 mb-3 rounded bg-input text-white">
<option>Transfer</option>
<option>Cash</option>
</select>
<input type="file" name="bukti" class="w-full p-3 mb-3 bg-input rounded">
<button class="w-full bg-primary text-black py-3 rounded font-bold">Simpan</button>
</form>
