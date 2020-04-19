<?php
session_start();
if ($_SESSION['level'] != 'Admin') {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-ambil-data.php';
$user = query("SELECT * FROM user ORDER BY id_user DESC");
?>

<section>
    <h1>Data User</h1>

    <a href="user-tambah.php">Tambah</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($user as $m) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $m['username']; ?></td>
                <td><?= $m['level']; ?></td>
                <td>
                    <a href="user-ubah.php?id=<?= $m['id_user']; ?>">Ubah</a>
                    <a href="user-hapus.php?id=<?= $m['id_user']; ?>" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>