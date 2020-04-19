<?php
session_start();
require 'confiq.php';

if (isset($_POST["submit"])) {

    // ambil data dari form input
    $username   = $_POST["username"];
    $password     = $_POST["password"];

    // ambil data username berdasarkan username
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // verifikasi username ==> apakah usernamenya ada
    if ($user) {
        // merubah data menjadi array assosiatif
        $data = mysqli_fetch_assoc($user);

        // verifikasi password ==> apakah passwornya benar
        if (password_verify($password, $data["password"])) {
            // memberikan session yang menandakan usernya telah login
            $_SESSION['level'] = $data["level"];

            echo "<script>alert('berhasil'); document.location.href = 'dashboard.php';</script>";
        }
    }

    // jika error
    $error = true;
    if (isset($error)) {
        echo "<script>alert('gagal'); document.location.href = 'login.php';</script>";
    }
}
?>

<?php include 'template-admin/header-admin.php'; ?>

<h1>Halaman Login</h1>

<form method="post" action="">
    <label for="username" required>Username :</label>
    <input type="text" id="username" name="username"><br>

    <label for="password" required>Password :</label>
    <input type="password" id="password" name="password"><br>

    <button type="submit" name="submit">Login</button>
</form>

<?php include 'template-admin/footer-admin.php';  ?>