<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<section>
    <h1>Data Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $m) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['prodi']; ?></td>
                <td><?= $m['gender']; ?></td>
                <td><?= $m['alamat']; ?></td>
                <td><?= $m['hobi']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

</section>

<?php include_once('template-user/footer-user.php');  ?>