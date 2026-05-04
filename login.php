<?php include __DIR__ . '/../template/header.php'; ?>

<div class="flex justify-center w-full">
<div class="bg-card p-8 rounded-2xl w-full max-w-md">

<h2 class="text-xl mb-6 text-center text-primary font-bold">Login ParkTrack</h2>

<?php if(!empty($_SESSION['flash_error'])): ?>
<div class="bg-red-500/20 border border-red-400 text-red-300 p-3 mb-4 rounded">
<?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?>
</div>
<?php endif; ?>

<?php if(!empty($_SESSION['flash_success'])): ?>
<div class="bg-green-500/20 border border-green-400 text-green-300 p-3 mb-4 rounded">
<?= $_SESSION['flash_success']; unset($_SESSION['flash_success']); ?>
</div>
<?php endif; ?>

<form method="POST" action="<?= base_url('auth/login') ?>">
<input type="text" name="username" placeholder="Username" class="w-full p-3 mb-3 rounded bg-input text-white">
<input type="password" name="password" placeholder="Password" class="w-full p-3 mb-5 rounded bg-input text-white">
<button class="w-full bg-primary text-black py-3 rounded font-bold">Login</button>
</form>

<p class="text-center mt-4 text-sm">
Belum punya akun?
<a href="<?= base_url('auth/register') ?>" class="text-primary">Register</a>
</p>

</div>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
