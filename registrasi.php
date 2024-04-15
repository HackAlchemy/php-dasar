<?php
require 'function.php'; 

if (isset($_POST['registrasi'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            width: 100%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card label {
            display: block;
            margin-bottom: 10px;
        }
        .card input[type="text"], .card input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
        .card button[type="submit"] {
            width: 100%;
            padding: 10px;
            color: white;
            border: none;
            cursor: pointer;
        }
        .card button[type="submit"]:hover {
            background-color: #45a049;
        }
        @media (min-width: 425px) {
            .card {
                width: 400px;
            }
        }
        @media (min-width: 768px) {
            .card {
                width: 600px;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="card mt-5">
        <h1 align="center">Halaman Registrasi</h1> <br>

        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">

            <label for="password">Password :</label>
            <input type="password" name="password" id="password">

            <label for="password2">Konfirmasi Password :</label>
            <input type="password" name="password2" id="password2">

            <button type="submit" name="register" class="btn btn-secondary" formaction="registrasi.php">Register</button>
            <br>
            <br>
            <button type="submit" name="login" class="btn btn-success" formaction="login.php">Login</button>
        </form>
    </div>
</body>
</html>


