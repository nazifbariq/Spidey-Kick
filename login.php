<?php

require 'function_product.php';

if (isset($_POST["login"])) {
$email = $_POST["email"];
$password = $_POST["password"];

$auth = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

if (mysqli_num_rows($auth) > 0) {
	$rows = mysqli_fetch_assoc($auth);
        
	// Hash kata sandi yang dimasukkan pengguna dengan MD5
	$hashedPassword = md5($password);

	// Periksa apakah kata sandi sesuai dengan kata sandi di database
	if ($hashedPassword === $rows["password"]) {
        // Disini sesi akan dibuat setelah verifikasi berhasil
        session_start(); // Memulai sesi jika belum dimulai
        $_SESSION['email'] = $rows['email']; // Menyimpan email ke dalam sesi
        header("Location: index.php");
        exit(); // Pastikan untuk keluar dari script setelah menggunakan header location
    } else {
        $error = true;
    }
} else {
	$error = true;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <!-- Include Bootstrap CSS (You may need to adjust the path) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('baground.jpg'); /* Ganti dengan path ke gambar Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Gaya untuk kotak login */
        .login-box {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 8px;
            width: 600px; /* Lebar kotak login */
        }

        /* Mengubah warna font menjadi putih untuk elemen tertentu */
        h2, label, input, button, a {
            color: rgb(23, 22, 22);
        }

        /* Gaya untuk judul */
        h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 class="text-center">Silakan Login Spidey Kick</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
                <button name="login" type="submit" class="btn btn-primary" style="background-color: rgb(114, 49, 49); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Login</button>
                <p class="mt-3">Belum punya akun? <a href="halaman_register.php">Daftar disini</a></p>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS (You may need to adjust the path) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
