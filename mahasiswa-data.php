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

// disini kita jalankan function query yang ada pada function-ambil-data.php, kemudian kita kirimkan parameter sql untuk mengambil data pada tabel mahasiswa. fungsi query ini akan mengembalikan nilai yang kita simpan pada variabel $mahasiswa
// ambil semua data pada tabel mahasiswa order berdasarkan id_mahasiswa dari dimulai dari urutan terbesar
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<section>
    <h1>Data Mahasiswa</h1>

    <a href="mahasiswa-tambah.php" role="button">Tambah</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <!-- foreach ==> pengulangan array -->
        <?php foreach ($mahasiswa as $m) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['prodi']; ?></td>
                <td><?= $m['gender']; ?></td>
                <td><?= $m['alamat']; ?></td>
                <td><?= $m['hobi']; ?></td>
                <td>
                    <a href="mahasiswa-ubah.php?id=<?= $m['id_mahasiswa']; ?>">Ubah</a>
                    <a href="mahasiswa-hapus.php?id=<?= $m['id_mahasiswa']; ?>" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>