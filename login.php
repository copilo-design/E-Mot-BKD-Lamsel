<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($q) > 0) {
        $_SESSION['admin'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="bg-white p-6 rounded shadow w-80">
    <h2 class="text-xl font-bold mb-4">Login Admin</h2>
    <?php if (!empty($error)) echo "<p class='text-red-600'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" class="border p-2 w-full mb-3" required>
        <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-3" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 w-full rounded">Login</button>
    </form>
</div>
</body>
</html>