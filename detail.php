<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$id_berita = $_GET['id'];
$berita = query("SELECT * FROM berita WHERE id_berita = $id_berita")[0];
?>

<section>

    <h1><?= $berita['judul']; ?></h1>
    <p><?= date('d-m-Y', strtotime($berita['tanggal'])); ?></p>
    <img src="upload/<?= $berita['gambar']; ?>" alt="" height="300"><br>
    <p><?= $berita['isi']; ?></p>

</section>

<?php include_once('template-user/footer-user.php');  ?>