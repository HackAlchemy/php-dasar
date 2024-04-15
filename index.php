<?php
require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

// tombol cari diklik
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4 mt-5">
        <div class="text-center">
            <h1>Daftar Mahasiswa</h1>
        </div>
        <div class="d-flex">
            <a href="tambah.php" class="btn btn-primary">Tambah</a>
        </div>
        <br>

        <form action="" method="post">
            <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari" class="btn btn-primary">Search</button>
        </form><br>

        <table class="table table-responsive table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Email</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["nim"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

