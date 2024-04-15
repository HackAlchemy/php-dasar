<?php
require 'function.php';

// ambil data di url
$id = $_GET['id'] ?? "";

// query data mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0] ?? [];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0 ) {
        // berikan alert
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'edit.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?? ""; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar']; ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $mahasiswa['nama'] ?? ""; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required value="<?= $mahasiswa['nim'] ?? ""; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required value="<?= $mahasiswa['email'] ?? ""; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= $mahasiswa['jurusan'] ?? ""; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <img src="img/<?= $mahasiswa['gambar'] ?? 'default.png'; ?>" class="img-preview img-fluid mt-3" alt="<?= $mahasiswa['nama'] ?? ''; ?>" width="100">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
                            <a href="index.php" class="btn btn-success mx-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


