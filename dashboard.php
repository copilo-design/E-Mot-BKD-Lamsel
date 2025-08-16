<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';
$total      = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM surat_masuk"));
$diproses   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM surat_masuk WHERE status='Diproses'"));
$selesai    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM surat_masuk WHERE status='Selesai'"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="p-4 bg-blue-100 rounded">Total Surat: <b><?= $total ?></b></div>
    <div class="p-4 bg-yellow-100 rounded">Diproses: <b><?= $diproses ?></b></div>
    <div class="p-4 bg-green-100 rounded">Selesai: <b><?= $selesai ?></b></div>
</div>

<a href="surat.php" class="bg-blue-600 text-white px-4 py-2 rounded">Kelola Surat</a>
<a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded">Logout</a>
</body>
</html>