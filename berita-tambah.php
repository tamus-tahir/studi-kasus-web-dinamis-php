<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-berita-tambah.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Ditambahkan');
					window.location.href = 'berita-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Ditambahkan');
			</script>";
    }
}
?>

<section>
    <h1>Tambah Berita</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="judul">Judul :</label>
        <input type="text" id="judul" name="judul" required><br>

        <label for="isi">Isi :</label>
        <textarea name="isi" id="isi" cols="30" rows="10" required></textarea><br>

        <label for="gambar">Gambar :</label>
        <input type="file" id="gambar" name="gambar" required><br>

        <button type="submit" name="submit">Tambah</button>
    </form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>