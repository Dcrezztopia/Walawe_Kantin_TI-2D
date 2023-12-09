<?php

require_once '../crud.php';
$connection = $conn;
class CrudPengajuan implements Crud
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }


    public function Create($data)
    {
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $sku = $data['sku'];
        $namasupplier = $data['namasupplier'];
        $harga = $data['harga'];
        $status = $data['status'];

        // Ganti query INSERT menjadi sesuai dengan tabel waitingroom
        $query_insert = "INSERT INTO waitingroom (namabarang, jenisbarang, sku, namasupplier, harga, status) VALUES ('$nama_barang', '$jenis_barang', '$sku', '$namasupplier', '$harga', '$status')";
        $result = $this->connection->query($query_insert);

        if ($result) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.replace('?view=datapengajuan');</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data')</script>";
        }
    }

    public function Read()
    {

    }

    public function Update($data)
    {
        // echo "<script>alert ('pe') </script>";
        $id_waiting = $data['id_waiting'];
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $sku = $data['sku'];
        $namasupplier = $data['namasupplier'];
        $harga = $data['harga'];


        mysqli_query($this->connection, "UPDATE waitingroom set namabarang='$nama_barang', jenisbarang='$jenis_barang', sku='$sku', namasupplier='$namasupplier', harga='$harga' where id_waiting='$id_waiting'");

        echo "<script>alert ('Data Berhasil Diubah') </script>";
        echo "<meta http-equiv='refresh' content=0; URL=?view=datapengajuan>";
    }

    public function Delete($data)
    {

    }
}
?>