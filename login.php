<?php
session_start();

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // set session
            $_SESSION['login'] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .card {
            width: 500px;
            background-color: #fff;
            margin: 100px auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card h1 {
            text-align: center;
            font-size: 24px;
            padding: 0 0 20px 0;
            border-bottom: 1px solid #eee;
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
            padding: 14px;

            color: white;
            border: none;
            cursor: pointer;
        }
        .card button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <h1>Login</h1>

        <?php if (isset($error)) : ?>
            <script>
                alert("Username / password salah");
            </script>
        <?php endif; ?>

        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">

            <label for="password">Password :</label>
            <input type="password" name="password" id="password">

            <div style="display: flex; align-items: center;">
                <input type="checkbox" name="remember" id="remember" style="margin-right: 10px;">
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" name="login" class="btn btn-success mb-3">Login</button>
            <br>
            <button type="submit" name="register" class="btn btn-secondary" formaction="registrasi.php">Register</button>
        </form>
    </div>
    
</body>
</html>