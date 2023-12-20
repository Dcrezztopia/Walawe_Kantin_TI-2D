<?php
// Include your database connection file
include '../../../koneksi.php';

if (isset($_POST['sku'])) {
    $selectedSku = $_POST['sku'];

    // Fetch the stock value from the database
    $query = mysqli_query($conn, "SELECT stok, namaBarang FROM barang WHERE idBarang = '$selectedSku'");
    $result = mysqli_fetch_assoc($query);

    // Return the stock value as the Ajax response
    echo json_encode($result);
}
