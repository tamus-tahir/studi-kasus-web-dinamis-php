<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studi Kasus</title>
</head>

<body>

    <nav>
        <ul>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="mahasiswa-data.php">Mahasiswa</a>
            </li>
            <?php if ($_SESSION['level'] == 'Admin') : ?>
                <li>
                    <a href="user-data.php">User</a>
                </li>
            <?php endif ?>
            <li>
                <a href="berita-data.php">Berita</a>
            </li>
            <li>
                <a href="logout.php">logout</a>
            </li>
        </ul>
    </nav>