<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-ambil-data.php';
$berita = query("SELECT * FROM berita ORDER BY id_berita DESC");
?>

<section>
    <h1>Data Berita</h1>

    <a href="berita-tambah.php">Tambah</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($berita as $b) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $b['tanggal']; ?></td>
                <td><?= $b['judul']; ?></td>
                <td>
                    <a href="berita-ubah.php?id=<?= $b['id_berita']; ?>">Ubah</a>
                    <a href="berita-detail.php?id=<?= $b['id_berita']; ?>">Detail</a>
                    <a href="berita-hapus.php?id=<?= $b['id_berita']; ?>" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>