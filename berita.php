<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$berita = query("SELECT * FROM berita ORDER BY id_berita DESC");
?>

<section>
    <h1>BERITA</h1>

    <?php foreach ($berita as $b) : ?>
        <h2><?= $b['judul']; ?></h2>
        <p><?= date('d-m-Y', strtotime($b['tanggal'])); ?></p>
        <img src="upload/<?= $b['gambar']; ?>" alt="" height="300"><br>

        <!-- substr ==> membatasi jumlah huruf -->
        <p><?= substr($b['isi'], 0, 300); ?> ......</p>
        <a href="detail.php?id=<?= $b['id_berita']; ?>">Lihat Selengkapnya</a>
        <br><br>
    <?php endforeach ?>


</section>

<?php include_once('template-user/footer-user.php');  ?>