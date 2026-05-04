<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>ParkTrack</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        app: '#0B0E17',
        container: '#151A2D',
        card: '#1C233D',
        input: '#121624',
        primary: '#00E0FF',
        accent: '#007BFF',
        danger: '#FF3B3B'
      }
    }
  }
}
</script>
</head>
<body class="bg-app text-white min-h-screen flex items-center justify-center p-6">
<div class="w-full max-w-6xl bg-container rounded-3xl p-8 border border-white/10">
<div class="flex justify-between items-center mb-6 border-b border-white/10 pb-4">
  <h1 class="text-2xl font-bold text-primary">🚗 ParkTrack</h1>
  <?php if(isset($_SESSION['login'])): ?>
  <a href="<?= base_url('auth/logout') ?>" class="text-red-400">Logout</a>
  <a href="<?= base_url('dashboard/home') ?>" class="text-primary">Dashboard</a>
  <a href="<?= base_url('dashboard') ?>" class="text-white">CRUD</a>
  <?php endif; ?>
</div>
