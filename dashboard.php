<?php
session_start();
// cek ada tidak sessionnya
// session hanya di dapat ketika user melakukan login
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
?>

<section>
    <h1>Halaman Dashboard</h1>
</section>

<?php include_once('template-admin/footer-admin.php');  ?>