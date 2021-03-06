<?php
session_start();
if (!$_SESSION) {
	echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-mahasiswa-tambah.php';

if (isset($_POST["submit"])) {
	// tambah($_POST) ==> merupakan fungsi yang yang telah kita buat pada file function
	// telah dijelaskan sebelumnya mysqli_affected_rows akan bernilai 1 jika terjadi perubahan pada database
	// tambah($_POST) > 0 ==> kondisi dimana data berhasil ditambahkan
	// window.location.href ==> redirect halaman pada javascript
	if (tambah($_POST) > 0) {
		echo "<script>
					alert('Data Berhasil Ditambahkan');
					window.location.href = 'mahasiswa-data.php';
			</script>";
	} else {
		echo "<script>
					alert('Data Gagal Ditambahkan');
			</script>";
	}
}
?>

<section>
	<h1>Tambah Mahasiswa</h1>

	<form action="" method="post">
		<label for="nama" required>Nama :</label>
		<input type="text" id="nama" name="nama"><br>

		<label for="gender">Jenis Kelamin :</label>
		<input type="radio" name="gender" id="gender" value="Laki-Laki" required> Laki-Laki
		<input type="radio" name="gender" id="gender" value="Perempuan"> Perempuan <br>

		<label for="alamat">Alamat :</label>
		<textarea name="alamat" id="alamat" cols="30" rows="10" required></textarea><br>

		<label for="prodi">Prodi :</label>
		<select name="prodi" id="prodi" required>
			<option value="">-- Pilih Prodi --</option>
			<option value="Teknik Informatika">Teknik Informatika</option>
			<option value="Teknik Elektro">Teknik Elektro</option>
			<option value="Teknik Mesin">Teknik Mesin</option>
		</select><br>

		<label for="hobi">Hobi :</label>
		<input type="checkbox" name="hobi[]" id="hobi" value="Seni">Seni
		<input type="checkbox" name="hobi[]" id="hobi" value="Olahraga">Olahraga
		<input type="checkbox" name="hobi[]" id="hobi" value="Programing">Programing
		<input type="checkbox" name="hobi[]" id="hobi" value="Pecinta Alam">Pecinta Alam
		<input type="checkbox" name="hobi[]" id="hobi" value="Jurnalistik">Jurnalistik <br>

		<button type="submit" name="submit">Tambah</button>
	</form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>