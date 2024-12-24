<?php
require 'function_product.php';

$message = '';

if (isset($_POST["register"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    $insert_query = "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($conn, $insert_query)) {
        $message = 'User registered successfully';
        header("Location: login.php");
        exit();
    } else {
        if (mysqli_errno($conn) == 1062) { // 1062 is the error code for duplicate entry
            $message = 'Email already exists. Please use a different email.';
        } else {
            $message = 'Error: ' . mysqli_error($conn);
        }
    }
    // Display the message
    echo "<script>alert('$message');</script>";
}
?>

<DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
            <button name="register" type="submit" class="btn btn-primary" style="background-color: rgb(114, 49, 49); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
            Register</button>

            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS (You may need to adjust the path) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
