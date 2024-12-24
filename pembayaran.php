<?php
require "function_product.php";
session_start();

if (isset($_POST['kembali'])) {
    // Perform a query to delete the contents of the 'keranjang' table
    $delete_query = "DELETE FROM keranjang";
    $delete_result = mysqli_query($conn, $delete_query);

    // Redirect to index.php after deleting data
    header("Location: index.php");
    exit();
}

$sql = mysqli_query($conn, "SELECT max(id) as maxID FROM transaksi");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$kode++;
$ket = date("Ymd");
$kodeauto = $ket . sprintf("%03s", $kode);

$insert_query = "INSERT INTO transaksi (kode_trans) VALUES ('$kodeauto')";
$insert_result = mysqli_query($conn, $insert_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tampil Kode Pembayaran</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    .container {
      max-width: 800px;
      background-color: #f9f9f9;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1, p {
      color: #333;
    }
    ul {
      list-style-type: none;
      padding-left: 0;
    }
  </style>
</head>
<body>

<div class="container">
<form method="post">
  <h2 class="my-4">Kode Pembayaran</h2>
  <div class="form-group">
    <input type="text" class="form-control" id="kodePembayaran" value="<?php echo $kodeauto?>"readonly>
  </div>

  <h1 class="mt-5">Petunjuk Transfer mBanking</h1>
  <br>
  <ul>
    <li>1. Login ke mBanking anda, Pilih Bayar, Kemudian pilih lainya</li>
    <li>2. Pilih penyedia layanan Transferpay dan masukan kode di atas</li>
    <li>3. Kemudian pilih OK dan masukan pin anda</li>
    <li>4. Pembayaran telah berhasil dilakukan</li>
  </ul>
  <br>
    <button onclick="window.location.href = 'index.php';" name="kembali" type="submit" class="btn btn-primary" style="background-color: rgb(114, 49, 49); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">kembali</button>
</form>
</div>

<script>
    // JavaScript to prompt before redirecting and deleting data
    document.querySelector("button[name='kembali']").addEventListener("click", function (event) {
        if (confirm("Pembayaran Selesai")) {
            window.location.href = 'index.php';
        } else {
            event.preventDefault(); // Prevent form submission
        }
    });
</script>


<!-- Bootstrap JS (Optional, hanya jika Anda memerlukan komponen-komponen interaktif dari Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
