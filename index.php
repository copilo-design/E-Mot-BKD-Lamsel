<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-MOT - Pelacakan Berkas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Lacak Berkas</h2>
    <form method="GET">
        <input type="text" name="no" placeholder="Nomor Registrasi" class="border p-2 w-full mb-4" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
    </form>

    <?php
    if (isset($_GET['no'])) {
        $no = mysqli_real_escape_string($conn, $_GET['no']);
        $q  = mysqli_query($conn, "SELECT * FROM surat_masuk WHERE no_register='$no'");
        if (mysqli_num_rows($q) > 0) {
            $d = mysqli_fetch_assoc($q);
            echo "<div class='mt-4 border p-3 rounded bg-gray-50'>
                    <p><b>Status:</b> {$d['status']}</p>
                    <p><b>Bidang:</b> {$d['bidang']}</p>
                    <p><b>Update Terakhir:</b> ".($d['tgl_update'] ?: $d['tgl_masuk'])."</p>
                    <p><b>Keterangan:</b> ".($d['keterangan'] ?: 'Berkas sedang diproses')."</p>
                  </div>";
        } else {
            echo "<p class='mt-4 text-red-600'>Berkas tidak ditemukan.</p>";
        }
    }
    ?>
</div>

<div class="text-center mt-4">
    <a href="login.php" class="text-blue-600">Login Admin</a>
</div>
</body>
</html>