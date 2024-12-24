<?php

$conn = mysqli_connect('localhost:3307', 'root', '', 'manprorpl');

function query($query)
{
     global $conn;
     $result = mysqli_query($conn, $query);
     $rowobat = [];
     while ($rowobat = mysqli_fetch_assoc($result)) {
          $rowsobat[] = $rowobat;
     }
     return $rowsobat;
};

function buatPesanan($data){
     global $conn;
 
     $id_produk = $data["id_produk"];
     $nama_produk = mysqli_real_escape_string($conn, $data["nama_produk"]);
     $gambar = mysqli_real_escape_string($conn, $data["gambar"]);
     $harga = mysqli_real_escape_string($conn, $data["harga"]);
     $quantity = mysqli_real_escape_string($conn, $data["quantity"]);
 
     $query = "INSERT INTO keranjang (id_produk, nama_produk, gambar, harga, quantity) 
               VALUES ('$id_produk', '$nama_produk', '$gambar', '$harga', '$quantity')";
     
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
} 

function checkout($data){
     global $conn;
}

function authenticateUser($conn, $email, $password) {
     $auth = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
 
     if (mysqli_num_rows($auth) > 0) {
         $rows = mysqli_fetch_assoc($auth);
         
         $hashedPassword = md5($password);
 
         if ($hashedPassword === $rows["password"]) {
             return true;
         } else {
             return false;
         }
     } else {
         return false;
     }
 }


?>
