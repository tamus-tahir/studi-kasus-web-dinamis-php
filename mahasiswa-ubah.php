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
require 'function/function-mahasiswa-ubah.php';

// mengambil data id dari url
$id_mahasiswa = $_GET['id'];
// [0] ditambahkan agar kita tidak perlu menambhkannya lagi di setiap data yang nantinya akan kita cetak pada form
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Diubah');
					window.location.href = 'mahasiswa-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Diubah');
			</script>";
    }
}
?>

<section>
    <h1>Ubah Mahasiswa</h1>

    <form action="" method="post">
        <label for="nama" required>Nama :</label>
        <input type="text" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>"><br>

        <label for="gender">Jenis Kelamin :</label>
        <!-- disini kita gunakan operator ternari -->
        <!-- kondisi ? true : false -->
        <input type="radio" name="gender" id="gender" value="Laki-Laki" required <?= $mahasiswa['gender'] == 'Laki-Laki' ? 'checked' : ''; ?>> Laki-Laki
        <input type="radio" name="gender" id="gender" value="Perempuan" <?= $mahasiswa['gender'] == 'Perempuan' ? 'checked' : ''; ?>> Perempuan <br>

        <label for="alamat">Alamat :</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10" required><?= $mahasiswa['alamat']; ?></textarea><br>

        <label for="prodi">Prodi :</label>
        <select name="prodi" id="prodi" required>
            <option value="">-- Pilih Prodi --</option>
            <option value="Teknik Informatika" <?= $mahasiswa['prodi'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
            <option value="Teknik Elektro" <?= $mahasiswa['prodi'] == 'Teknik Elektro' ? 'selected' : ''; ?>>Teknik Elektro</option>
            <option value="Teknik Mesin" <?= $mahasiswa['prodi'] == 'Teknik Mesin' ? 'selected' : ''; ?>>Teknik Mesin</option>
        </select><br>

        <!-- explode ==> string to array -->
        <!-- pada saat kita menambahkan data kita membuat datanya menjadi string, sekarang kita balikan prosesnya -->
        <!-- in array, mengecek ada tidaknya data dalam array -->
        <?php $hobi = explode(', ', $mahasiswa['hobi']); ?>
        <label for="hobi">Hobi :</label>
        <input type="checkbox" name="hobi[]" id="hobi" value="Seni" <?= in_array('Seni', $hobi) ? 'checked' : null ?>>Seni
        <input type="checkbox" name="hobi[]" id="hobi" value="Olahraga" <?= in_array('Olahraga', $hobi) ? 'checked' : null ?>>Olahraga
        <input type="checkbox" name="hobi[]" id="hobi" value="Programing" <?= in_array('Programing', $hobi) ? 'checked' : null ?>>Programing
        <input type="checkbox" name="hobi[]" id="hobi" value="Pecinta Alam" <?= in_array('Pecinta Alam', $hobi) ? 'checked' : null ?>>Pecinta Alam
        <input type="checkbox" name="hobi[]" id="hobi" value="Jurnalistik" <?= in_array('Jurnalistik', $hobi) ? 'checked' : null ?>>Jurnalistik <br>

        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">

        <button type="submit" name="submit">Ubah</button>
    </form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>