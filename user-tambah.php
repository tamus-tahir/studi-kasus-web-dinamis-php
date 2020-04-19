<?php
session_start();
if ($_SESSION['level'] != 'Admin') {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-user-tambah.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Ditambahkan');
					window.location.href = 'user-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Ditambahkan');
			</script>";
    }
}
?>

<h1>Tambah Data User</h1>

<form method="post" action="">
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password :</label>
    <input type="password" id="password" name="password" required><br>

    <label for="passwordConfirm">Konfirmasi Password :</label>
    <input type="password" id="passwordConfirm" name="passwordConfirm" required><br>

    <label for="level">Level User :</label>
    <select name="level" id="level" required>
        <option value="">-- Pilih level --</option>
        <option value="Admin">Admin</option>
        <option value="Operator">Operator</option>
    </select><br>

    <button type="submit" name="submit">tambah</button>

</form>

<?php include 'template-admin/footer-admin.php';  ?>