<?php

// Assuming you have a database connection established here
// Include your database configuration or connection code accordingly
include '../../../koneksi.php';

// Check if id_barang is set in the POST data
if (isset($_POST['id_barang'])) {
    // Escape the ID to prevent SQL injection
    $idBarang = mysqli_real_escape_string($conn, $_POST['id_barang']);

    // Your delete query
    $deleteQuery = "DELETE FROM cart WHERE id_barang = '$idBarang'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Barang dengan ID $idBarang berhasil dihapus.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Barang tidak ditemukan.";
}
